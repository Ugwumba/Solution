$(function(){
    // Login
    $('#login').submit(function(e){
        e.preventDefault();
        var user = $(this).serialize(); // Serialize the login form data
        var action = $(this).find('input[name="action"]').val(); // Get the action value
        $.ajax({
            type: 'POST',
            url: 'controller/a_AccountController.php', 
            data: user,
            dataType: 'json',
            success: function(response){
                console.log(response);
                if (action === '2') { // Check for login action
                    if (response.error) { 
                        // Handle login error
                        $('#login-error-message').text(response.message);
                        // Apply CSS styles (you can use your existing CSS)
                        $('#login-error-message').css('color', '#fff'); 
                        $('#login-error-message').css('background-color', 'rgb(231, 85, 122)'); 
                        $('#login-error-message').css('border', '1px solid rgb(231, 85, 122)'); 
                        $('#login-error-message').css('text-align', 'center');
                        $('#login-error-message').css('padding', '10px');
                        $('#login-error-message').css('margin', '10px');
                        $('#login-error-message').css('border-radius', '5px');
                    }
                    else {
                        // Redirect to the specified page on successful login
                        window.location.href = 'admin/home.php';
                    }
                }
            },
            error: function(xhr, status, error) {
                // Handle AJAX error
                console.log("AJAX Error:", status, error);
            }
        });
    });

    $('#change-password').submit(function(e){
        e.preventDefault();
        var user = $(this).serialize();
        var action = $(this).find('input[name="action"]').val(); // Get the action value
        $.ajax({
          type: 'POST',
          url: '../controller/a_AccountController.php',
          data: user,
          dataType:'json',
          success: function(response){
            if(response.error){
              $.toast({ 
                text : '<h6 style="color: #fff; font-size: 13px;"><i class="fa fa-exclamation-circle "></i> '+response.message+'</h6>', 
                showHideTransition : 'slide', 
                bgColor : '#b92020',              
                textColor : '#eee',            
                allowToastClose : false,       
                hideAfter : 5000,              
                stack : 5,                     
                textAlign : 'left',            
                position : 'top-center'      
              });
            }
            else{
              $('#change-password')[0].reset();
              $.toast({ 
                text : '<h6 style="color: #fff;"><i class="fa fa-check "></i> '+response.message+'</h6>', 
                showHideTransition : 'slide', 
                bgColor : 'green',              
                textColor : '#eee',            
                allowToastClose : false,       
                hideAfter : 5000,              
                stack : 5,                     
                textAlign : 'left',            
                position : 'top-center'      
              });
            }
          }
        });
      });



});
