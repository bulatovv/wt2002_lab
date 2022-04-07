require('./bootstrap');

import $ from "jquery";
window.jQuery = $;


var bootstrap = require('bootstrap');
import '../scss/app.scss';

var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
})

var toastElList = [].slice.call(document.querySelectorAll('.toast'))
var toastList = toastElList.map(function (toastEl) {
  return new bootstrap.Toast(toastEl)
})


$(document).keydown(function(e){
    var current = $(".modal:visible")
    switch (e.which){
    case 37: // left arrow key
        current.modal('hide');
        var prev = current.prev("div[id^=modal]");
        if (prev.length != 0) 
            prev.modal('show');
        break;
    case 39: // right arrow key
        current.modal('hide');
        var next = current.next("div[id^=modal]");
        if (next.length != 0) 
            next.modal('show');
        break;
    }
});


$(".btn-upload").click(function(){
    console.log("test");
    $("#not-impl-toast").toast("show");
});
