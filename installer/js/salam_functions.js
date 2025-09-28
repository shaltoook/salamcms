function set_input_value(name, value) {
	$("[name=" + name + "]").val(value);
}

function show_alert(body, header = '') {
	alert(body);
}

function call_ajax(formData, callback) {
    formData.ajax = true;
    $.ajax({
        url: window.location.origin + window.location.pathname,
        method: 'POST',
        data: formData,
        dataType: 'json',
        success: function(data) {
            if (typeof callback === "function") {
                callback(data);
            }
			if(data.message) {
				show_alert(data.message);
			}
        },
        error: function(error) {
            show_alert(get_string('ajaxerror'));
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

function refresh_database_list(dbhost, dbuser,dbpass) {
	let formData = {
		host: dbhost,
		username: dbuser,
		password: dbpass,
		action: 'check_db_conn'
	};
	call_ajax(formData, function(response) {
		if (response.has_error && response.has_error == 'yes') {
			$('[name=dbname]').html('').prop("disabled", true);
		} else {
			$('[name=dbname]').prop("disabled", false);
		}
	});
}

$(document).ready(function() {
	$('#wwwrootValidator').click(function() {
		path_validator($('[name=wwwroot]').val());
	});
	
	$('#datarootValidator').click(function() {
		path_validator($('[name=dataroot]').val());
	});
	
	$('#validateDBConn').click(function() {
		let dbhost = $('[name=dbhost]').val();
		let dbuser = $('[name=dbuser]').val();
		let dbpass = $('[name=dbpass]').val();
		refresh_database_list(dbhost, dbuser, dbpass);
	});
});