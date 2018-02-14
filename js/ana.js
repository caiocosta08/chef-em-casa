$(document).ready(function(){
    $("#btnLogin").addEventListener("submit", function(e){
       e.preventDefault(); 
    });
    $("#btnLogin").click(function(){
        gtag('event', 'login-no-site',{
           'tipo-de-conta': 'basic' 
        });
    });

    
    $("#btnLogout").click(function(){
        gtag('event', 'logout-do-site')
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