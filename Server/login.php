<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ChrisTechEcommerceStore</title>
    <link rel="stylesheet" href="../WebClient/css/styles.css"> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="login-page">
    <div class="login-container">
        <h2>Login to ChrisTech</h2>
        <form id="loginForm">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
            <p class="error-message" id="error-message" style="display: none;"></p>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign up here</a>.</p>
    </div>

    <script>
        // AJAX request for login form submission
        $(document).ready(function () {
            $('#loginForm').on('submit', function (e) {
                e.preventDefault(); // Prevent form from submitting normally

                // Get form data
                var username = $('#username').val();
                var password = $('#password').val();

                // Send AJAX request
                $.ajax({
                    type: 'POST',
                    url: 'api/authenticate_ajax.php',
                    data: JSON.stringify({ username: username, password: password }),
                    contentType: 'application/json',
                    dataType: 'json',
                    success: function (response) {
                        console.log('Server response:', response); // Debug response
                        if (response.success) {
                            // Redirect based on the user's role
                            if (response.role === 'admin') {
                                window.location.href = 'admin_dashboard.php';
                            } else {
                                window.location.href = 'Index.php';
                            }
                        } else {
                            // Show error message
                            $('#error-message').text(response.message).show();
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log('AJAX error:', textStatus, errorThrown); // Debug AJAX error
                        $('#error-message').text('An error occurred. Please try again.').show();
                    }
                });
            });
        });
    </script>
</body>
</html>
