$(document).ready(function(){
    var loginField = document.querySelector("input#login.form-control")
    var user
    
    $("#btnLogin").click(function(){
        user = loginField.value
        gtag('event', 'login-no-site',{
            'event_category': 'login',
            'method': 'chef-server-login'
        });
    });
    
//------------------------------------------------------------------------------------------
        
    $("a.chefLink").click(function(e){
        e.preventDefault();
        gtag('event', 'click-na-propaganda-do-chef', {
            'event_category': 'click-chef',
            'link': this.href
        });
        alert("clicou")
        $("a.chefLink").load($(this).attr("href"));
    });
    
//------------------------------------------------------------------------------------------
        
    $("#btnLogout").click(function(){
        gtag('event', 'logout-do-site', {
           'event_category': 'logout', 
            'user': userlogado
        });
    });
    
//------------------------------------------------------------------------------------------
    
    // Feature detects Navigation Timing API support.
    if (window.performance) {
        // Gets the number of milliseconds since page load
        // (and rounds the result since the value must be an integer).
        var timeSincePageLoad = Math.round(performance.now());

        // Sends the timing event to Google Analytics.
        gtag('event', 'timing_complete', {
            'name': 'load',
            'value': timeSincePageLoad,
            'event_category': 'JS Dependencies'
        });
    }
});