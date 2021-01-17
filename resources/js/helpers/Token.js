class Token {
    isValid(token) {
        const payload = this.payload(token);
        if (payload) {
            return !!(payload.iss === 'http://fiverr-forum.test/api/auth/login' || 'http://fiverr-forum.test/api/auth/sign-up');
        }
        return false
    }

    payload(token) {
        const payload = token.split('.');
        return payload.length === 3 ? this.decode(payload[1]) : false
    }

    decode(payload) {
        if (this.isBase64(payload)) {
            return JSON.parse(atob(payload));
        }
        return false;
    }

    isBase64(payload) {
        try {
            return btoa(atob(payload)).replace(/=/g, "") === payload
        } catch (e) {
            return false;
        }
    }
}

export default Token = new Token()
