//navbar and footer motions
$("li").mouseover(function(){
  $(this).css("border-bottom", "1px solid #fff").css( "color", "red");
});

$("li").mouseleave(function(){
  $(this).css("border-bottom", "none").css("color", "#fff");
});
$(".icon").mouseover(function(){
  $(this).css("transform", "scale(1.4)");
});

$(".icon").mouseleave(function(){
  $(this).css("transform", "scale(1)");
});

$('.box').mouseover(function(){
  $(this).css("transform", "scale(1.08)").css("transition", "transform .2s ease-in")
  .css("cursor", "pointer");
});

$('.box').mouseleave(function(){
  $(this).css("transform", "scale(1)").css("transition", "transform .2s ease-out");
});

//playing a sound of click when clicking on one of the options
// interacting with the user
$(".box").click(function(){
    var audio = new Audio('scripts/click.mp3');
    audio.play();
    setTimeout(function(){
      var confirmation = confirm("Sounds Great! Are you sure you want to join us?");
      if(confirmation === true){
        var name = prompt("Yaaay! What is your name?");
        while(name === ""){
          name = prompt("You should enter your name!");
        }
        var peopleNumber = prompt("Awesome " + name.toUpperCase() + " How many people are you coming to this event?");
        peopleNumber = parseInt(peopleNumber);
        while(peopleNumber === null || peopleNumber === "" || isNaN(peopleNumber)){
          peopleNumber = prompt("You should enter a number!");
        }
        alert("Yoohoo! We're so excited to see you " + name.toUpperCase() + " and " + peopleNumber + " of your frineds");
      }else{
        alert("Oh... We wish you could make it! Hope to see you soon!");
      }
    }, 1000);

});
