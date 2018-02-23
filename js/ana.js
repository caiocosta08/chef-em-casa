
export function sendLogoutToAnalythics(){
        gtag('event', 'logout-do-site', {
           'event_category': 'logout', 
            'user_logout': userlogado
        });
    }

export function sendLoginToAnalythics(){
        user = $("input#login.form-control").value
        gtag('event', 'login-no-site',{
            'event_category': 'login',
            'method': 'chef-server-login',
            'user_login': user
        });
    }