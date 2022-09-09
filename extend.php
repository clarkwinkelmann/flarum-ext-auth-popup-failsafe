<?php

namespace ClarkWinkelmann\AuthPopupFailsafe;

use Flarum\Extend;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__ . '/js/dist/forum.js'),

    new Extend\Locales(__DIR__ . '/locale'),

    (new Extend\Middleware('forum'))
        ->add(Middleware\ModifyAuthFactoryResponse::class),
];
