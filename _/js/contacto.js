jQuery(document).ready(function(){
	
	jQuery('#contacto').formValidation({
		framework: 'bootstrap',
		fields: {
			'form-name': {
				validators: {
					notEmpty: {
						message: 'The name is required'
					}
				}
			},
			'form-tel': {
				validators: {
					notEmpty: {
						message: 'The phone is required'
					},
					phone: {
						country: 'ES',
						message: 'The value is not valid %s phone number'
					}
				}
			},
			'form-email': {
				validators: {
					notEmpty: {
						message: 'The email is required'
					},
					emailAddress: {
						message: 'The input is not a valid email address'
					}
				}
			},
			'form-pass': {
				validators: {
					notEmpty: {
						message: 'The password is required'
					},
					stringLength: {
						min: 6,
						max: 30,
						message: 'The name must be more than 6 and less than 30 characters long'
					},
					regexp: {
						regexp: /^[a-zA-Z0-9_]+$/,
						message: 'The name can only consist of alphabetical, number and underscore'
					}
				}
			},
			'form-comments': {
				validators: {
					notEmpty: {
						message: 'The comments are required'
					}
				}
			}
		}
	}).on('success.form.fv', function(e) {
		
		e.preventDefault();
		
		var $form	= jQuery(e.target),
			fv		= jQuery(e.target).data('formValidation');
		
		jQuery.ajax({
			url: '/wp-admin/admin-ajax.php',
			type: 'POST',
			data: { data: $form.serialize(), action: 'sendEmail' },
			success: function(result) {
				
				var $result = JSON.parse( result );
				
				if ( $result.envio ) {
					
					$form.empty().html('<h3>Muchas gracias!</h3><p>Hemos registrado su solicitud</p>');
					
				} else {
					
					$form.empty().html('<h3>Vaya!</h3><p>Parece que ha habido un error en el envío. Inténtalo de nuevo.</p>');
					
				}
				
			}
		});
		
	});
	
});