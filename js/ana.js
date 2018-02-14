$(document).ready(function(){
    $("#btnLogin").click(function(){
        gtag('event', 'login-no-site')
     gtag('event', 'timing_complete', {
            'name': 'load',
            'value': timeSincePageLoad,
            'event_category': 'JS Dependencies'
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
            'event_category': 'JS Dependencies'
        });
    }
});