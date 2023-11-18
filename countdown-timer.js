// countdown-timer.js
jQuery(document).ready(function ($) {
    var countDownDate = new Date(countdown_timer_data.expiration_time * 1000).getTime();

    var x = setInterval(function () {
        var now = new Date().getTime();
        var distance = countDownDate - now;

        // Calculate minutes and seconds
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the countdown
        document.getElementById("countdown-timer").innerHTML = minutes + "m " + seconds + "s ";

        if (distance < 0) {
            clearInterval(x);
            window.location.href = '<?php echo wc_get_page_permalink("shop"); ?>';
        }
    }, 1000);
});
