var id;

$('body').delegate( "#open-ass-btn" , "click" , function(){
	  var topic = $(this).closest('tr').find('td:eq(2)').text();
	  $(".modal-title").text(topic+"");
	  $("#dl-ass").attr("href",baseurl+"assets/assignments/"+topic);
	  id = $(this).closest('tr').find('td:eq(4)').text();
	  localStorage.setItem('assignment-selected-id',id);

	  $.ajax({
			url: siteurl + '/assignments_con/get_ass_content/',
			type: 'POST',
			dataType:'JSON',
			data:{id:id},
				success: function(data) {
					$("#content").html(data[0].content);
					con_ed = data[0].content;
					if(data[0].content == ""){
						$(".no-con").show();
						$("#edit-topic-summ").hide();
						$("#cancel-top").hide();
					}else{
						$("#edit-topic-summ").show();
						$(".no-con").hide();
					}
				},
				error: function(e) {
					console.log(e.message);
				}
		});

});

$('body').delegate( ".up-ass-btn" , "click" , function(){
	  id = $(this).closest('tr').find('td:eq(4)').text();
	  localStorage.setItem('assignment-selected-id',id);
});


// ADDING ASS

var id = "";
var assignments = "";

$('body').delegate( ".done-add-ass-btn" , "click" , function(){

	if($('#opt-inp').val() == 'upload'){
		console.log('up');
		var topic = $('.topic-file')[0].files[0].name;
		console.log(topic);
		var data = new FormData();
		data.append('userfile', $('#userfile')[0].files[0]);
	  	$.ajax({
			url: siteurl + '/session_con/do_upload_ass/',
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
						url: siteurl + '/assignments_con/add/',
						type: 'POST',
						data:{assignment:topic,content:'',class_no:localStorage.getItem('class-selected-id')},
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
			url: siteurl + '/assignments_con/add/',
			type: 'POST',
			data:{assignment:topic,content:data,class_no:localStorage.getItem('class-selected-id')},
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

// DELETING ass

var ass_file = [];

$('body').delegate( "#ass-opt-delete" , "click" , function(){

	// var $btn = $(this).button('loading');

	if($('input[name="check-id"]:checked').length > 1){
		ass_file = [];
		$('input[name="check-id"]:checked').each(function() {
		   ass_file.push(this.value);
		});
	}else{

	   var id = $('input[name="check-id"]:checked').closest('tr').find('td:eq(4)').text();
	   ass_file = [];
	   ass_file.push(id);
	}

});

$('body').delegate( "#delete-confirm-btn" , "click" , function(){

	for( var x = 0 ; x < ass_file.length ; x ++ ){

					$.ajax({
				 	  url: siteurl + '/assignments_con/delete/' + ass_file[x],
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

$('body').delegate( "#upload-ass-btn" , "click" , function(){

	  var ass = $('#userfile2')[0].files[0].name;
	  var data = new FormData();
		data.append('userfile', $('#userfile2')[0].files[0]);
	  console.log(ass);
	if(ass != "" ){
		$.ajax({
			url: siteurl + '/session_con/do_upload_ass_ans/',
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
						url: siteurl + '/assignments_uploaded_con/add/',
						type: 'POST',
						data:{assignment:ass,student:localStorage.getItem('std-name'),ass_no:localStorage.getItem('assignment-selected-id')},
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