
$("form").submit(function(e){
	e.preventDefault();
});


$('.modal').on('hidden.bs.modal', function (e) {
  	// $('input').val('');
	$('.alert').hide();
	$('.questionnaire').remove();
	$('#number-items').show();
	$('.done-btn').hide();
	$('#edit-item-modal #question').text("");
	$('#edit-item-modal #answer1').val("");
	$('#edit-item-modal #answer2').val("");
	$('#edit-item-modal #answer3').val("");
	$('#edit-item-modal #answer4').val("");
	$('#edit-item-modal input[name=correct-ans]:checked').prop('checked',false);
	$( ".passcode-timer" ).hide();
	$( ".cancel-timer" ).hide();
	$( ".show-limit-btn" ).show();
})


$("body").delegate('#passcode-btn','click',function(){
	if($('input[name="check-id"]:checked').length > 0){
		$('input[name="check-id"]:checked').each(function() {
		   console.log(this.value);
		});
	}else{

	   var value = $(this).closest('tr').find('td:eq(1)').text(); // for third column
	   console.log(value);
	}
});


$("body").delegate('#dropmenu-classes-btn','click',function(){
	$('#dropmenu-classes').slideToggle();
});

$("body").delegate('#class-selected-btn','click',function(){
	var a = $(this).text();
	var b = $(this).closest('li').find('#class-selected-id').text();
	localStorage.setItem('class-selected',a);
	localStorage.setItem('class-selected-id',b);
});

$("body").delegate('#update-admin-btn','click',function(){

	var a = $("#admin-uname").val();
	var b = $("#admin-pass").val();
	if(a !== '' && b != ''){
		$.ajax({
			url: siteurl + '/session_con/update/' + localStorage.getItem("user-id"),
			type: 'POST',
			data:{username:a,password:b},
			success: function(data) {
				$('#success').fadeIn();
				$('#error').fadeOut();
				localStorage.setItem("uname",a)
				localStorage.setItem("pass",b)
			},
			error: function(e) {
				console.log(e.message);
			}
		});
	}else{
		$('#error').fadeIn();
		$('#success').fadeOut();
	}
		
});

$("body").delegate('#update-ins-btn','submit',function(){

	var a = $("#ins-uname").val();
	var b = $("#ins-pass").val();
	var c = $(".ins-img").val().split('\\').pop();
	console.log(c);
	var data = new FormData();
	data.append('userfile', $('#userfile')[0].files[0]);
	if(c != ''){
		if(a !== '' && b != ''){
			$.ajax({
				url: siteurl + '/session_con/do_upload/',
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
							url: siteurl + '/session_con/update/' + localStorage.getItem("user-id"),
							type: 'POST',
							data:{username:a,password:b,img:c},
							success: function(data) {
								$('#success').fadeIn();
								$('#error').fadeOut();
								localStorage.setItem("uname",a)
								localStorage.setItem("pass",b)
								localStorage.setItem("img",c)
								location.reload();
							},
							error: function(e) {
								console.log(e.message);
								$('#success').fadeOut();
								$('#error').fadeIh();
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
		}else{
			$('#error').fadeIn();
			$('#success').fadeOut();
		}
		
	}else{
		if(a !== '' && b != ''){
			$.ajax({
					url: siteurl + '/session_con/update/' + localStorage.getItem("user-id"),
					type: 'POST',
					data:{username:a,password:b},
					success: function(data) {
						$('#success').fadeIn();
						$('#error').fadeOut();
						localStorage.setItem("uname",a)
						localStorage.setItem("pass",b)
					},
					error: function(e) {
						console.log(e.message);
						$('#success').fadeOut();
						$('#error').fadeIh();
					}
				});
			
		}else{
			$('#error').fadeIn();
			$('#success').fadeOut();
		}
		
	}
	
		
});

$("body").delegate('#update-std-btn','click',function(){

	var a = $("#std-uname").val();
	var b = $("#std-pass").val();
	var c = $(".std-img").val().split('\\').pop();
	var data = new FormData();
	data.append('userfile', $('#userfile')[0].files[0]);

	if(c != ''){
		if(a !== '' && b != ''){
			$.ajax({
				url: siteurl + '/session_con/do_upload/',
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
							url: siteurl + '/session_con/update/' + localStorage.getItem("user-id"),
							type: 'POST',
							data:{username:a,password:b,img:c},
							success: function(data) {
								$('#success').fadeIn();
								$('#error').fadeOut();
								localStorage.setItem("uname",a)
								localStorage.setItem("pass",b)
								localStorage.setItem("img",c)
								location.reload();
							},
							error: function(e) {
								console.log(e.message);
								$('#success').fadeOut();
								$('#error').fadeIh();
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
		}else{
			$('#error').fadeIn();
			$('#success').fadeOut();
		}
		
	}else{
		if(a !== '' && b != ''){
			$.ajax({
					url: siteurl + '/session_con/update/' + localStorage.getItem("user-id"),
					type: 'POST',
					data:{username:a,password:b},
					success: function(data) {
						$('#success').fadeIn();
						$('#error').fadeOut();
						localStorage.setItem("uname",a)
						localStorage.setItem("pass",b)
					},
					error: function(e) {
						console.log(e.message);
						$('#success').fadeOut();
						$('#error').fadeIh();
					}
				});
			
		}else{
			$('#error').fadeIn();
			$('#success').fadeOut();
		}
		
	}
		
});

$(document).ready(function(){
    $("#admin-uname").val(localStorage.getItem("uname")+"");
    $("#admin-pass").val(localStorage.getItem("pass")+"");
    $("#ins-uname").val(localStorage.getItem("uname")+"");
    $("#ins-pass").val(localStorage.getItem("pass")+"");
    $("#std-uname").val(localStorage.getItem("uname")+"");
    $("#std-pass").val(localStorage.getItem("pass")+"");
    $("#p-img").attr('src',baseurl + '/assets/img/'+localStorage.getItem("img"));
});









           






// ANGULAR

angular.module('App', [])

.controller('mainController', function($http,$scope, $log) {

  $scope.getDatetime = new Date();	
  
  $scope.students = [];
  $scope.instructors = [];
  $scope.reviewers = [];
  $scope.exams = [];
  $scope.exam_items = [];
  $scope.items = [];
  $scope.ans_exam_items = [];
  $scope.evaluate_exam = [];
  $scope.progress = [];
  $scope.progress_items = [];
  $scope.sections = [];
  $scope.subjects = [];
  $scope.classe = [];
  $scope.topics = [];
  $scope.no_results = 0;
  $scope.no_exams = 0;
  $scope.no_students = 0;
  
  var cat_arr = [];
  var fail_arr = [];
  var pass_arr = [];

  	if( localStorage.getItem("user-type") == 'admin'){
  		console.log('admin');
  		// ALL STUDENTS
  		$http({
	  		method: 'POST',
	  		url: siteurl + '/students_con/get_all_students',
	  		data: $.param({'user_type' : 'student'}),
		    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).
		  success(function(data) {
		   	$scope.students = data;
		   	console.log($scope.students);
		  });
		// ALL CLASSES
		$http({
	  		method: 'POST',
	  		url: siteurl + '/classes_con/get_all_classes',
	  		data: $.param({'instructor_no' : localStorage.getItem("user-id")}),
		    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).
		  success(function(data) {
		   	$scope.classe = data;
		  });
		//ALL INSTRUCTORS 
		$http({
	  		method: 'POST',
	  		url: siteurl + '/instructors_con/get_instructors',
	  		data: $.param({'user_type' : 'instructor'}),
		    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).
		  success(function(data) {
			   	$scope.instructors = data;
			  });
		
			  
  	}else if( localStorage.getItem("user-type") == 'instructor'){
  		console.log(localStorage.getItem("user-id"));
		$http({
	  		method: 'POST',
	  		url: siteurl + '/students_con/get_students_by_class_no',
	  		data: $.param({'class_no' : localStorage.getItem("class-selected-id")}),
		    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).
		  success(function(data) {
		   	$scope.students = data;

		   	console.log(data);
		  });

		$http({
	  		method: 'POST',
	  		url: siteurl + '/classes_con/get_classes_by_ins',
	  		data: $.param({'instructor_no' : localStorage.getItem("ins-id")}),
		    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).
		  success(function(data) {
		   	$scope.classe = data;
		   	console.log(data);
		  });

		 $http({
	  		method: 'POST',
	  		url: siteurl + '/results_con/get_results',
	  		data: $.param({'class_no' : localStorage.getItem("class-selected-id")}),
		    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).
		  success(function(data) {
		   	$scope.results = data;
		  });
  	}else if( localStorage.getItem("user-type") == 'student'){
  		console.log(localStorage.getItem("std-id"));
  		$http({
	  		method: 'POST',
	  		url: siteurl + '/classes_con/get_classes_by_std',
	  		data: $.param({'student_no' : localStorage.getItem("std-id")}),
		    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).
		  success(function(data) {
		   	$scope.classe = data;
		   	console.log(data);
		  });
		$http({
	  		method: 'POST',
	  		url: siteurl + '/progress_con/get_progress',
	  		data: $.param({'student_no' : localStorage.getItem("std-id")}),
		    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).
		  success(function(data) {
		   	$scope.results = data;
		  });
		  /// SET EXAM DETAILS


		$http({
	  		method: 'POST',
	  		url: siteurl + '/exams_con/get_exam',
	  		data: $.param({'id' : localStorage.getItem("exam-selected-id")}),
		    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).
		  success(function(data) {
		   	console.log("EXAM DETAIlS");
		   	$("#exam_name").text(data[0].exam);
		   	$("#exam_time").text(data[0].exam_timer);
		   	$("#exam_status").text(data[0].status);

		   	if(data[0].status == 'Closed'){
		   		$("#start_exam_btn").hide();
		   	}else{
		   		$("#start_exam_btn").show();
		   	}
		  });
  	}
 
 
  
  $http.get(siteurl + '/sections_con/get').
	  success(function(data) {
	   	$scope.sections = data;
	  });
  $http.get(siteurl + '/topics_con/get').
	  success(function(data) {
	   	$scope.topics = data;
	  });
  // $http({
	 //  method: 'POST',
	 //  url: siteurl + '/topics_con/get_topics_by_class_no',
	 //  data: $.param({'class_no' : localStorage.getItem('class-selected-id')}),
	 //  headers: {'Content-Type': 'application/x-www-form-urlencoded'}
  // }).
  //   success(function(data) {
	 //   $scope.topics = data;
	 //   console.log(data);
  // 	});
  $http({
	  method: 'POST',
	  url: siteurl + '/	exams_con/get_exams_by_class_no',
	  data: $.param({'class_no' : localStorage.getItem('class-selected-id')}),
	  headers: {'Content-Type': 'application/x-www-form-urlencoded'}
  }).
    success(function(data) {
	   $scope.exams = data;
	   console.log(data);
  	});
  $http.get(siteurl + '/subjects_con/get').
	  success(function(data) {
	   	$scope.subjects = data;
	  });			


// CUSTOM FUNCTIONS ANGULAR

	$scope.open_instructors = function(id,sess_no,name){
		$scope.classes_by_ins = [];
		$http({
	  		method: 'POST',
	  		url: siteurl + '/classes_con/get_classes_by_ins',
	  		data: $.param({'instructor_no' : id}),
		    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).
		  success(function(data) {
		  	$(".modal-title").text(name);
		   	$scope.classes_by_ins = data;
		   	console.log(data);
		  });
	}

	$scope.open_classes = function(id,subject,section,ins_no){
		$scope.students_by_class = [];
		$http({
	  		method: 'POST',
	  		url: siteurl + '/class_students_con/get_students_by_class',
	  		data: $.param({'class_no' : id}),
		    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).
		  success(function(data) {
		  	$(".modal-title").text(subject + " : " + section);
		   	$scope.students_by_class = data;
		   	localStorage.setItem('class_open',id);
		   	localStorage.setItem('ins_open',ins_no);
		   	console.log(data);
		  });
	}

	$scope.open_students = function(id,name){
		$scope.classes_by_std = [];
		$http({
	  		method: 'POST',
	  		url: siteurl + '/class_students_con/get_classes_by_student',
	  		data: $.param({'student_no' : id}),
		    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).
		  success(function(data) {
		  	$(".modal-title").text(name);
		  	console.log(id);
		   	localStorage.setItem('std_open',id);
		   	for(a in data){
		   		$http({
			  		method: 'POST',
			  		url: siteurl + '/classes_con/get_classes_by_id',
			  		data: $.param({'id' : data[a].class_no}),
				    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
				}).
				  success(function(data2) {
				   	$scope.classes_by_std.push(data2[0]);
				  });
		   	}
		  });
	}
	  
	$scope.get_items = function(id){
		console.log(id);

		$http({
	  		method: 'POST',
	  		url: siteurl + '/exam_items_con/get_items',
	  		data: $.param({'exam_no' : id}),
		    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).
		  success(function(data) {
		   	$scope.items = data;
		  });
	}

	$scope.get_item = function(id){
		console.log(id);
		localStorage.setItem('item-selected-id',id);
		$http({
	  		method: 'POST',
	  		url: siteurl + '/exam_items_con/get_item',
	  		data: $.param({'id' : id}),
		    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).
		  success(function(data) {
		  	console.log(data[0].question);
		  	setTimeout(function(){
		  		$("#exam_question").text(data[0].question);
		  		$("#exam_answer1").text(data[0].answer1);
		  		$("#exam_answer2").text(data[0].answer2);
		  		$("#exam_answer3").text(data[0].answer3);
		  		$("#exam_answer4").text(data[0].answer4);

		  		$("#edit-item-question").val(data[0].question);
		  		$("#edit-item-answer1").val(data[0].answer1);
		  		$("#edit-item-answer2").val(data[0].answer2);
		  		$("#edit-item-answer3").val(data[0].answer3);
		  		$("#edit-item-answer4").val(data[0].answer4);
		  		$(".item-edit input[type=radio]:eq("+(data[0].answer-1)+")").attr('checked','checked');

		  		$("#exam_answer"+data[0].answer).css('color','green');
		   	},100);
		  });
	}


	$scope.exam_timer = function(){
		var id = localStorage.getItem('exam-selected-id');
		$http({
	  		method: 'POST',
	  		url: siteurl + '/exams_con/get_exam',
	  		data: $.param({'id' : id}),
		    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).
		  success(function(data) {
		  	console.log(data[0]);
		  	console.log(data[0].timer_h + " " + data[0].timer_m + " " + data[0].timer_s );

		  	localStorage.setItem('h',data[0].timer_h);
		  	localStorage.setItem('m',data[0].timer_m);
		  	localStorage.setItem('s',data[0].timer_s);
		  });

	}

	var time_toggle;
	var rand;
	var cnt = 1;
	var current_item_id;
	$scope.get_exam_items = function(){
		$scope.ans_exam_items = [];

		cnt = 1;
		var id = localStorage.getItem('exam-selected-id');
		console.log(id);
		$http({
	  		method: 'POST',
	  		url: siteurl + '/exam_items_con/get_items',
	  		data: $.param({'exam_no' : id}),
		    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).
		  success(function(data) {
		  	
		  	console.log(data);
		  	
		  	$scope.exam_items = data;

		  		var item = $scope.exam_items[Math.floor(Math.random() * ($scope.exam_items.length))];
				rand = $scope.exam_items.indexOf(item);
				$scope.exam_items.splice(rand,1);
				current_item_id = item.id;
				if($scope.exam_items.length == 1){
			  		$(".exam_info_container").hide();
				  	$(".exams_container").fadeIn();
				  	$("#start_exam_btn").hide();
				  	$("#get_next_item_btn").hide();
				  	$("#submit_exam_btn").fadeIn();		
			  	}else{
			  		$(".exam_info_container").hide();
				  	$(".exams_container").fadeIn();
				  	$("#start_exam_btn").hide();
				  	$("#get_next_item_btn").fadeIn();	
			  	}

			  	

				setTimeout(function(){
					var h = localStorage.getItem('h');
				  	var m = localStorage.getItem('m');
				  	var s = localStorage.getItem('s');

				    console.log(h + " " + m + " " + s);
					if( h != 0 || m != 0 || s != 0){
						var t = h + " hours " + m + " minutes " + s + " seconds";
					    
						count();

						function count(){
							$("#time").text(t);
							if( h == 0 && m == 0 && s == 0 ){
								$("#time").text(" Exam Closed ");
								$scope.submit_exam_btn();
								return;
							}else if( h == 0 && m == 0 && s != 0 ){
								t =  h + " hours " + m + " minutes " + s + " seconds" ;
								s--;
							}else if( h == 0 && m != 0 ){
								if( s > -1 ){
									t = h + " hours " + m + " minutes " + s + " seconds" ;
									s--;
									if(s == -1){
										s = 59;
										m--;
									}
								}
							}else if( h != 0  ){
								if( m > -1 ){
									if( s > -1){
										t = h + " hours " + m + " minutes " + s + " seconds" ;
										s--;
										if( s == -1 ){
											s = 59;
											m--;
											if( m == -1 ){
												m = 59;
												h--;
											}
										}
									}
								}
							}	
							$("#time").html(t);
							time_toggle = setTimeout( count,1000 );

						}
					}else{
						var t = 'No Time Limit';
					    $("#time").html(t);
					}

			  		$("#count").text(cnt+".");
			  		$("#items_question").text(item.question);
			  		$("#items_answer1").text(item.answer1);
			  		$("#items_answer2").text(item.answer2);
			  		$("#items_answer3").text(item.answer3);
			  		$("#items_answer4").text(item.answer4);
			  		
			  	},100);
		  });
	}

	$scope.get_next_exam_items = function(){
		
		
		var ans = $( ".items input[name=correct-answer0]:checked" ).val();
		var item_id = current_item_id;
		console.log(ans);
		if(ans != 0){
			$("#alert-exam-active").hide();
			$("#count").hide();
			$("#items_question").hide();
			$(".radio").hide();
			$(".loading-spinner").fadeIn();

			var item_data =  [item_id, ans];
			$scope.ans_exam_items.push(item_data);
			console.log($scope.ans_exam_items);

			if($scope.exam_items.length > 1){
				var item = $scope.exam_items[Math.floor(Math.random() * ($scope.exam_items.length))];
				rand = $scope.exam_items.indexOf(item);
				$scope.exam_items.splice(rand,1);
				current_item_id = item.id;
				cnt++;
				$(".exams_container ").hide();
				$(".exams_container").fadeIn();
				$("#get_next_item_btn").hide();
				$("#get_next_item_btn").fadeIn();

			}else{	
				var item = $scope.exam_items[Math.floor(Math.random() * ($scope.exam_items.length))];
				rand = $scope.exam_items.indexOf(item);
				current_item_id = item.id;
				// $scope.exam_items.splice(rand,1);
				cnt++;
				$(".exams_container ").hide();
				$(".exams_container").fadeIn();
				$("#get_next_item_btn").hide();
				$("#submit_exam_btn").fadeIn();		
			}

				setTimeout(function(){
					$("#count").fadeIn();
					$("#items_question").fadeIn();
					$(".radio").fadeIn();
					$(".loading-spinner").hide();
					$("#count").text(cnt+".");
			  		$("#items_question").text(item.question);
			  		$("#items_answer1").text(item.answer1);
			  		$("#items_answer2").text(item.answer2);
			  		$("#items_answer3").text(item.answer3);
			  		$("#items_answer4").text(item.answer4);
			  		$(".items input[name=correct-answer0]:eq(0)").prop("checked","true");
			  		
			  	},100);
		}else{
			$("#alert-exam-active").show();
		}
		
		
		  
	}

	$scope.submit_exam_btn = function(){
		$scope.evaluate_exam = [];
		
		var ans = $( ".items input[name=correct-answer0]:checked" ).val();
		var item_id = current_item_id;
		// if(ans != 0){
			$("#alert-exam-active").hide();
			$("#count").hide();
			$("#items_question").hide();
			$(".radio").hide();
			$("#submit_exam_btn").hide();
			$(".loading-spinner").fadeIn();

			var item_data =  [item_id, ans];
			$scope.ans_exam_items.push(item_data);
			clearTimeout(time_toggle);
			$("#time").text(" Exam Closed ");
			$http({
		  		method: 'POST',
		  		url: siteurl + '/exam_items_con/get_items',
		  		data: $.param({'exam_no' : localStorage.getItem('exam-selected-id')}),
			    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			}).
			  success(function(data) {

			  	var counter = $scope.ans_exam_items.length;
			  	var no_of_items = $scope.ans_exam_items.length;
			  	var cor = 0;
			  	var item_id = [];
			  	for(var x = 0; x < $scope.ans_exam_items.length; x++ ){
			  		var temp = $scope.ans_exam_items[x][0];
			  		var temp_ans = $scope.ans_exam_items[x][1];
			  		
			  		for(a in data){
				  		if( data[a].id == temp ){
				  			
				  			counter--;
				  			console.log($scope.ans_exam_items[x][1] + " " + data[a].answer);
				  			if( data[a].answer == temp_ans ){
				  				cor++;
				  				var array = [data[a].id,'correct']
				  				$scope.evaluate_exam.push(array);
				  				$http({
								  	method: 'POST',
								  	url: siteurl + '/progress_items_con/add',
								  	data: $.param({'progress_no':0,'question':data[a].question,'answer1':data[a].answer1,'answer2':data[a].answer2,'answer3':data[a].answer3,'answer4':data[a].answer4,'answer':$scope.ans_exam_items[x][1],'ans':data[a].answer,'evaluation':'correct'}),
									headers: {'Content-Type': 'application/x-www-form-urlencoded'}
								}).
								   success(function(data) {
									  	item_id.push(data);
								   });
				  				if( counter == 0 ){
				  					var eva = "";
				  					var grade = Math.round( ( ( cor / no_of_items ) * 100 ) );
				  					if( Math.round( ( ( cor / no_of_items ) * 100 ) ) >= 50 ){
				  						eva = "Passed";
				  					}else{
				  						eva = "Failed";
				  					}
				  				setTimeout(function(){
				  					$http({
								  		method: 'POST',
								  		url: siteurl + '/progress_con/add',
								  		data: $.param({'exam':localStorage.getItem('exam-selected-name'),'exam_no' : localStorage.getItem('exam-selected-id'), 'student_no': localStorage.getItem('std-id'),'name':localStorage.getItem('std-name'),'no_items': no_of_items ,'rating':cor,'grade':grade,'evaluation': eva }),
									    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
									}).
									  success(function(data) {
									  	for(var g = 0; g < item_id.length; g++){
									  		$http({
											  	method: 'POST',
											  	url: siteurl + '/progress_items_con/update/'+item_id[g],
											  	data: $.param({'progress_no':data}),
												headers: {'Content-Type': 'application/x-www-form-urlencoded'}
											}).
											   success(function(data) {
												  	$(".loading-spinner").hide();
											   });
									  	}
									  });
				  				},200);		
				  					

									$(".exams_container").hide();
									$(".result_container").fadeIn();

									setTimeout(function(){
										$("#items").text(no_of_items + " / " + no_of_items);
										$("#rating").text(cor + " / " + no_of_items);
										if( eva == "Passed"){
											$("#eval").html("You have " + eva + " <i class='glyphicon glyphicon-ok-sign'></i>");
											$("#eval").css('color','green');
										}
										if( eva == "Failed"){
											$("#eval").html("You have " + eva + " <i class='glyphicon glyphicon-remove-sign'></i>");
											$("#eval").css('color','red');
										}		
										
									},200);
				  				}
				  			}else{
				  				var array = [data[a].id,'incorrect']
				  				$scope.evaluate_exam.push(array);
				  				$http({
								  	method: 'POST',
								  	url: siteurl + '/progress_items_con/add',
								  	data: $.param({'progress_no':0,'question':data[a].question,'answer1':data[a].answer1,'answer2':data[a].answer2,'answer3':data[a].answer3,'answer4':data[a].answer4,'answer':$scope.ans_exam_items[x][1],'ans':data[a].answer,'evaluation':'incorrect'}),
									headers: {'Content-Type': 'application/x-www-form-urlencoded'}
								}).
								   success(function(data) {
									  	item_id.push(data);
								   });
								if( counter == 0 ){
									var eva = "";
									var grade = Math.round( ( ( cor / no_of_items ) * 100 ) );
				  					if( Math.round( ( ( cor / no_of_items ) * 100 ) ) >= 50 ){
				  						eva = "Passed";
				  					}else{
				  						eva = "Failed";
				  					}
				  				setTimeout(function(){  	
				  					$http({
								  		method: 'POST',
								  		url: siteurl + '/progress_con/add',
								  		data: $.param({'exam':localStorage.getItem('exam-selected-name'),'exam_no' : localStorage.getItem('exam-selected-id'), 'student_no': localStorage.getItem('std-id'),'name':localStorage.getItem('std-name'),'no_items': no_of_items ,'rating':cor,'grade':grade,'evaluation': eva }),
									    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
									}).
									  success(function(data) {
									  	for(var g = 0; g < item_id.length; g++){
									  		$http({
											  	method: 'POST',
											  	url: siteurl + '/progress_items_con/update/'+item_id[g],
											  	data: $.param({'progress_no':data}),
												headers: {'Content-Type': 'application/x-www-form-urlencoded'}
											}).
											   success(function(data) {
												  	$(".loading-spinner").hide();
											   });

											$http({
												method: 'POST',
												url: siteurl + '/progress_con/get_progress',
												data: $.param({'student_no': localStorage.getItem('std-id')}),
												headers: {'Content-Type': 'application/x-www-form-urlencoded'}
											}).
												success(function(data) {
													var grades = 0;
													var final_grade = 0;
													var eval;
													for(var ct = 0; ct <= data.length ; ct++){
														
														if(ct == data.length){
															final_grade = (grades/data.length);
															if(final_grade >= 50){
																eval = "Passed";
															}else{
																eval = "Failed";
															} 

															$http({
															  	method: 'POST',
															  	url: siteurl + '/results_con/get_result',
															  	data: $.param({'student_no':localStorage.getItem('std-id')}),
																headers: {'Content-Type': 'application/x-www-form-urlencoded'}
															}).
															   success(function(data) {
																  	if(data != 0){
																  		$http({
																		  	method: 'POST',
																		  	url: siteurl + '/results_con/update/' + data[0].id,
																		  	data: $.param({'grade':final_grade,'evaluation':eval}),
																			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
																		}).
																		   success(function(data) {
																		   });
																  	}else{
																  		$http({
																		  	method: 'POST',
																		  	url: siteurl + '/results_con/add',
																		  	data: $.param({'class_no':localStorage.getItem('class-selected-name'),'student_no':localStorage.getItem('std-id'),'name':localStorage.getItem('std-name'),'grade':final_grade,'evaluation':eval}),
																			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
																		}).
																		   success(function(data) {
																		   });
																  	}
															   });
														}else{
															grades += parseInt(data[ct].grade);
														}
													}


											});
									  	}
									  });
								},200);
									$(".exams_container").hide();
									$(".result_container").fadeIn();

									setTimeout(function(){
										$("#items").text(no_of_items + " / " + no_of_items);
										$("#rating").text(cor + " / " + no_of_items);
										$("#eval").text("You have " + eva);
									},200);
				  				}
				  			}				  			
				  		}	
			  		}		

				  		if( x == ($scope.ans_exam_items.length - 1) ){
				  			$http({
								method: 'POST',
								url: siteurl + '/progress_con/get_progress',
								data: $.param({'student_no': localStorage.getItem('std-id')}),
								headers: {'Content-Type': 'application/x-www-form-urlencoded'}
							}).
								success(function(data) {
									var grades = 0;
									var final_grade = 0;
									var eval;
									for(var ct = 0; ct < data.length ; ct++){
													
										if(ct == (data.length-1) ){
											grades += parseInt(data[ct].grade);
											
											final_grade = (grades/data.length);
											if(final_grade >= 50){
												eval = "Passed";
											}else{
												eval = "Failed";
											} 

											$http({
												method: 'POST',
												url: siteurl + '/results_con/get_result',
												data: $.param({'student_no':localStorage.getItem('std-id')}),
												headers: {'Content-Type': 'application/x-www-form-urlencoded'}
											}).
												success(function(data) {
													if(data != 0){
														$http({
															method: 'POST',
															url: siteurl + '/results_con/update/' + data[0].id,
															data: $.param({'grade':final_grade,'evaluation':eval}),
															headers: {'Content-Type': 'application/x-www-form-urlencoded'}
														}).
															success(function(data) {
															});
													}else{
														$http({
															method: 'POST',
															url: siteurl + '/results_con/add',
															data: $.param({'class_no':localStorage.getItem('class-selected-id'),'student_no':localStorage.getItem('std-id'),'name':localStorage.getItem('std-name'),'grade':final_grade,'evaluation':eval}),
															headers: {'Content-Type': 'application/x-www-form-urlencoded'}
														}).
															success(function(data) {
															});
													}
												});
										}else{
											grades += parseInt(data[ct].grade);
										}
									}


								});
				  		}	
			  	}
			  });
			
		// }else{
		// 	$("#alert-exam-active").show();
		// }
		  
	}





	$scope.get_progress = function(id,name){
		console.log(id);
		$("#std-name").text(name + " ");

		$http({
	  		method: 'POST',
	  		url: siteurl + '/progress_con/get_progress',
	  		data: $.param({'student_no' : id}),
		    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).
		  success(function(data) {
		   	$scope.progress = data;
		  });
	}

	$scope.get_progress_items = function(id){
		console.log(id);

		$http({
	  		method: 'POST',
	  		url: siteurl + '/progress_items_con/get_progress_items',
	  		data: $.param({'progress_no' : id}),
		    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).
		  success(function(data) {
		   	$scope.progress_items = data;
		  });
	}


	$scope.getID = function(id){
		alert(id);
	};	

	$scope.checkAll = function(num){

		console.log("Im in");
		if ($scope.selectedAll) {
            $scope.selectedAll = false;
			$(".options-btn").hide();
        } else {
            $scope.selectedAll = true;
			$(".del-btns").show();
        }
        if( num == 'x'){
	        angular.forEach($scope.instructors, function (item) {
	            item.Selected = $scope.selectedAll;
	        });
        }else if( num == 0){
	        angular.forEach($scope.sections, function (item) {
	            item.Selected = $scope.selectedAll;
	        });
        }else if( num == 1){
	        angular.forEach($scope.students, function (item) {
	            item.Selected = $scope.selectedAll;
	        });
        }else if( num == 2 ){
        	angular.forEach($scope.reviewers, function (item) {
	            item.Selected = $scope.selectedAll;
	        });
        }else if( num == 3 ){
        	angular.forEach($scope.exams, function (item) {
	            item.Selected = $scope.selectedAll;
	        });
        }else if( num == 'topics' ){
        	angular.forEach($scope.topics, function (item) {
	            item.Selected = $scope.selectedAll;
	        });
        }
        
        
	};

	$scope.checkedbox = function(id){
				

		// localStorage.setItem('checkedid',id);
		// console.log(localStorage.getItem('checkedid'));
		if ($('input[name="check-id"]:checked').length > 1) {
			console.log("checked many");
            $scope.selectedOne = true;
			$(".edit-btns").hide();
			$("#edit-form").slideUp();
			$(".slideform").slideUp();
		}else if ($('input[name="check-id"]:checked').length == 1) {
			console.log("checked one");
            $scope.selectedOne = true;
			$(".options-btn").show();
		}else{
			$scope.selectedAll = false;
			$("#edit-form").slideUp();
			$(".slideform").slideUp();
			$(".options-btn").hide();
		}
	};

	$scope.go_dash = function(){
		setTimeout(function(){
			$("#no-students").txt($scope.no_students + "");
			$("#no-exams").txt($scope.no_exams + "");
			$("#no-results").txt($scope.no_results + "");
		},50);
	}

	  
});

$(document).ready(function(){
	$("#no-students").text(localStorage.getItem('no_stud') + "");
	$("#no-exams").text(localStorage.getItem('no_ex') + "");
	$("#no-results").text(localStorage.getItem('no_res') + "");
	$('#class-selected-name').text(localStorage.getItem('class-selected')+"");
});
