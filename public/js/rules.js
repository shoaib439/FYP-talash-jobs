// registration-form
$(function() {
  $("form[name='registration']").validate({
    rules: {
      ru_name: "required",
      ru_cont_no: "required",
      ru_c_password: "required",
      ru_email: {
        required: true,
        ru_email: true
      },
      ru_password: {
        required: true,
        minlength: 5
      }
    },
    messages: {
      ru_name: "Please enter your username",
      ru_cont_no: "Please enter your mobile",
      ru_password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      ru_email: "Please enter a valid email address"
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});

// login-form
$(function() {
  $("form[name='login']").validate({
    rules: {
      ru_email: {
        required: true,
        ru_email: true
      },
      ru_password: {
        required: true,
        minlength: 5
      }
    },
    messages: {
      ru_password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      ru_email: "Please enter a valid email address"
    },
    
    submitHandler: function(form) {
      form.submit();
    }
  });
});

// Submit-ad
$(function() {
  $("form[name='submit-ad']").validate({
    rules: {    
      p_title:{
        required:true,
        minlength:5
      },
      p_author: 
      {
        required:true,
        minlength:5
      },
      p_price: {
        required:true,
        digits:true
      },
      p_description: 
      {
        maxlength:2000
      },
      p_image: {
        required: true,
        p_image: true
      }
    },
    messages: {
      p_title: {
        minlength: "Title is too Short"
      },
      p_author: {
        minlength: "Author Name is too Short"
      },
      p_description:{
        maxlength:"Limit Exceeds"
      },
      p_image: "Please Upload an image of your post"
    },
      submitHandler: function(form) {
      form.submit();
    }
  });
});

//register-bookshop
$(function() {
  $("form[name='register-bookshop']").validate({
    rules: {    
      bs_title:{
        required:true,
        minlength:5
      },
      bs_location: 
      {
        required:true,
        minlength:5
      },
      p_price: "required",
      p_description: 
      {
        maxlength:2000
      },
      p_image: {
        required: true,
        p_image: true
      }
    },
    messages: {
      bs_location: 
      {
        minlength:"Please enter a valid Location"
      },
      p_author: {
        minlength: "Author Name is too Short"
      },
      p_description:{
        maxlength:"Limit Exceeds"
      },
      p_image: "Please Upload an image of your post"
    },
      submitHandler: function(form) {
      form.submit();
    }
  });
});