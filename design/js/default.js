$(function() {
	$( "#tabs" ).tabs();
});

function toggletab(el, em)
{

		if( $('#display' + el).is(':visible') ) {
				$('#tab' + el).removeClass('tabhighlight');
				$('#display' + el).hide('blind','slow');
				return true;;
		}

    var arr = [ "PVP", "PK", "KARMA"];

    jQuery.each(arr, function() {
	
		if( $('#display' + this).is(':visible') ) {
			$('#tab' + this).removeClass('tabhighlight');
			$('#display' + this).hide('blind','slow');
		}
		
   });
	
	$('#tab' + el).toggleClass("tabhighlight");
	$('#display' + el).show('blind','slow');
	
	return true;
}