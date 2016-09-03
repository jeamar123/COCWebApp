


// TIMER
	var get;
	var id;
	$( "body" ).delegate( ".row-open-btn" , "click" , function(){

		get = $( this ).closest( 'tr' ).find( 'td:eq(1)' ).text( );
		id = $( this ).closest( 'tr' ).find( 'td:eq(6)' ).text( );
		localStorage.setItem( "selected-id-"+get, id );
	   	localStorage.setItem( "selected-row-"+get, get );
	   	console.log(get + " " + id);

	});

	$( "body" ).delegate( ".row-close-btn" , "click" , function(){

		get = $( this ).closest( 'tr' ).find( 'td:eq(1)' ).text( );
		id = $( this ).closest( 'tr' ).find( 'td:eq(6)' ).text( );
		localStorage.setItem( "selected-id-"+get, id );
	   	localStorage.setItem( "count-"+get, get );
	   	console.log(get + " " + id);

	});


	function timer(num){
		if(num == 1){
			console.log("in");
			var time;
			var row = localStorage.getItem("selected-row-"+get);
			
			if ( $("tbody tr:eq("+(row-1)+") td:eq(4)").text() == "Off" ) {
				console.log("in");
				var h = parseInt(document.getElementById("hours").value) || 0;
		      	var m = parseInt(document.getElementById("minutes").value) || 0;
		      	var s = parseInt(document.getElementById("seconds").value) || 0;
		      	if (h == 0 && m == 0 && s == 0 ) {
			        return;
			    }else{
			    	$.ajax({
			                type: "POST",
			                url: "http://localhost/COCWebApp/index.php/exams_con/update/" + id,
			                headers: {
			                    'Access-Control-Allow-Origin' : '*'
			                },
			                data: {exam_status:'Open',exam_timer: h + 'h ' + m + 'm ' + s + 's'} ,
			                dataType: ' JSON ',
			                crossDomain: true,
			                
			                success:function(response){
			                	$( "tbody tr:eq( " + ( row-1 ) + ") td:eq(4)" ).text( h + 'h ' + m + 'm ' + s + 's');
			                	$("tbody tr:eq("+( row-1 )+") td:eq(5)").text('Open');
			                	location.reload();
			                },
			                error:function (e){
			                    alert("Error! " + e.message );
			                },
			        });	
			    }
			    
			    
			    // count();
			}

			// function count(){
			// 	console.log( h + " - " + m + " - " + s );
			// 	if( h == 0 && m == 0 && s == 0 ){
			// 		$("tbody tr:eq("+( row-1 )+") td:eq(4)").text("Off");
			// 		$("tbody tr:eq("+( row-1 )+") td:eq(5)").text("Closed");
			// 		return;
			// 	}else if( h == 0 && m == 0 && s != 0 ){
			// 		$( "tbody tr:eq( " + ( row-1 ) + ") td:eq(4)" ).text( s + " seconds" );
			// 		s--;
			// 	}else if( h == 0 && m != 0 ){
			// 		if( s > -1 ){
			// 			$( "tbody tr:eq( " + ( row-1 ) + ") td:eq(4)" ).text( m + " minutes " + s + " seconds" );
			// 			s--;
			// 			if(s == -1){
			// 				s = 59;
			// 				m--;
			// 			}
			// 		}
			// 	}else if( h != 0  ){
			// 		if( m > -1 ){
			// 			if( s > -1){
			// 				$( "tbody tr:eq( " + ( row-1 ) + ") td:eq(4)" ).text( h + " hours " + m + " minutes " + s + " seconds" );
			// 				s--;
			// 				if( s == -1 ){
			// 					s = 59;
			// 					m--;
			// 					if( m == -1 ){
			// 						m = 59;
			// 						h--;
			// 					}
			// 				}
			// 			}
			// 		}
			// 	}	
			// 	localStorage.setItem( "count-"+get, setTimeout( count,1000 ) );
			// }
		}else{
			console.log("in");
			var row = localStorage.getItem("selected-row-"+get);
			clearTimeout( localStorage.getItem("count-"+get) );
			

			$.ajax({
			                type: "POST",
			                url: "http://localhost/COCWebApp/index.php/exams_con/update/" + id,
			                headers: {
			                    'Access-Control-Allow-Origin' : '*'
			                },
			                data: {exam_status:'Closed',exam_timer: 'Off'} ,
			                dataType: ' JSON ',
			                crossDomain: true,
			                
			                success:function(response){
			                	$("tbody tr:eq("+( row-1 )+") td:eq(4)").text("Off");	
								$("tbody tr:eq("+( row-1 )+") td:eq(5)").text('Closed');
								location.reload();
			                },
			                error:function (e){
			                    alert("Error! " + e.message );
			                },
			        });	
		}
	}

	  $( "body" ).delegate( "#show-limit-btn" , "click" , function(){
	  		$( ".show-limit-btn" ).hide();
	  		$( ".passcode-timer" ).show();
	  		$( ".cancel-timer" ).show();

	  });
	  $( "body" ).delegate( ".cancel-timer" , "click" , function(){
	  		
	  		$( ".passcode-timer" ).hide();
	  		$( ".cancel-timer" ).hide();
	  		$( ".show-limit-btn" ).show();

	  });

// 