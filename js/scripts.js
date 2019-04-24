$(document).ready(function() {
	$("#welcome").load("static/welcome.html");


});

$('#login-link').click(function(){
	$("#main").load("static/login.html");
});

$('#home-link').click(function(){
	$("#main").load("static/welcome.html");
});

$('#add-link').click(function(){
	$("#main").load("php/add_record.php");
});

$('#add-shs-link').click(function(){
	$("#main").load("php/add_shs_record.php");
});

function change_course(value) {
	if (value == 6) {
		document.getElementById('if_gs').innerHTML = `
			<div class="form-group">
				<label class="col-form-label" for="thesis">Thesis Title</label>
				<input type="text" class="form-control" placeholder="Enter Thesis Title" name="thesis" id="thesis" required>
			</div>

			<div class="form-group">
				<label class="col-form-label" for="rating">Adjectivial Rating</label>
				<select class="custom-select" name="rating" required>
					<option value="" selected="" >Select Rating</option>
					<option value='1'>MERITUS</option>
					<option value='2'>BENEMERITUS</option>
					<option value='3'>MERITISSIMUS</option>
					<option value='4'>BENE PROBATUS</option>
				</select>
			</div>
		`;
	} else {
		document.getElementById('if_gs').innerHTML = '';
	}
	$.ajax({
		url: 'php/backend/get_courses.php',
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

$('#login-button').click(function(){
	var user = $("#username").val();
	var pass = $("#password").val();

	if ((user == '') || (pass == '')) {
		$("#inv-missing").removeAttr("hidden");
		$("#inv-user-pass").attr("hidden", "hidden");
	} else {
		$.ajax({
			url: 'php/backend/validate.php',
			dataType: 'text',
			type: 'post',
			contentType: 'application/x-www-form-urlencoded',
			data: { username: user, password: pass },
			success: function( data, textStatus, jQxhr ){
				if (data == 'valid') {
					$(location).attr('href','admin/index.php');
				} else {
					$("#inv-missing").attr("hidden", "hidden");
					$("#inv-user-pass").removeAttr("hidden");
				}
			},
			error: function( jqXhr, textStatus, errorThrown ) {
			    console.log( errorThrown );
			}
		});

	}

});

function change_strand(value) {
	$.ajax({
		url: 'php/backend/get_strand.php',
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