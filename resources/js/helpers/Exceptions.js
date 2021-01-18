import User from "./User";

class Exceptions {

    handle(error) {
        this.isExpired(error.response.data.error)
    }

    isExpired(error) {
        if (error === 'Token is invalid' || error === 'Token is expired') {
            User.logout();
        }
    }
}


export default Exceptions = new Exceptions();
