import {extend} from 'flarum/common/extend';
import app from 'flarum/forum/app';
import ForumApplication from 'flarum/forum/ForumApplication';

const params = new URLSearchParams(window.location.search);

const authenticationComplete = params.get('authenticationComplete');

if (authenticationComplete) {
    // Remove query string from URL
    // Do this before the app even boots, so it doesn't cause a page reload
    window.history.pushState(null, '', location.href.split('?')[0]);
}

app.initializers.add('auth-popup-failsafe', () => {
    extend(ForumApplication.prototype, 'mount', function () {
        if (authenticationComplete) {
            // Wait a little bit for Flarum to do its initial render, otherwise the modal doesn't open
            setTimeout(() => {
                this.authenticationComplete(JSON.parse(authenticationComplete));
            }, 200);
        }
    });
});
