
// INSTRUCTORS
// ADD
$('body').delegate( "#signup-btn" , "click" , function(){
	var name = $("#signup-modal #fname").val();
	var username = $("#signup-modal #uname").val();
	var password = $("#signup-modal #pass").val();
	console.log(name +" : "+ username +" : "+ password);
	if(name != "" && username != "" && password != ""){
		var $btn = $(this).button('loading');
		$.ajax({
			url: siteurl + '/session_con/add/',
			type: 'POST',
			data:{'username':username, 'password':password,'user_type':'instructor'},
			success: function(data) {
				if(data == 0){

				}else{
					$.ajax({
						url: siteurl + '/instructors_con/add/',
						type: 'POST',
						data:{'session_no':data,'name':name},
						success: function(data) {
							location.reload();
						},
						error: function(e) {
							console.log(e.message);
							$btn.button('reset');
						}
					});
				}
			},
			error: function(e) {
				console.log(e.message);
				$btn.button('reset');
			}
		});
	}
});

// DELETE
var inst = [];

$('body').delegate( "#ins-opt-delete" , "click" , function(){

	// var $btn = $(this).button('loading');

	if($('input[name="check-id"]:checked').length > 1){
		inst = [];
		$('input[name="check-id"]:checked').each(function() {
			var id = this.value;
			
		   inst.push(id);
		});
		console.log(inst);
	}else{

	   var id = $('input[name="check-id"]:checked').val();
	   inst = [];
	   inst.push(id);
	   console.log(inst);
	}

});

$('body').delegate( "#delete-confirm-btn" , "click" , function(){

	for( var x = 0 ; x < inst.length ; x ++ ){
		console.log("sdf");
					$.ajax({
				 	  url: siteurl + '/session_con/delete/' + inst[x],
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

// Editing Student

var id = "";
// var idn = "";
var name = "";
var unum = "";
var pass = "";
var ses = "";

$('body').delegate( "#ins-opt-edit" , "click" , function(){

	// var $btn = $(this).button('loading');
	  	id = $('input[name="check-id"]:checked').closest('tr').find('td:eq(4)').text();
	   unum = $('input[name="check-id"]:checked').closest('tr').find('td:eq(3)').text();
	   name =  $('input[name="check-id"]:checked').closest('tr').find('td:eq(2)').text();
	   pass =  $('input[name="check-id"]:checked').closest('tr').find('td:eq(5)').text();
	   ses =  $('input[name="check-id"]:checked').closest('tr').find('td:eq(6)').text();

		// $('#edit-form #idnum').val(idn);
		$('#edit-form #fname').val(name);
		$('#edit-form #unum').val(unum);
		$('#edit-form #pass').val(pass);

	  inst= [];
	   inst.push(id);
	   console.log(inst);

	   $("#edit-form").slideToggle();
});

$('body').delegate( "#ins-done-edit-btn" , "click" , function(){
	   name =  $('#edit-form #fname').val();
	   uname =  $('#edit-form #unum').val();
	   pass = $('#edit-form #pass').val();
	   // idn = $('#edit-form #idnum').val();

	if(name != "" && uname != "" && pass != "" ){
		console.log(name+uname+pass);
		$.ajax({
			url: siteurl + '/session_con/update/' + ses,
			type: 'POST',
			data:{username:uname,password:pass},
			success: function(data) {
				$.ajax({
					url: siteurl + '/instructors_con/update/' + id,
					type: 'POST',
					data:{name:name},
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