(function($){
$(document).ready(function(){

$("#cssmenu").menumaker({
    title: "Menu",
    breakpoint: 768,
    format: "multitoggle"
});

});
})(jQuery);


/*var center;
var map = documet.getElementById('map')
function calculateCenter() {
    center = map.getCenter();
}
google.maps.event.addDomListener(map, 'idle', function(){ 
    calculateCenter();
});
google.maps.event.addDomListener(window, 'resize', function(){
    map.setCenter(center);
});*/