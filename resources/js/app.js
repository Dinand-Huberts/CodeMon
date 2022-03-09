require('./bootstrap');

import Alpine from 'alpinejs';
import $ from 'jquery';
import 'jquery-ui/ui/widgets/datepicker.js';
window.Alpine = Alpine;
window.$ = window.jQuery = $;
Alpine.start();

// function to start the animation
$(function() {
    $('.box-body').click(function() {
        $(this).addClass("is-active");
    });
});

 //Dit moet nog aangeroepen worden, en het verschil in datum moet goed verwerkt worden.

 window.countdown_quiz = function(countdown_date) {
    // Set the date we're counting down to
var countDownDate = countdown_date;

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = Math.floor(new Date().getTime() / 1000) ;
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (60 * 60 * 24));
  var hours = Math.floor((distance % (60 * 60 * 24)) / ( 60 * 60));
  var minutes = Math.floor((distance % (60 * 60)) / ( 60));
  var seconds = Math.floor((distance % (60)));
    
  // Output the result in an element with id="demo"
  document.getElementById("timeleft").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("quiz_cooldown_message").innerHTML = "";
    document.getElementById("timeleft").innerHTML = "If you refresh this page, you are able to make a quiz again.";
  }
}, 500);
}


// var hidden_box_alert = false;
// var box_alert = document.getElementById("box_alert");
// window.showalert = function() {
//     box_alert.classList.remove("hidden");
//     setTimeout(hidealert, 4100);
//   }
  
// window.hidealert = function(){
//     var hidden_box_alert = true;
//     box_alert.classList.add("hidden");
//   }
