$(function() {
  
  // load BotDetect Captcha, it requires you to configure 
  // BotDetect Java Captcha path to captchaEndpoint setting
  var captcha = $('#botdetect-captcha').captcha({
    captchaEndpoint: 'captcha-endpoint/simple-botdetect.php'
  });
  
  
  // a global variable that holds validation status of captcha input field, 
  // use it for checking validation status when form is submitted
  var isCorrectCaptchaCode = false;
  
  // UI captcha validation on blur event by using the custom 'validatecaptcha' event
  // and checking the 'isCorrect' variable to either show error messages 
  // or check captcha code input field status when form is submitted
  $('#captchaCode').on('validatecaptcha', function(event, isCorrect) { // 
    // update validation status of captcha code input
      isCorrectCaptchaCode = isCorrect;
      
      // display or remove error message
      if (isCorrect) {
        $('.captchaCode').text('');
        $('#submitButton').attr('disabled', false);
      } else {
        $('.captchaCode').text('Incorrect code');
        $('#submitButton').attr('disabled', true);
      }
  });
  
  
  // validate captcha when form is submitted
  $('#basicForm').submit(function(event) {
    
    if (isCorrectCaptchaCode) {
      
      // captcha id for validating captcha at server-side
      var captchaId = captcha.getCaptchaId();

      // captcha code input value for validating captcha at server-side
      var captchaCode = $('#captchaCode').val();

      var postData = {
        captchaId: captchaId,
        captchaCode: captchaCode
      };

      $.ajax({
        method: 'POST',
        url: 'form/basic.php',
        data: JSON.stringify(postData),
        success: function(response) {
          if (response.success) {
            // captcha validation passed at server-side
            $('#form-messages')
              .removeClass()
              .addClass('alert alert-success')
              .text('CAPTCHA validation passed.');
          } else {
            // captcha validation failed at server-side
            $('#form-messages')
              .removeClass()      
              .addClass('alert alert-error')
              .text('CAPTCHA validation falied.');
          }
        },
        complete: function() {
          // always reload captcha image after validating captcha at server-side 
          // in order to update new captcha code for current captcha id
          captcha.reloadImage();
          $('#submitButton').attr('disabled', true);
        },
        error: function(error) {
          throw new Error(error);
        }
      });
      
    } else {
      $('#form-messages')
        .removeClass()      
        .addClass('alert alert-error')
        .text('Captcha code could not be empty.');
    }
    event.preventDefault();
  });
  
});
