
// Adding student

$('body').delegate( "#done-add-student-btn" , "click" , function(){

	var $btn = $(this).button('loading');
    
    var idnum = $("#add-students-modal #idnum").val();
	var fname = $("#add-students-modal #fname").val();
	var sec= $("#add-students-modal #sec option:selected").val();
	// var pass = $("#add-students-modal #passwd").val();
	// var ins_id = $("#admin-id").text();
	var index = parseInt($('#students-tbl tbody tr:last-child td:eq(1)').text()) + 1;

	if(idnum == "" || fname == ""){
		
		$('#success').hide();
		$('#error').hide();
		$('#error2').show();
		$btn.button('reset');
	}else{
		console.log(idnum + fname);
				$.ajax({
				 	  url: siteurl + '/session_con/add',
					  type: 'POST',
					  data: {username:idnum,password:idnum,user_type:'student'},
					  success: function(data) {
					  	if(data == 0){
					  		$('#success').hide();
					  		$('#error2').hide();
					  		$('#error').show();
					  	}else{
					  		$.ajax({
							 	  url: siteurl + '/students_con/add',
								  type: 'POST',
								  data: {session_no:data,id_number:idnum,name:fname},
								  success: function(data) {
								  	if(data == 0){
								  	}else{
								  		location.reload();
								  	}
									$btn.button('reset');
								  },
								  error: function(e) {
									console.log(e.message);
									$btn.button('reset');
								  }
							});
					  	}
						$btn.button('reset');
					  },
					  error: function(e) {
						console.log(e.message);
						$btn.button('reset');
					  }
				});
	}
				

});

// Deleting Student

var students = [];

$('body').delegate( "#stud-opt-delete" , "click" , function(){

	// var $btn = $(this).button('loading');

	if($('input[name="check-id"]:checked').length > 1){
		students = [];
		$('input[name="check-id"]:checked').each(function() {
			var id = this.value;
			
		   students.push(id);
		});
		console.log(students);
	}else{

	   var id = $('input[name="check-id"]:checked').val();
	   students = [];
	   students.push(id);
	   console.log(students);
	}

});

$('body').delegate( "#delete-confirm-btn" , "click" , function(){

	for( var x = 0 ; x < students.length ; x ++ ){

					var sec = students[x][1];
					$.ajax({
				 	  url: siteurl + '/session_con/delete/' + students[x],
					  type: 'POST',
					  success: function(data) {
					  	location.reload();
					  },
					  error: function(e) {
						console.log(e.message);
						$btn.button('reset');
					  }
					});

					
	}	
});

// Editing Student

var id = "";
var id_num = "";
var name = "";
var section = "";
var pass = "";
var ses = "";

$('body').delegate( "#stud-opt-edit" , "click" , function(){

	// var $btn = $(this).button('loading');
	   id = $('input[name="check-id"]:checked').closest('tr').find('td:eq(4)').text();
	   id_num = $('input[name="check-id"]:checked').closest('tr').find('td:eq(2)').text();
	   name =  $('input[name="check-id"]:checked').closest('tr').find('td:eq(3)').text();
	   section =  $('input[name="check-id"]:checked').closest('tr').find('td:eq(6)').text();
	   pass =  $('input[name="check-id"]:checked').closest('tr').find('td:eq(5)').text();
	   ses =  $('input[name="check-id"]:checked').closest('tr').find('td:eq(7)').text();

	   console.log(id + " " + id_num  + " " + name );

	   $('#edit-form #idnum').val(id_num);
		$('#edit-form #fname').val(name);
		$('#edit-form #sec option:selected').text(section);
		$('#edit-form #pass').val(pass);

	   students= [];
	   students.push(id);
	   console.log(students);

	   $("#edit-form").slideToggle();
});

$('body').delegate( "#std-done-edit-btn" , "click" , function(){
	   id_num =  $('#edit-form #idnum').val();
	   name =  $('#edit-form #fname').val();
	   section =  $('#edit-form #sec option:selected').text();
	   pass = $('#edit-form #pass').val();

	   console.log(id + " " + id_num  + " " + name + " " + section + " " + pass);

	if(id_num != "" && name != ""){
		$.ajax({
			url: siteurl + '/session_con/update/' + ses,
			type: 'POST',
			data:{username:id_num,password:pass},
			success: function(data) {
				$.ajax({
					url: siteurl + '/students_con/update/' + id,
					type: 'POST',
					data:{id_number:id_num,name:name},
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
