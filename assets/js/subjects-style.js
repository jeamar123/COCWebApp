

// ADDING Subjects

var id = "";
var subj = "";

$('body').delegate( "#sub-opt-add" , "click" , function(){

	   $("#subject-form").slideToggle();
});

$('body').delegate( "#done-add-sub-btn" , "click" , function(){

	   subj = $('#subject-form #subj').val();

	if(subj != "" ){
		$.ajax({
			url: siteurl + '/subjects_con/add/',
			type: 'POST',
			data:{subject:subj},
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

$('body').delegate( "#sub-opt-edit" , "click" , function(){

	// var $btn = $(this).button('loading');
	   id = $('input[name="check-id"]:checked').closest('tr').find('td:eq(3)').text();
	   subj = $('input[name="check-id"]:checked').closest('tr').find('td:eq(2)').text();

	   console.log(id + " " + subj);

		$('#edit-subject-form #subj').val(subj);

	   $("#edit-subject-form").slideToggle();
});

$('body').delegate( "#done-edit-sub-btn" , "click" , function(){

	   subj = $('#edit-subject-form #subj').val();

	if(subj != "" ){
		$.ajax({
			url: siteurl + '/subjects_con/update/' + id,
			type: 'POST',
			data:{subject:subj},
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

// DELETING Subjects

var subjects = [];

$('body').delegate( "#sub-opt-delete" , "click" , function(){

	// var $btn = $(this).button('loading');

	if($('input[name="check-id"]:checked').length > 1){
		subjects = [];
		$('input[name="check-id"]:checked').each(function() {
		   subjects.push(this.value);
		});
	}else{

	   var id = $('input[name="check-id"]:checked').closest('tr').find('td:eq(3)').text();
	   subjects = [];
	   subjects.push(id);
	}

});

$('body').delegate( "#delete-confirm-btn" , "click" , function(){

	for( var x = 0 ; x < subjects.length ; x ++ ){

					$.ajax({
				 	  url: siteurl + '/subjects_con/delete/' + subjects[x],
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
