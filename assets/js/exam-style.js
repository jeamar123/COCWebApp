
// ADD EXAM

var cnt = 1;

$( "body" ).delegate( "#exam-open" , "click" , function(){
	$( ".add-exam-form" ).slideToggle();

});

$( "body" ).delegate( "#done-select-chapter-btn" , "click" , function(){

	var exam = $( ".add-exam-form #exam-name" ).val();
	var topic = $( ".add-exam-form #topic option:selected" ).text();
	var topic_no = $( ".add-exam-form #topic" ).val();
	console.log(exam + " " + topic + " " + topic_no);
	if( exam != '' ||  topic != '' ||  topic_no != ''){
		$.ajax({
			url: siteurl + '/exams_con/add',
			type: 'POST',
			data:{topic_no:topic_no,topic:topic,exam:exam,class_no:localStorage.getItem('class-selected-id')},
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

// EDITING EXAM

var exam_name = "";
var exam_id = "";
var tops = "";
var tops_no = "";

$( "body" ).delegate( "#exam-opt-edit" , "click" , function(){
	// tops = $('input[name="check-id"]:checked').closest('tr').find('td:eq(7)').text();
	exam_id = $('input[name="check-id"]:checked').closest('tr').find('td:eq(6)').text();
	exam_name =  $('input[name="check-id"]:checked').closest('tr').find('td:eq(3)').text();

	$('.edit-exam-form #exam-name').val(exam_name);
	// $('.edit-exam-form #topic option:selected').text(tops);

	$( ".edit-exam-form" ).slideToggle();
});

$('body').delegate( "#done-edit-exam-btn" , "click" , function(){

	   exam_name = $('.edit-exam-form #exam-name').val();
	   tops = $( ".edit-exam-form #topic option:selected" ).text();
	   tops_no = $( ".edit-exam-form #topic" ).val();

	if(exam_name != "" ){
		$.ajax({
			url: siteurl + '/exams_con/update/' + exam_id,
			type: 'POST',
			data:{exam:exam_name,topic:tops,topic_no:tops_no},
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

// DELETING EXAM
var exams = [];

$('body').delegate( "#exam-opt-delete" , "click" , function(){

	// var $btn = $(this).button('loading');

	if($('input[name="check-id"]:checked').length > 1){
		exams = [];
		$('input[name="check-id"]:checked').each(function() {
		   exams.push(this.value);
		});
	}else{

	   var id = $('input[name="check-id"]:checked').closest('tr').find('td:eq(5)').text();
	   exams = [];
	   exams.push(id);
	}

});

$('body').delegate( "#delete-confirm-btn" , "click" , function(){

	for( var x = 0 ; x < exams.length ; x ++ ){

					$.ajax({
				 	  url: siteurl + '/exams_con/delete/' + exams[x],
					  type: 'POST',
					  success: function(data) {
					  	location.reload();
					  },
					  error: function(e) {
						console.log(e.message + "sad");
					  }
					});
	}	
});

$('body').delegate( "#add-item-close" , "click" , function(){
	$('#hide-opts').hide();
	$('#item-type').hide();
	$('#show-opts').fadeIn();
	$('#exam-items-tbl').fadeIn();
});

$('body').delegate( "#show-opts" , "click" , function(){
	$('#hide-opts').fadeIn();
	$('#item-type').fadeIn();
	$('#show-opts').hide();
	$('#exam-items-tbl').hide();
});

$('body').delegate( "#hide-opts" , "click" , function(){
	$('#hide-opts').hide();
	$('#item-type').hide();
	$('#show-opts').fadeIn();
	$('#exam-items-tbl').fadeIn();
});

// MC TF IT ES

$('body').delegate( "#mc" , "click" , function(){
	$('#tf-type').hide();
	$('#it-type').hide();
	$('#es-type').hide();
	$('#mc-type').fadeIn();
});


var x = 2;

$('body').delegate( "#add-items" , "click" , function(){
	x = 2;
	var id = $(this).closest('tr').find('td:eq(6)').text();
	localStorage.setItem('exam-selected-id',id);
});

$('body').delegate( "#take-exam" , "click" , function(){
	var id = $(this).closest('tr').find('td:eq(6)').text();
	var name = $(this).closest('tr').find('td:eq(3)').text();
	console.log(id);
	localStorage.setItem('exam-selected-id',id);
	localStorage.setItem('exam-selected-name',name);
	$(".loading-spinner").fadeIn();
			$.ajax({
				url: siteurl + '/progress_con/get_res_status',
				type: 'POST',
				dataType: 'JSON',
				data:{'student_no' : localStorage.getItem('std-id'),'exam_no':localStorage.getItem('exam-selected-id')},
				success: function(data) {
					 console.log(data);

					 if( data != 0 ){
					 	setTimeout(function(){
					 		$(".loading-spinner").hide();
					 		$("#tk-exam").hide();
					 		$("#exam_take").hide();
						 	$("#al-exam").show();
						 	$("#exam_taken").show();
						 	$("#items").text(data[0].no_items + " / " + data[0].no_items);
						 	$("#rating").text(data[0].rating + " / " + data[0].no_items);
						 	$("#eval").text(data[0].evaluation);
					 	},100);
					 	
					 }else{
					 	setTimeout(function(){
					 		$(".loading-spinner").hide();
					 		$("#tk-exam").show();
					 		$("#exam_take").show();
						 	$("#al-exam").hide();
						 	$("#exam_taken").hide();
					 	},100);
					 }
				},
				error: function(e) {
					console.log(e.message);
				}
			});
});

// MULTIPLE CHOICE

$('body').delegate( "#add-mc-item-btn" , "click" , function(){
	var num = $('#mc-num').val();
	for(var a = 0; a < num; a++){
		$('.item-mc').append('<div class="form-mc"><div class="row"><div class="col-lg-12"><span class="mc-number">'+x+'.</span><button style="float:right;" class="close btn-close mc-close">&times;</button></div></div><div class="col-lg-12"><textarea id="question" col="50" rows="3" class="form-control" style="resize:none;" ></textarea><div class="radio"><label style="width:100%"><input type="radio" name="correct-answer'+(a+1)+'" value="1"><input id="answer1" type="text" class="form-control" placeholder="Answer 1"></label></div><div class="radio"><label style="width:100%"><input type="radio" name="correct-answer'+(a+1)+'" value="2"><input id="answer2" type="text" class="form-control" placeholder="Answer 2"></label></div><div class="radio"><label style="width:100%"><input type="radio" name="correct-answer'+(a+1)+'" value="3"><input id="answer3" type="text" class="form-control" placeholder="Answer 3"></label></div><div class="radio"><label style="width:100%"><input type="radio" name="correct-answer'+(a+1)+'" value="4"><input id="answer4" type="text" class="form-control" placeholder="Answer 4"></label></div></div></div><br>');
		x++;
	}
});


$('body').delegate( ".mc-close" , "click" , function(){
	$(this).closest('.form-mc').remove();
	x--;
	for(var a = 0;a < x; a++){
		$(".mc-number:eq(" +a+ ")").text((a+1)+".");
	}
	
});

$('body').delegate( "#done-mc-item-btn" , "click" , function(){

	for(var counter = 0;counter < ($( ".form-mc" ).length); counter ++ ){

		var a = $(".form-mc:eq("+counter+") #question").val();
		var b = $(".form-mc:eq("+counter+") #answer1").val();
		var c = $(".form-mc:eq("+counter+") #answer2").val();
		var d = $(".form-mc:eq("+counter+") #answer3").val();
		var e = $(".form-mc:eq("+counter+") #answer4").val();
		var f = $(".form-mc:eq("+counter+") input[name=correct-answer" + counter + "]:checked").val();

		console.log(a + "1 " + b + "2 " + c + "3 " + d + "4 " + e + "5 " + f);

		if(a == "" || b == "" || c == "" || d == "" || e == "" || f == undefined){
			$("#alert-add-exam-item").show();
		}else{
			$.ajax({
				url: siteurl + '/exam_items_con/add/',
				type: 'POST',
				dataType: 'JSON',
				data:{exam_no:localStorage.getItem('exam-selected-id'), question:a,answer1:b,answer2:c,answer3:d,answer4:e,answer:f},
				success: function(data) {
					 console.log(data);
					location.reload();
				},
				error: function(e) {
					console.log(e.message);
				}
			});
		}

		
	}
	

});

$('body').delegate( "#delete-exam-item" , "click" , function(){
	var id = $(this).closest('tr').find('td:eq(2)').text();
		$.ajax({
			url: siteurl + '/exam_items_con/delete/' + id,
			type: 'POST',
			dataType: 'JSON',
			success: function(data) {
				 console.log(data);
				location.reload();
			},
			error: function(e) {
				console.log(e.message);
			}
		});
	
});

$('body').delegate( "#show-edit" , "click" , function(){
	$('.item-edit').fadeIn();
	$('#hide-edit').show();
	$('.item-view').hide();
	$('#show-edit').hide();
});

$('body').delegate( "#hide-edit" , "click" , function(){
	$('.item-edit').hide();
	$('#hide-edit').hide();
	$('.item-view').fadeIn();
	$('#show-edit').show();
});

$('body').delegate( "#done-edit-item" , "click" , function(){
	var id = localStorage.getItem('item-selected-id');

	var a = $(".item-edit #edit-item-question").val();
		var b = $(".item-edit #edit-item-answer1").val();
		var c = $(".item-edit #edit-item-answer2").val();
		var d = $(".item-edit #edit-item-answer3").val();
		var e = $(".item-edit #edit-item-answer4").val();
		var f = $(".item-edit input[name=correct-answer0]:checked").val();

		console.log(a + " " + b + " " + c + " " + d + " " + e + " " + f);

		$.ajax({
			url: siteurl + '/exam_items_con/update/'+id,
			type: 'POST',
			dataType: 'JSON',
			data:{question:a,answer1:b,answer2:c,answer3:d,answer4:e,answer:f},
			success: function(data) {
				 console.log(data);
				location.reload();
			},
			error: function(e) {
				console.log(e.message);
			}
		});

});

var id;

$('body').delegate( "#add-timer-btn" , "click" , function(){
	id = $(this).closest('tr').find('td:eq(6)').text();
		console.log(id);
});

$('body').delegate( "#assign-timer-btn" , "click" , function(){
	var h = parseInt(document.getElementById("hours").value) || 0;
	var m = parseInt(document.getElementById("minutes").value) || 0;
	var s = parseInt(document.getElementById("seconds").value) || 0;
	var time = h + " h " + m + " m " + s + " s " ;
	if( h != 0 || m != 0 || s != 0 ){
		$.ajax({
			url: siteurl + '/exams_con/update/'+id,
			type: 'POST',
			dataType: 'JSON',
			data:{exam_timer:time,'timer_h':h,'timer_m':m,'timer_s':s},
			success: function(data) {
				 console.log(data);
				location.reload();
			},
			error: function(e) {
				console.log(e.message);
			}
		});
	}else{
		$.ajax({
			url: siteurl + '/exams_con/update/'+id,
			type: 'POST',
			dataType: 'JSON',
			data:{exam_timer:"Off",'timer_h':h,'timer_m':m,'timer_s':s},
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

$('body').delegate( "#open-exam" , "click" , function(){

		$.ajax({
			url: siteurl + '/exams_con/update/'+id,
			type: 'POST',
			dataType: 'JSON',
			data:{'status':'Open'},
			success: function(data) {
				 console.log(data);
				location.reload();
			},
			error: function(e) {
				console.log(e.message);
			}
		});
		

});

$('body').delegate( "#close-exam" , "click" , function(){

		$.ajax({
			url: siteurl + '/exams_con/update/'+id,
			type: 'POST',
			dataType: 'JSON',
			data:{'status':'Closed'},
			success: function(data) {
				 console.log(data);
				location.reload();
			},
			error: function(e) {
				console.log(e.message);
			}
		});
		

});



$('body').delegate( "#show-stats" , "click" , function(){
	$('#timers').hide();
	$('.sets-btn').hide();
	$('#stats').fadeIn();
	$('#hide-btns').show();
});

$('body').delegate( "#show-tims" , "click" , function(){
	$('#timers').fadeIn();
	$('.sets-btn').hide();
	$('#stats').hide();
	$('#hide-btns').show();
});

$('body').delegate( "#hide-btns" , "click" , function(){
	$('#timers').hide();
	$('.sets-btn').fadeIn();
	$('#stats').hide();
	$('#hide-btns').hide();
});