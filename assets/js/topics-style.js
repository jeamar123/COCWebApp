var con_ed = "";
var topic_id = "";
$('body').delegate( "#open-topic-btn" , "click" , function(){
	  var topic = $(this).closest('tr').find('td:eq(2)').text();
	  $(".modal-title").text(topic+"");
	  topic_id = $(this).closest('tr').find('td:eq(3)').text();
	  console.log(topic_id);
	  var num = $(this).closest('tr').find('td:eq(4)').text();
	  var cat = $(this).closest('tr').find('td:eq(1)').text();
	  $("#content").load(baseurl+"/assets/files/cat"+cat+"/"+num+".htm"); 
	  

});

// ADDING TOPIC

var id = "";
var topic = "";

// $('body').delegate( "#top-opt-add" , "click" , function(){

// 	   $("#topic-form").slideToggle();
// });

$('body').delegate( ".done-add-top-btn" , "click" , function(){
	
	
	if($('#opt-inp').val() == 'upload'){
		var topic = $('.topic-file')[0].files[0].name;
		console.log(topic);
		var data = new FormData();
		data.append('userfile', $('#userfile')[0].files[0]);
	  	$.ajax({
			url: siteurl + '/session_con/do_upload_topics/',
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
						url: siteurl + '/topics_con/add/',
						type: 'POST',
						data:{topic:topic,content:'',class_no:localStorage.getItem('class-selected-id')},
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
	}else if($('#opt-inp').val() == 'manual'){
		var topic = $('#rev-title').val();
		console.log(topic);
		var data = $( "#summernote" ).code();
		console.log(data);
		$.ajax({
			url: siteurl + '/topics_con/add/',
			type: 'POST',
			data:{topic:topic,content:data,class_no:localStorage.getItem('class-selected-id')},
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

// DELETING TOPICS

var topic_file = [];

$('body').delegate( "#top-opt-delete" , "click" , function(){

	// var $btn = $(this).button('loading');

	if($('input[name="check-id"]:checked').length > 1){
		topic_file = [];
		$('input[name="check-id"]:checked').each(function() {
		   topic_file.push(this.value);
		});
	}else{

	   var id = $('input[name="check-id"]:checked').closest('tr').find('td:eq(4)').text();
	   topic_file = [];
	   topic_file.push(id);
	}

});

$('body').delegate( "#delete-confirm-btn" , "click" , function(){

	for( var x = 0 ; x < topic_file.length ; x ++ ){

					$.ajax({
				 	  url: siteurl + '/topics_con/delete/' + topic_file[x],
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


$('body').delegate( "#show-ups" , "click" , function(){
	$('#opt-inp').val('upload');
	console.log($('#opt-inp').val());
	$('.ups').show();
	$('.summ').hide();
});


//SUMMERNOTE

$( "body" ).delegate( "#summernote-open" , "click" ,function() {
  $('#opt-inp').val('manual');	
  console.log($('#opt-inp').val());
  $('.summ').show();
  $('.ups').hide();	

  $('#summernote').summernote({
	  height: 300,                 // set editor height
	  minHeight: null,             // set minimum height of editor
	  maxHeight: null,             // set maximum height of editor
	  focus: true,                 // set focus to editable area after initializing summernote
	  toolbar: [
	    //[groupname, [button list]]
	     	
	    ['style', ['style', 'fontname', 'fontsize']],
	    ['color', [ 'color']],
	    ['style2', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
	    ['layout', ['ul', 'ol', 'height']],
	    ['para', ['paragraph']],
	    ['insert', ['hr','picture', 'link', 'video', 'table']],
	    ['misc', ['undo','redo', 'help']],
	  ]
	});
});

$( "body" ).delegate( "#summernote-close" , "click" , function(){
	$( "#summernote" ).code("");
	$( "#content-edit" ).code("");
});

$( "body" ).delegate( "#edit-topic-summ" , "click" , function(){
	$( ".edit-content" ).show();
	$( "#content" ).hide();
	$( "#cancel-top" ).show();
	$( "#edit-topic-summ" ).hide();
	$('#content-edit').summernote({
	  height: 300,                 // set editor height
	  minHeight: null,             // set minimum height of editor
	  maxHeight: null,             // set maximum height of editor
	  focus: true,                 // set focus to editable area after initializing summernote
	  toolbar: [
	    //[groupname, [button list]]
	     	
	    ['style', ['style', 'fontname', 'fontsize']],
	    ['color', [ 'color']],
	    ['style2', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
	    ['layout', ['ul', 'ol', 'height']],
	    ['para', ['paragraph']],
	    ['insert', ['hr','picture', 'link', 'video', 'table']],
	    ['misc', ['undo','redo', 'help']],
	  ]
	});
	$( "#content-edit" ).code(con_ed+"");
});

$( "body" ).delegate( "#cancel-top" , "click" , function(){
	$( ".edit-content" ).hide();
	$( "#content" ).show();
	$( "#cancel-top" ).hide();
	$( "#edit-topic-summ" ).show();
});

$( "body" ).delegate( "#done-edit-sum" , "click" , function(){
	var data = $( "#content-edit" ).code();
		console.log(data);
		$.ajax({
			url: siteurl + '/topics_con/update/' + topic_id,
			type: 'POST',
			data:{content:data},
				success: function(data) {
					console.log(data);
					location.reload();
				},
				error: function(e) {
					console.log(e.message);
				}
		});
});
