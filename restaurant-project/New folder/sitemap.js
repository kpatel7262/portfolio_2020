


jQuery(document).ready(function(){
	//alert("welcome to the sitemap of RACCO restaurent");
	$("#subMenu").hide();
	$("#sitemap").hide();
	$("#eventList").hide();
	
	//alert(document.getElementById("menu"));
	$("#mainMenu").click(showFunction);
	$("#eventMenu").click(showFunction2);
	$("#sitemapHeader").click(sitemap);
	$("a").click(links);
	$( "a" ).hover(links2);
	
	
	function showFunction(){
		//alert("This is the submenu of Menu");
		$("#subMenu").toggle(3000);
	}
	function sitemap(){
		//alert("This is the sitemap of RACCO restaurent");
		$("#sitemap").toggle(3000);
	}
	function showFunction2(){
		//alert("This is the submenu of Events");
		$("#eventList").toggle(3000);
	}
	function links(){
    $("a").css("color","#CB2D5A");
	}
	function links2(){
  	$("a").css("color","rgb(195, 144, 144)")
	}
	
	
});

	
