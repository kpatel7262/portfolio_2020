jQuery(document).ready(function () {
    
    $(".history").hide();
    $(".present-day").hide();
    
    $("#about_us").click(function(){
        $(".history").hide();
        $(".present-day").hide();
        $(".about-us").show();
    });
    
    $("#history").click(function(){
        $(".about-us").hide();
        $(".present-day").hide();
        $(".history").show();
    });
    
    $("#present_day").click(function (){
        $(".about-us").hide();
        $(".history").hide();
        $(".present-day").show();
    });
});
