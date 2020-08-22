var $ = jQuery.noConflict();

$(document).ready(function(){
    $("button").click(function(){
      $(".menu-wrapper").toggle();
      $("body").toggleClass("hidden");   
    });

    $(".js-fillcolor").fillColor({type: 'avgYUV'});
    //console.log(fillColor());

});