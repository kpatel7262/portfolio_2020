window.onload = pageReady;
function pageReady(){

var map2= document.getElementById("location2_map");

map2.onclick = open_window;

function open_window(){
  window.open("https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d92362.55838906797!2d-79.63024604171181!3d43.66210725554357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b4835e6b98679%3A0x5ca4f10b097c8c4f!2sHumber%20College%20Lakeshore%20Campus%3A%20Building%20A!5e0!3m2!1sen!2sca!4v1576038396398!5m2!1sen!2sca");
}

/*navbar hover effect*/
$("li").hover(function(){
    $(this).css("color", "red");
    }, 
    function(){
    $(this).css("color", "white");
  });
}

