"use strict";

// Class Definition
var KtRegister = function() {

	var _handleFormRegister = function() {
		// Base elements
		var form = KTUtil.getById('loginForm');

		if (!form) {
			return;
		}

		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		// Step 1
		FormValidation.formValidation(
			form,
			{
				fields: {
					email: {
						validators: {
							notEmpty: {
								message: 'Email é obrigatório'
							},
							emailAddress: {
								message: 'Insira um e-mail válido'
							}
						}
					},
					password: {
						validators: {
							notEmpty: {
								message: 'Senha é obrigatório'
							},
							stringLength: {
								min: 8,
								message: 'A senha deve conter 8 ou mais caracteres'
              },
						}
          },
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			});
    }

    // Public Functions
    return {
        init: function() {
			_handleFormRegister();
    }
  };
}();


// Class Initialization
jQuery(document).ready(function() {
    KtRegister.init();
});