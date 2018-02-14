$(document).ready(function(){
    var loginField = document.querySelector("input#login.form-control")
    var user
    
    $("#btnLogin").click(function(){
        gtag('event', 'login-no-site',{
           'event_category': 'login' 
        });
    });
    
    $("#ga").click(function(){
       user = loginField.value
       gtag('event', 'info', {
          'info-name': 'tentando enviar informações',
           'event_category': 'categoriaX',
           'name': 'info_name',
           'user_login': user
       });
    });
    
    $("#btnLogout").click(function(){
        gtag('event', 'logout-do-site', {
           'event_category': 'logout' 
        });
    });
    
    
    
    // Feature detects Navigation Timing API support.
    if (window.performance) {
        // Gets the number of milliseconds since page load
        // (and rounds the result since the value must be an integer).
        var timeSincePageLoad = Math.round(performance.now());

        // Sends the timing event to Google Analytics.
        gtag('event', 'timing_complete', {
            'name': 'load',
            'value': timeSincePageLoad,
            'event_category': 'JS Dependencies',
            'non_interaction': true
        });
    }
});