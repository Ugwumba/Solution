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
          response = JSON.parse(response);
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
                    // You can add more styles as needed
                }
                else {
                    // Redirect to the specified page on successful login
                    window.location.href = 'admin2/home.php';
                }
            }
        },
        error: function(xhr, status, error) {
            // Handle AJAX error
            console.log("AJAX Error:", status, error);
        }
    });
  });
});