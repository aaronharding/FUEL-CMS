var hasPerformance = !!(window.performance && window.performance.now);

// Add new wrapper for browsers that don't have performance
if (!hasPerformance) {
    // Store reference to existing rAF and initial startTime
    var rAF = window.requestAnimationFrame,
        startTime = +new Date;

    // Override window rAF to include wrapped callback
    window.requestAnimationFrame = function (callback, element) {
        // Wrap the given callback to pass in performance timestamp
        var wrapped = function (timestamp) {
            // Get performance-style timestamp
            var performanceTimestamp = (timestamp < 1e12) 
                ? timestamp 
                : timestamp - startTime;

            return callback(performanceTimestamp);
        };

        // Call original rAF with wrapped callback
        rAF(wrapped, element);
    }        
}

var scroll = false;

function rafCheck() {
    current = $(window).scrollTop();
    if(scroll) {
        onScroll();
        prev = current;
        scroll = false;
    }
    requestAnimationFrame(rafCheck);
}
$(document).ready(function() {
    requestAnimationFrame(rafCheck);
    scroll = true;
});
$(window).on('scroll', function() {
    scroll = true;
});