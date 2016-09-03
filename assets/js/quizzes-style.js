

// ADDING quiz
$('body').delegate( "#open-quiz-btn" , "click" , function(){
	  var quiz = $(this).closest('tr').find('td:eq(2)').text();
	  $(".modal-title").text(quiz+"");
	  $("#dl-quiz").attr("href",baseurl+"assets/quizzes/"+quiz);
});

$('body').delegate( ".up-quiz-btn" , "click" , function(){
	  var id = $(this).closest('tr').find('td:eq(4)').text();
	  localStorage.setItem('quiz-selected-id',id);
});


var id = "";
var quiz = "";

$('body').delegate( "#quiz-opt-add" , "click" , function(){

	   $("#quiz-form").slideToggle();
});

$('body').delegate( "#done-add-quiz-btn" , "click" , function(){

	  var quiz = $('#userfile')[0].files[0].name;
	  var data = new FormData();
		data.append('userfile', $('#userfile')[0].files[0]);
	  console.log(quiz);
	if(quiz != "" ){
		$.ajax({
			url: siteurl + '/session_con/do_upload_quiz/',
			type: 'POST',
			data:data,
			mimeType: "multipart/form-data",
			cache: false,
			contentType: false,
			processData: false,
			success: function(data) {
				console.log(data);
				if(data == 1){
					$.ajax({
						url: siteurl + '/quizzes_con/add/',
						type: 'POST',
						data:{quiz:quiz,class_no:localStorage.getItem('class-selected-id')},
						success: function(data) {
							 console.log(data);
							location.reload();
						},
						error: function(e) {
							console.log(e.message);
						}
					});
				}
				
			},
			error: function(e) {
				console.log(e.message);
				$('#success').fadeOut();
				$('#error').fadeIh();
			}
		});
		
	}
					
	
});

// DELETING Quiz

var quiz_file = [];

$('body').delegate( "#top-opt-delete" , "click" , function(){

	// var $btn = $(this).button('loading');

	if($('input[name="check-id"]:checked').length > 1){
		quiz_file = [];
		$('input[name="check-id"]:checked').each(function() {
		   quiz_file.push(this.value);
		});
	}else{

	   var id = $('input[name="check-id"]:checked').closest('tr').find('td:eq(4)').text();
	   quiz_file = [];
	   quiz_file.push(id);
	}

});

$('body').delegate( "#delete-confirm-btn" , "click" , function(){

	for( var x = 0 ; x < quiz_file.length ; x ++ ){

					$.ajax({
				 	  url: siteurl + '/quizzes_con/delete/' + quiz_file[x],
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

$('body').delegate( "#upload-quiz-btn" , "click" , function(){

	  var ass = $('#userfile3')[0].files[0].name;
	  var data = new FormData();
		data.append('userfile', $('#userfile3')[0].files[0]);
	  console.log(ass);
	if(ass != "" ){
		$.ajax({
			url: siteurl + '/session_con/do_upload_quiz_ans/',
			type: 'POST',
			data:data,
			mimeType: "multipart/form-data",
			cache: false,
			contentType: false,
			processData: false,
			success: function(data) {
				console.log(data);
				if(data == 1){
					$.ajax({
						url: siteurl + '/quizzes_uploaded_con/add/',
						type: 'POST',
						data:{quiz:ass,student:localStorage.getItem('std-name'),quiz_no:localStorage.getItem('quiz-selected-id')},
						success: function(data) {
							 console.log(data);
							location.reload();
						},
						error: function(e) {
							console.log(e.message);
						}
					});
				}
				
			},
			error: function(e) {
				console.log(e.message);
				$('#success').fadeOut();
				$('#error').fadeIh();
			}
		});
		
	}
					
	
});