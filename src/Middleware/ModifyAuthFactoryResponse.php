<?php

namespace ClarkWinkelmann\AuthPopupFailsafe\Middleware;

use Flarum\Http\UrlGenerator;
use Flarum\Locale\Translator;
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\Diactoros\Stream;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ModifyAuthFactoryResponse implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = $handler->handle($request);

        if (!($response instanceof HtmlResponse)) {
            return $response;
        }

        $body = $response->getBody()->getContents();

        if (preg_match('~<script>window\.close\(\); window\.opener\.app\.authenticationComplete\(([\s\S]+?)\);</script>~', $body, $matches) !== 1) {
            $response->getBody()->rewind();

            return $response;
        }

        $url = resolve(UrlGenerator::class);
        $translator = resolve(Translator::class);

        $payload = $matches[1];
        $redirect = $url->to('forum')->base();

        // No need to pass loggedIn:true to the app, as it would only reload itself again
        if ($payload !== '{"loggedIn":true}') {
            $redirect .= '?authenticationComplete=' . urlencode($matches[1]);
        }

        $href = htmlentities($redirect);
        $info = htmlentities($translator->trans('clarkwinkelmann-auth-popup-failsafe.api.auth.info'));
        $continue = htmlentities($translator->trans('clarkwinkelmann-auth-popup-failsafe.api.auth.continue'));

        $newBody = new Stream('php://temp', 'wb+');
        $newBody->write("<p>$info</p><p><a href=\"$href\">$continue</a></p>" . $body);
        $newBody->rewind();

        return $response->withBody($newBody);
    }
}
