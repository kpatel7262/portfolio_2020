jQuery(document).ready(function(){
	$('.menu-section').hide();
	/*$('h2').hide();*/
	$('.menu-type').click(function(){
		/*This I looked up on google.
		https://www.w3schools.com/jsref/met_element_getattribute.asp
		var x= this.getAttribute('data-toggle');
		console.log(x);
		Since console.log(x) gave me the required attribute. I appended "." so that it becomes the required class */
		$('.menu-section').hide();
		$('h2').hide();
		$('.'+this.getAttribute('data-toggle')).show();
		$('.'+this.getAttribute('data-select')).show();
		
	}
	);//end of click
	
	$('#date').html(new Date().toDateString());
	/*careers*/
	$('.desc').hide();
	$('tr').click(function(){
		$('.desc').hide();
		$(this).find('td.desc').show();
	});//end of click table
	
	
});//end of onlaod