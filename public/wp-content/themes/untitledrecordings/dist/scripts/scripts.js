var $ = jQuery.noConflict();

$(document).ready(function(){
    $("button.header__hamburger").click(function(){
      $(".menu-wrapper").toggle();
      $("body").toggleClass("hidden");   
    });

    $(".js-fillcolor").fillColor({type: 'avgYUV'});
    //console.log(fillColor());

});