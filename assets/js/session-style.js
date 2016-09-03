$("#std-show").click(function(){
	$("#student-signup-form").fadeIn();
	$("#ins-signup-form").hide();
	$("#login-form").hide();
	$("#type-form").hide();
	$("#back-form").fadeIn();
});

$("#ins-show").click(function(){
	$("#ins-signup-form").fadeIn();
	$("#student-signup-form").hide();
	$("#login-form").hide();
	$("#type-form").hide();
	$("#back-form").fadeIn();
});

$("#back-btn").click(function(){
	$("#login-form").fadeIn();
	$("#student-signup-form").hide();
	$("#ins-signup-form").hide();
	$("#type-form").fadeIn();
	$("#back-form").hide();
	$("#student-signup-form input").val("");
	$("#ins-signup-form input").val("");
	$("#success").fadeOut();
	$("#error").fadeOut();
	$("#success-2").fadeOut();
	$("#error-2").fadeOut();
});


 
// LOGIN
$("#signin-btn").click(function(e){
	// e.preventDefault();
	var $btn = $(this).button('loading');
	var uname = $("#username").val();
	var pass = $("#password").val();
	console.log(uname+" "+pass);

	if(uname != "" && pass != ""){
		$.ajax({
			url: siteurl + '/session_con/session',
			type: 'POST',
			dataType:'JSON',
			data: {username:uname,password:pass},
			success: function(data) {
				console.log(data);
				if(data == 0){
					$("#success-0").fadeOut();
					$("#error-0").fadeIn();
					$btn.button('reset');
				}else{
					$("#success-0").fadeIn();
					$("#error-0").fadeOut();
					if(data.user_type == 'instructor'){
						$.ajax({
					 	  url: siteurl + '/instructors_con/get_instructor_by_session_no',
					 	  dataType:'JSON',
						  data: {'session_no': data.id},
						  type: 'POST',
						  success: function(data2) {
						  	console.log(data2);
						  	localStorage.setItem("ins-id",data2[0].id);
						  	console.log(data2[0].id);
						  	setTimeout(function(){
								location.reload();
							},1000);
						  },
						  error: function(e) {
							console.log(e.message);
						  }
						});
					}else if(data.user_type == 'student'){
						$.ajax({
					 	  url: siteurl + '/students_con/get_student_by_session_no',
					 	  dataType:'JSON',
						  data: {'session_no': data.id},
						  type: 'POST',
						  success: function(data2) {
						  	console.log(data2);
						  	localStorage.setItem("std-id",data2[0].id);
						  	localStorage.setItem("std-name",data2[0].name);
						  	console.log(data2[0].id);
						  	console.log(data2[0].name);
						  	setTimeout(function(){
								location.reload();
							},1000);
						  },
						  error: function(e) {
							console.log(e.message);
						  }
						});
					}else{
						setTimeout(function(){
							location.reload();
						},1000);
					}
					localStorage.setItem("img",data.img);
					localStorage.setItem("uname",uname);
					localStorage.setItem("pass",pass);
					localStorage.setItem("user-id",data.id);
					localStorage.setItem("user-type",data.user_type);
								
					console.log(data.id);
					// location.reload();
				}	
			},
			error: function(e) {
				console.log(e.message);
				$btn.button('reset');
			}
		});
	}else{
		$btn.button('reset');
		$("#success-0").fadeOut();
		$("#error-0").fadeIn();
	}
});

// SIGNUP

$("#signup-std-btn").click(function(e){
	// e.preventDefault();
	var $btn = $(this).button('loading');
	var uname = $("#idnum").val();
	var name = $("#std-fname").val();
	var sec = $("#class option:selected").text();
	var pass = $("#std-password").val();
	console.log(uname+" "+pass);

	if(uname != "" && pass != ""){
		$.ajax({
			url: siteurl + '/session_con/add',
			type: 'POST',
			dataType:'JSON',
			data: {username:uname,password:pass,'user_type':'student'},
			success: function(data) {
				console.log(data);
				if(data == 0){
					$("#success").fadeOut();
					$("#error").fadeIn();
					$btn.button('reset');
				}else{
						$.ajax({
					 	  url: siteurl + '/students_con/add',
					 	  dataType:'JSON',
						  data: {'session_no': data, id_number:uname,name:name},
						  type: 'POST',
						  success: function(data2) {
						  	$("#student-signup-form input").val("");
						  	$("#success").fadeIn();
							$("#error").fadeOut();
							$btn.button('reset');
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
				$btn.button('reset');
			}
		});
	}else{
		$btn.button('reset');
		$("#success").fadeOut();
		$("#error").fadeIn();
	}
});


$("#signup-ins-btn").click(function(e){
	// e.preventDefault();
	var $btn = $(this).button('loading');
	var uname = $("#uname").val();
	var name = $("#ins-fname").val();
	var pass = $("#ins-password").val();
	console.log(uname+" "+pass+" "+name);

	if(uname != "" && pass != ""){
		console.log(uname+" "+pass);
		$.ajax({
			url: siteurl + '/session_con/add',
			type: 'POST',
			dataType:'JSON',
			data: {username:uname,password:pass,'user_type':'instructor'},
			success: function(data) {
				console.log(data);
				if(data == 0){
					$("#success-2").fadeOut();
					$("#error-2").fadeIn();
					$btn.button('reset');
				}else{
						$.ajax({
					 	  url: siteurl + '/instructors_con/add',
					 	  dataType:'JSON',
						  data: {'session_no': data,name:name},
						  type: 'POST',
						  success: function(data2) {
						  	$("#ins-signup-form input").val("");
						  	$("#success-2").fadeIn();
							$("#error-2").fadeOut();
							$btn.button('reset');
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
				$btn.button('reset');
			}
		});
	}else{
		$btn.button('reset');
		$("#success-2").fadeOut();
		$("#error-2").fadeIn();
	}
});