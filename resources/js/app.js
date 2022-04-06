require("./bootstrap");

import $ from "jquery";
import "jquery-ui/ui/widgets/datepicker.js";
import { functionsIn } from "lodash";

window.$ = window.jQuery = $;

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
        document.getElementById("timeleft").innerHTML =
            days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("quiz_cooldown_message").innerHTML = "";
            document.getElementById("timeleft").innerHTML =
                "If you refresh this page, you are able to make a quiz again.";
        }
    }, 500);
};

$(document).on("click", "#generate_card_button", function (e) {
    $(e.currentTarget).attr("disabled", true);

    
    const boxId = $(e.currentTarget).data("box-id");

    $.get("/generate_card", {
        id: boxId,
        dataType: "html",
    }).done(function (data) {
        console.log(data);
        $("#box").html(jQuery(data).find("#box").html());
        $("#new_card").html(jQuery(data).find("#card_wrapper").html());
    });

    $(e.currentTarget).attr("disabled", false);
});

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

window.orderby = function () {
    const orderby = $("#orderby").val();
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const v = urlParams.get("v");
    const p = urlParams.get("p");
    $.get("/orderby", {
        orderby: orderby,
        p: p,
        v: v,
        dataType: "html",
    }).done(function (data) {
        $("#dashboard_card").empty();
        var answer = JSON.parse(data);
        jQuery.each(answer, function (i) {
            // alert(answer[i]);
            $("#dashboard_card").append(answer[i]);
            i++;
        });
    });
};

//select the current filter as the first option the user sees.
window.currentFilterCheck = function () {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const view = urlParams.get("v");
    $("#" + view).attr("selected", true);
};
