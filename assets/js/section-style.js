

// ADDING SECTIONS

var id = "";
var sec = "";

$('body').delegate( "#sec-opt-add" , "click" , function(){

	   $("#sections-form").slideToggle();
});

$('body').delegate( "#done-add-sec-btn" , "click" , function(){

	   sec = $('#sections-form #sec').val();

	if(sec != "" ){
		$.ajax({
			url: siteurl + '/sections_con/add/',
			type: 'POST',
			data:{section:sec},
			success: function(data) {
				 console.log(data);
				location.reload();
			},
			error: function(e) {
				console.log(e.message);
			}
		});
	}
					
	
});

// EDITING SECTIONS

$('body').delegate( "#sec-opt-edit" , "click" , function(){

	// var $btn = $(this).button('loading');
	   id = $('input[name="check-id"]:checked').closest('tr').find('td:eq(4)').text();
	   sec = $('input[name="check-id"]:checked').closest('tr').find('td:eq(2)').text();

	   console.log(id + " " + sec);

		$('#edit-sections-form #sec').val(sec);

	   $("#edit-sections-form").slideToggle();
});

$('body').delegate( "#done-edit-sec-btn" , "click" , function(){

	   sec = $('#edit-sections-form #sec').val();

	if(sec != "" ){
		$.ajax({
			url: siteurl + '/sections_con/update/' + id,
			type: 'POST',
			data:{section:sec},
			success: function(data) {
				 console.log(data);
				location.reload();
			},
			error: function(e) {
				console.log(e.message);
			}
		});
	}
});

// DELETING SECTIONS

var sections = [];

$('body').delegate( "#sec-opt-delete" , "click" , function(){

	// var $btn = $(this).button('loading');

	if($('input[name="check-id"]:checked').length > 1){
		sections = [];
		$('input[name="check-id"]:checked').each(function() {
		   sections.push(this.value);
		});
	}else{

	   var id = $('input[name="check-id"]:checked').closest('tr').find('td:eq(4)').text();
	   sections = [];
	   sections.push(id);
	}

});

$('body').delegate( "#delete-confirm-btn" , "click" , function(){

	for( var x = 0 ; x < sections.length ; x ++ ){

					$.ajax({
				 	  url: siteurl + '/sections_con/delete/' + sections[x],
					  type: 'POST',
					  success: function(data) {
					  	location.reload();
					  },
					  error: function(e) {
						console.log(e.message);
					  }
					});
	}	
});

var sec_id;

$('body').delegate( "#passcode-btn" , "click" , function(){
	sec_id = $( this ).closest( 'tr' ).find( 'td:eq(5)' ).text( );
});

$('body').delegate( "#done-add-passcode" , "click" , function(){
	var passcode = $("#pcode").val();
	if( passcode != "" ){
		$.ajax({
				 	  url: siteurl + '/sections_con/update/' + sec_id,
					  type: 'POST',
					  data:{'passcode':passcode},
					  success: function(data) {
					  	location.reload();
					  },
					  error: function(e) {
						console.log(e.message);
					  }
					});
	}
		
});

$('body').delegate( "#rem-passcode-btn" , "click" , function(){
	sec_id = $( this ).closest( 'tr' ).find( 'td:eq(5)' ).text();
	$.ajax({
				 	  url: siteurl + '/sections_con/update/' + sec_id,
					  type: 'POST',
					  data:{'passcode':""},
					  success: function(data) {
					  	location.reload();
					  },
					  error: function(e) {
						console.log(e.message);
					  }
					});
});
