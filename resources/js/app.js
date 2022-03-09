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
