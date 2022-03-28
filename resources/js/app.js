require("./bootstrap");

import Alpine from "alpinejs";
import $ from "jquery";
import "jquery-ui/ui/widgets/datepicker.js";
window.Alpine = Alpine;
window.$ = window.jQuery = $;
Alpine.start();

// function to start the animation
$(function () {
    $(".box-body").click(function () {
        $(this).addClass("is-active");
    });
});

window.countdown_quiz = function (countdown_date) {
    // Set the date we're counting down to
    var countDownDate = countdown_date;

    // Update the count down every 1 second
    var x = setInterval(function () {
        // Get today's date and time
        var now = Math.floor(new Date().getTime() / 1000);
        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (60 * 60 * 24));
        var hours = Math.floor((distance % (60 * 60 * 24)) / (60 * 60));
        var minutes = Math.floor((distance % (60 * 60)) / 60);
        var seconds = Math.floor(distance % 60);

        // Output the result in an element with id="demo"
        document.getElementById("timeleft").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("quiz_cooldown_message").innerHTML = "";
            document.getElementById("timeleft").innerHTML =
                "If you refresh this page, you are able to make a quiz again.";
        }
    }, 500);
};

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

$(document).on("click", '#generate_card_button', function (e) {
    $(e.currentTarget).attr('disabled', true);

    const boxId = $(e.currentTarget).data('box-id');

    $.get("/generate_card", {
        id: boxId,
        dataType: 'html'
    }).done(function (data) {
        $('#box').html((jQuery(data).find('#box').html()));
        $("#new_card").html((jQuery(data).find('#card_wrapper').html()));

    });

    $(e.currentTarget).attr('disabled', false);
});

//     $.get("/generate_card", {
//         id: box_id,
//     }).done(function (data) {
//         var answer = JSON.parse(data);
//         if (answer[3] == 0){
//           noboxes();
//           showcard(answer[0]);
//         } else{
//         showcard(answer[0]);
//         updatecounters(answer[1], answer[3]);
//         $('#generate_card_button').attr("onclick", "generate_card(" + answer[2] + ")");
//         }
//     });
// };

window.showcard = function (data) {
  //first empty the div, then append the new generated card
    $("#card_container").empty();
    $("#card_container").append(data);

};
window.updatecounters = function (count, difficulty) {
  $("#box_count").empty();
  $("#box_difficulty").empty();
  $("#box_count").append(count);
  $("#box_difficulty").append(difficulty);
};


// const reloadButton = document.querySelector("#kaarten");
// // Reload everything:
// function reload() {
//     reload = location.reload();
// }
// // Event listeners for reload
// reloadButton.addEventListener("click", reload, false);