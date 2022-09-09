# Auth Popup Failsafe

[![MIT license](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/clarkwinkelmann/flarum-ext-auth-popup-failsafe/blob/master/LICENSE.txt) [![Latest Stable Version](https://img.shields.io/packagist/v/clarkwinkelmann/flarum-ext-auth-popup-failsafe.svg)](https://packagist.org/packages/clarkwinkelmann/flarum-ext-auth-popup-failsafe) [![Total Downloads](https://img.shields.io/packagist/dt/clarkwinkelmann/flarum-ext-auth-popup-failsafe.svg)](https://packagist.org/packages/clarkwinkelmann/flarum-ext-auth-popup-failsafe) [![Donate](https://img.shields.io/badge/paypal-donate-yellow.svg)](https://www.paypal.me/clarkwinkelmann)

This extension implements a link at the end of the popup auth flow of Flarum that will make it possible to finish the login/registration in the new tab instead of going back to the original tab.

This workaround is required for embedded mobile browsers that use tabs/windows in place of popups and didn't implement the popup `opener` web API.

This problem affects multiple Flarum auth extensions, most notably FoF OAuth but also KILOWHAT Wordpress Integration and others.

This is meant as a proof of concept / temporary workaround until this gets properly fixed in Flarum directly.

## Installation

    composer require clarkwinkelmann/flarum-ext-auth-popup-failsafe

## Support

This extension is under **minimal maintenance**.

It was developed for a client and released as open-source for the benefit of the community.
I might publish simple bugfixes or compatibility updates for free.

You can [contact me](https://clarkwinkelmann.com/flarum) to sponsor additional features or updates.

Support is offered on a "best effort" basis through the Flarum community thread.

## Links

- [GitHub](https://github.com/clarkwinkelmann/flarum-ext-auth-popup-failsafe)
- [Packagist](https://packagist.org/packages/clarkwinkelmann/flarum-ext-auth-popup-failsafe)
