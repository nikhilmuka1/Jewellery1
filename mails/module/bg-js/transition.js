$(document).ready(function(){
						   
	$(window).bind("unload", function() { });
	
	$("body").hide();
	$("body").fadeIn(700);
	
	$("a.fade").click(function(event){
		event.preventDefault();
		linkLocation = this.href;
		$("#wrap").fadeOut(700, redirectPage);
	});
	
	$("a.fadeblog").click(function(event){
		event.preventDefault();
		linkLocation = this.href;
		$("#blogwrap").fadeOut(700, redirectPage);
	});
	
	function redirectPage() {
		window.location = linkLocation;
	}

});