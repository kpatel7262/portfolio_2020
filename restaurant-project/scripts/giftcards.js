window.onload = pageReady;
function pageReady(){

	var bronze = document.getElementById("b_subscribe");
	var silver = document.getElementById("s_subscribe");
	var gold = document.getElementById("g_subscribe");

	bronze.onclick = alert1;
	silver.onclick = alert2;
	gold.onclick = alert3;

	function alert1() {
        alert("Wohooo! You have successfully subscribe to BRONZE card");
      }

      function alert2() {
        alert("Wohooo! You have successfully subscribe to SILVER card");
      }

      function alert3() {
        alert("Wohooo! You have successfully subscribe to GOLD card");
      }

/*navbar hover effect*/
$("li").hover(function(){
    $(this).css("color", "red");
    }, 
    function(){
    $(this).css("color", "white");
  });
}

  

       
  
