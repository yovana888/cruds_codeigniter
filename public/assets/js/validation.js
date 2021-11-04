function validation_form(form) {
    $("#" + form).validate({
        validClass: "success",
        rules: {
            gender: { required: true }
        },
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        success: function(element) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
    });
}