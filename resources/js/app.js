require('./bootstrap');

import $ from "jquery";
window.jQuery = $;
window.$ = $;

var bootstrap = require('bootstrap');
window.bootstrap = bootstrap;

import '../scss/app.scss';

var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(popoverTriggerEl => 
    new bootstrap.Popover(popoverTriggerEl)
)

$(document).keydown(e => {
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
