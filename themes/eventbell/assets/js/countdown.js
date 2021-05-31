jQuery(document).ready(function($) {

    var input_date = $( '#event-timer' ).data( 'countdown' );

    // Set the date we're counting down to
    var countDownDate = new Date( input_date ).getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get todays date and time
        var now = new Date().getTime();
        
        // Find the distance between now an the count down date
        var distance = countDownDate - now;
        
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
        // Output the result in an element with id="demo"
        document.getElementById("event-timer").innerHTML = "<span>" + days + "<small>days</small>" + "</span>" + "<span>" + hours + "<small>hours</small>" + "</span>"
        + "<span>" + minutes + "<small>minutes</small>" + "</span>" + "<span>" + seconds + "<small>seconds</small>" + "</span>";
        
        // If the count down is over, write some text 
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("event-timer").innerHTML = "Released";
        }
    }, 1000);

});