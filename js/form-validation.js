$(function() {

    $("form[name='login']").validate({
      rules: {
        Name: "required",
        Pass: "required",
        password: {
          required: true,
          minlength: 7,
          Number: true
        }
      },
 
      messages: {
        username: "Please enter your username",
        password: "Please enter your lastname",
        password: {
          required: "Please provide a password",
          Number: "Ensure you have a number in your password",
          minlength: "Your password must be at least 7 characters long"
        },
      },

      submitHandler: function(form) {
          alert("Submitting account...")
        form.submit();
      }
    });
  });