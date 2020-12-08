"use strict";

// Class Definition
var KtRegister = function() {

	var _handleFormRegister = function() {
		// Base elements
		var form = KTUtil.getById('forgotForm');

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