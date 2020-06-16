

window.onload = function(){
	
//alert("hi");
$("#box2").hide();
$("#tryAgain").click(tryAgain);
$(".btn").mouseover(function(){
  $(this).css("color", "#fff").css("background", "transparent").css("border", "1px solid #fff");
});

$(".btn").mouseleave(function(){
  $(this).css("color", "#000").css("background", "#fff");
});

$(".btn").mouseover(function(){
  $(this).css("color", "#000").css("background", "#fff");
});

$(".btn").mouseleave(function(){
  $(this).css("color", "#fff").css("background", "green").css("border", "1px solid #fff");
});

}
var  number = Math.floor(Math.random() * 10 + 1); 
var guess = 0; 
var counter=0;

function startGame(){
	alert("Entered Start game");
	
	var userGuess = document.getElementById("guessField").value; 

	if(userGuess === "" || userGuess === null)
		{
			alert("Enter a valid data.It can't be empty");
		}
	
	else 
	{
		counter = counter +1; 
		if(userGuess ==  number) 
		{	 		
			alert("CONGRATULATIONS!!! YOU GUESSED IT RIGHT IN " + counter + " attempts "); 
		} 

		else if(userGuess >  number) 
		{	 
			if (counter ==3)
			{
				alert("Maximum 3 attempts you have tried");
				$("#box1").hide();
				$("#box2").show();
				//alert("hi");
				return;

			}
			alert("OOPS SORRY!! TRY A SMALLER NUMBER"); 
		} 
		else
		{ 
			if (counter ==3)
			{
				alert("Maximum 3 attempts you have tried");
				$("#box1").hide();
				$("#box2").show();
				//alert("hi2");
				return;
			}
			
			alert("OOPS SORRY!! TRY A GREATER NUMBER") 
		} 
	}
}

function tryAgain(){
	 counter=0;
	 alert("Entered Try again ");
	$("#box2").hide();
	$("#box1").show();
}