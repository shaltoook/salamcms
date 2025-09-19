function set_input_value(name, value) {
	$("[name=" + name + "]").val(value);
}

function call_ajax(formData) {
	formData.ajax = true;
	$.ajax({
		url: window.location.origin + window.location.pathname,
		method: 'POST',
        data: formData,
		dataType: 'json',
		success: function(data) {
			alert(data.message);
		},
		error: function(error) {
			alert('<p>Error fetching data!</p>');
		}
	});	
}

function path_validator(path) {
	let formData = {
		path: path,
		action: 'path_validator'
	};
	call_ajax(formData);
}

$(document).ready(function() {
	$('#wwwrootValidator').click(function() {
		path_validator($('[name=www_root]').val());
	});
});