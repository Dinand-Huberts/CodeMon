require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

var box_alert = document.getElementById("box_alert");
window.showalert = function() {
    box_alert.classList.remove("hidden");
    setTimeout(hidealert, 4100);
  }
  
window.hidealert = function(){
    box_alert.classList.add("hidden");
  }
