

// ADDING Classes

var id = "";
var subj = "";
// var sec = "";
var ins = "";

$('body').delegate( "#cla-opt-add" , "click" , function(){

	   $("#class-form").slideToggle();
});

$('body').delegate( "#done-add-cla-btn" , "click" , function(){

	   // sec = $('#class-form #sec').val();
	   subj = $('#class-form #subj').val();
	   ins = $('#class-form #ins').val();
	   console.log(sec + " " + subj);

	if(subj != "" ){
		$.ajax({
			url: siteurl + '/classes_con/add/',
			type: 'POST',
			data:{subject_no:subj,instructor_no: ins},
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

// EDITING Classes

$('body').delegate( "#cla-opt-edit" , "click" , function(){

	// var $btn = $(this).button('loading');
	   id = $('input[name="check-id"]:checked').closest('tr').find('td:eq(4)').text();
	   sec = $('input[name="check-id"]:checked').closest('tr').find('td:eq(2)').text();
	   subj = $('input[name="check-id"]:checked').closest('tr').find('td:eq(3)').text();
	   ins = $('input[name="check-id"]:checked').closest('tr').find('td:eq(8)').text();
	   var sec2 = $('input[name="check-id"]:checked').closest('tr').find('td:eq(5)').text();
	   var subj2 = $('input[name="check-id"]:checked').closest('tr').find('td:eq(6)').text();
	   var ins2 = $('input[name="check-id"]:checked').closest('tr').find('td:eq(7)').text();

		$('#edit-class-form #sec option:selected').val(sec2);
		$('#edit-class-form #subj option:selected').val(subj2);
		$('#edit-class-form #ins option:selected').val(ins2);
		$('#edit-class-form #sec option:selected').text(sec);
		$('#edit-class-form #subj option:selected').text(subj);
		$('#edit-class-form #ins option:selected').text(ins);

	   $("#edit-class-form " ).slideToggle();
});

$('body').delegate( "#done-edit-cla-btn" , "click" , function(){

	   sec = $('#edit-class-form #sec option:selected').val();
	   subj = $('#edit-class-form #subj option:selected').val();
	   ins = $('#edit-class-form #ins option:selected').val();
	   console.log(sec+ " " +subj+" "+ins);
	if(sec != "" ){
		$.ajax({
			url: siteurl + '/classes_con/update/' + id,
			type: 'POST',
			data:{subject_no:subj,instructor_no:ins},
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


var classes = [];

$('body').delegate( "#cla-opt-delete" , "click" , function(){

	// var $btn = $(this).button('loading');

	if($('input[name="check-id"]:checked').length > 1){
		classes = [];
		$('input[name="check-id"]:checked').each(function() {
		   classes.push(this.value);
		});
	}else{

	   var id = $('input[name="check-id"]:checked').closest('tr').find('td:eq(4)').text();
	   classes = [];
	   classes.push(id);
	}

});

$('body').delegate( "#delete-confirm-btn" , "click" , function(){

	for( var x = 0 ; x < classes.length ; x ++ ){

					$.ajax({
				 	  url: siteurl + '/classes_con/delete/' + classes[x],
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

// STUDENT IN CLASSES


$('body').delegate( "#cla-add-student" , "click" , function(){
	   $(".cla-add-std-form").slideToggle();
	   $(".cla-del-std-form").hide();
});

$('body').delegate( "#done-add-cla-std-btn" , "click" , function(){

	   var std = $('#std option:selected').val();
	   console.log(std);

	if(std != "" ){
		$.ajax({
			url: siteurl + '/class_students_con/add/',
			type: 'POST',
			data:{student_no:std,class_no:localStorage.getItem('class_open')},
			success: function(data) {
				$.ajax({
					url: siteurl + '/instructor_students_con/add/',
					type: 'POST',
					data:{student_no:std,instructor_no:localStorage.getItem('ins_open')},
					success: function(data) {
						location.reload();
					},
					error: function(e) {
						console.log(e.message);
					}
				});
			},
			error: function(e) {
				console.log(e.message);
			}
		});
	}
					
	
});

var class_std = [];

$('body').delegate( "#cla-del-student" , "click" , function(){

	// var $btn = $(this).button('loading');
	$(".cla-add-std-form").hide();
	$(".cla-del-std-form").slideToggle();

	// if($('input[name="check-id"]:checked').length > 1){
	// 	class_std = [];
	// 	$('input[name="check-id"]:checked').each(function() {
	// 	   class_std.push(this.value);
	// 	});
	// }else{

	   // var id = $('input[name="check-id"]:checked').closest('tr').find('td:eq(3)').text();
	   var id = $(this).closest('tr').find('td:eq(3)').text();
	   class_std = [];
	   class_std.push(id);
	// }

});

$('body').delegate( "#delete-confirm-btn" , "click" , function(){

	for( var x = 0 ; x < class_std.length ; x ++ ){

					$.ajax({
				 	  url: siteurl + '/class_students_con/delete/' + class_std[x],
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