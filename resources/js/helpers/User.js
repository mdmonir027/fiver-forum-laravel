import Token from "./Token";
import AppStorage from "./AppStorage";
import router from "../router/router";

class User {
    responseLoginAfter(token) {
        const accessToken = token.access_token;
        const user = token.user;
        console.log(Token.payload(accessToken))
        if (Token.isValid(accessToken)) {
            AppStorage.store(user, accessToken)
            window.location = '/'
        }
    }

    hasToken() {
        const token = AppStorage.getToken();
        if (token) {
            return Token.isValid(token);
        }
        return false;
    }

    loggedIn() {
        return !!this.hasToken();
    }

    logout() {
        AppStorage.clear();
        window.location = '/login'
    }

    id() {
        if (this.loggedIn()) {
            const payload = Token.payload(AppStorage.getToken());
            return payload.sub
        }
        return null;
    }

    own(userId) {
        return this.id() === userId;
    }

    admin() {
        return this.id() === 1;
    }

    redirect(path) {

        if (this.loggedIn()) {
            if (path === '/login' || path === '/register' || path === '/forgot-password') {
                window.location = '/'
            }
        } else {
            if (path === '/register' || path === '/forgot-password') {
            } else if (path !== '/login') {
                window.location = '/login'
            }
        }
    }


}

export default User = new User()
