
var $ = jQuery.noConflict();

var $hamburger = $(".hamburger");
$hamburger.on("click", function(e) {
  $hamburger.toggleClass("is-active");
  $(".menu-wrapper").toggle();
});
$(document).ready(function(){
    $(".js-fillcolor").fillColor({type: 'avgYUV'});
    //console.log(fillColor());
});