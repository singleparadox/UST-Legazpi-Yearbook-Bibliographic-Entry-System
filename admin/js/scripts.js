$(document).ready(function() {
	$("#welcome").load("static/welcome.html");

	/*if ($("#log-txt").length) {
		$("#log-txt").scrollTop($('#log-txt')[0].scrollHeight);

	}*/
		

});


$('#view-link').click(function(){
	$("#main").load("pages/backend/pages.php");
});

$('#add-link').click(function(){
	$("#main").load("pages/backend/add_alumni.php");
});
$('#add-course-college-link').click(function(){
	$("#main").load("pages/backend/add_course_college.php");
});

$('#search-link').click(function(){
	$("#main").load("pages/backend/search.php");
});

$('#setting-link').click(function(){
	$("#main").load("pages/backend/setting.php");
});

$('#accounts-link').click(function(){
	$("#main").load("pages/backend/manage_accounts.php");
});

$('#add-acc-btn').click(function(){
	$("#main").load("pages/backend/add_account.php");
});

$('#archive-link').click(function(){
	$("#main").load("pages/backend/archive.php");
});


function arch () {
	$("#main").load("pages/backend/fix.php");
}


function hidden_id(value) {
	//$("#main").load("pages/backend/edit_account.php");
	$.ajax({
		url: 'pages/backend/edit_account.php',
		dataType: 'text',
		type: 'post',
		contentType: 'application/x-www-form-urlencoded',
		data: { vals: value },
		success: function( data, textStatus, jQxhr ){
			
			document.getElementById('main').innerHTML = data;
			
		},
		error: function( jqXhr, textStatus, errorThrown ) {
		    console.log( errorThrown );
		}
	});

}


function getPage(value) {
	$.ajax({
		url: 'pages/backend/pages.php',
		dataType: 'text',
		type: 'post',
		contentType: 'application/x-www-form-urlencoded',
		data: { vals: value },
		success: function( data, textStatus, jQxhr ){
			$('#pages_backend').remove();
			document.getElementById("table-view").innerHTML = data;
		    
		},
		error: function( jqXhr, textStatus, errorThrown ) {
		    console.log( errorThrown );
		}
	});
}

function edit(value) {
	$.ajax({
		url: 'pages/backend/edit_alumni.php',
		dataType: 'text',
		type: 'post',
		contentType: 'application/x-www-form-urlencoded',
		data: { vals: value },
		success: function( data, textStatus, jQxhr ){
			document.getElementById('main').innerHTML = "";
			$("#main").fadeIn("fast");
			document.getElementById('main').innerHTML = data;
			
		},
		error: function( jqXhr, textStatus, errorThrown ) {
		    console.log( errorThrown );
		}
	});

}
function edit_a(value) {
	$.ajax({
		url: 'pages/backend/edit_archive.php',
		dataType: 'text',
		type: 'post',
		contentType: 'application/x-www-form-urlencoded',
		data: { vals: value },
		success: function( data, textStatus, jQxhr ){
			document.getElementById('main').innerHTML = "";
			$("#main").fadeIn("fast");
			document.getElementById('main').innerHTML = data;
			
		},
		error: function( jqXhr, textStatus, errorThrown ) {
		    console.log( errorThrown );
		}
	});

}

function close_modal() {
	document.getElementById('modal').innerHTML = "";
	$("#modal").css({'display' : 'none'});
}

function change_course(value) {
	$.ajax({
		url: 'pages/backend/get_courses.php',
		dataType: 'text',
		type: 'post',
		contentType: 'application/x-www-form-urlencoded',
		data: { vals: value },
		success: function( data, textStatus, jQxhr ){

		    document.getElementById('course-options').innerHTML = data;
		},
		error: function( jqXhr, textStatus, errorThrown ) {
		    console.log( errorThrown );
		}
	});
}

function cancel_edit() {
	$("#main").load("pages/backend/pages.php");

}

function cancel_add_account() {
	$("#main").load("pages/backend/manage_accounts.php");

}

$('#search-btn').click(function(){
	var searchType = $("#search-type").val();
	var searchQuery = $("#search-query").val();
	if ((searchType == '') || (searchQuery == '')) {
		document.getElementById("alert-error").style.display="block";

	} else {
		$.ajax({
			url: 'pages/backend/search_backend.php',
			dataType: 'text',
			type: 'post',
			contentType: 'application/x-www-form-urlencoded',
			data: { sT: searchType, sQ: searchQuery },
			success: function( data, textStatus, jQxhr ){
				document.getElementById("main").innerHTML = data;
			},
			error: function( jqXhr, textStatus, errorThrown ) {
			    console.log( errorThrown );
			}
		});
	}
});


$('#change-pass-btn').click(function(){
	var current = $("#curr-pass").val();
	var newPass = $("#change-pass").val();
	$.ajax({
		url: 'pages/backend/setting_backend.php',
		dataType: 'text',
		type: 'post',
		contentType: 'application/x-www-form-urlencoded',
		data: { currPass: current, nPass: newPass },
		success: function( data, textStatus, jQxhr ){
			if (data == 'success') {
				document.getElementById('hidden-prompt').innerHTML = "Password successfully changed..";
				document.getElementById('hidden-prompt').style.color = "green";
				document.getElementById('hidden-prompt').style.display = "block";
				
				setTimeout(function() {
					document.getElementById('hidden-prompt').style.display = "none";
				}, 2000);
			}
		    //document.getElementById('course-options').innerHTML = data;
		},
		error: function( jqXhr, textStatus, errorThrown ) {
		    console.log( errorThrown );
		}
	});
});

$('#add-college-btn').click(function(){
	var collegeName = $("#add-college").val();
	$.ajax({
		url: 'pages/backend/add_college.php',
		dataType: 'text',
		type: 'post',
		contentType: 'application/x-www-form-urlencoded',
		data: { cName: collegeName },
		success: function( data, textStatus, jQxhr ){
			if (data == 'success') {
				alert("Success");
				$("#main").load("pages/backend/add_course_college.php");
			} else {
				alert('Error: Please check your input...');
			}
		    //document.getElementById('course-options').innerHTML = data;
		},
		error: function( jqXhr, textStatus, errorThrown ) {
		    console.log( errorThrown );
		}
	});
});

$('#add-course-btn').click(function() {
	var selectedCollege = $("#select-college").val();
	var courseName = $("#add-course").val();
	$.ajax({
		url: 'pages/backend/add_course.php',
		dataType: 'text',
		type: 'post',
		contentType: 'application/x-www-form-urlencoded',
		data: { cName: courseName, sCollege: selectedCollege },
		success: function( data, textStatus, jQxhr ){

			if (data == 'success') {
				alert("Success");
				$("#main").load("pages/backend/add_course_college.php");
			} else {
				alert("Error: Please check your input...");
			}
		    //document.getElementById('course-options').innerHTML = data;
		},
		error: function( jqXhr, textStatus, errorThrown ) {
		    console.log( errorThrown );
		}
	});
});

$('#rm-college-btn').click(function() {
	var rmCollege = $("#rm-college").val();
	$.ajax({
		url: 'pages/backend/rm_college.php',
		dataType: 'text',
		type: 'post',
		contentType: 'application/x-www-form-urlencoded',
		data: { cID: rmCollege },
		success: function( data, textStatus, jQxhr ){

			if (data == 'success') {
				alert("Success");
				$("#main").load("pages/backend/add_course_college.php");
			} else {
				alert("Error: Please check your input...");
			}
		    //document.getElementById('course-options').innerHTML = data;
		},
		error: function( jqXhr, textStatus, errorThrown ) {
		    console.log( errorThrown );
		}
	});
});

$('#rm-course-btn').click(function() {
	var rmCourse = $("#course-options").val();
	$.ajax({
		url: 'pages/backend/rm_course.php',
		dataType: 'text',
		type: 'post',
		contentType: 'application/x-www-form-urlencoded',
		data: { cID: rmCourse },
		success: function( data, textStatus, jQxhr ){
			console.log(data);
			if (data == 'success') {
				alert("Success");
				$("#main").load("pages/backend/add_course_college.php");
			} else {
				alert("Error: Please check your input...");
			}
		    //document.getElementById('course-options').innerHTML = data;
		},
		error: function( jqXhr, textStatus, errorThrown ) {
		    console.log( errorThrown );
		}
	});
});
