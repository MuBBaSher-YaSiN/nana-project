<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ChrisTechEcommerceStore</title>
    <link rel="stylesheet" href="../WebClient/css/styles.css"> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="signup-container">
        <h2>Signup on ChrisTech</h2>
        <form id= "signupForm">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Register</button>
            <p class="error-message" id="error-message" style="display: none;"></p>
            <p>Already a user? <a href="login.php">Login here</a></p>
        </from>
    </div>

    <script>
        $(document).ready(function() {
            $('#signupForm').on('submit', function(event) {
                event.preventDefault(); 
                const username = $('#username').val();
                const password = $('#password').val();

                if (username && password) {
                    $.ajax({
                        url: 'api/register.php', 
                        type: 'POST',
                        data: {
                            username: username,
                            password: password
                        },
                        success: function(response) {
                            if (response.success) {
                                alert('Registration successful!');
                                window.location.href = 'login.php';
                            } else {
                                $('#error-message').text(response.message).show();
                            }
                        },
                        error: function() {
                            $('#error-message').text('An error occurred. Please try again.').show();
                        }
                    });
                } else {
                    $('#error-message').text('Please fill in all fields.').show();
                }
            });
        });
    </script>
</body>
</html>

