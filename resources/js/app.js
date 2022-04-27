require('./bootstrap');

import $ from "jquery";
import Alpine from 'alpinejs';
var bootstrap = require('bootstrap');
import '../scss/app.scss';

window.jQuery = $;
window.$ = $;
window.bootstrap = bootstrap;
window.Alpine = Alpine;

Alpine.start();

var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
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
