<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css" >
    
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1>Welcome</h1>
            <p>Please login to your account</p>
        </div>

        <div class="input-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" placeholder="Enter your email" required>
        </div>

        <div class="input-group">
            <label for="password">Password</label>
            <div class="password-wrapper">
                <input type="password" id="password" placeholder="Enter your password" required>
                <button type="button" class="toggle-password" onclick="togglePassword()">
                    <span id="toggleIcon">Show</span>
                </button>
            </div>
        </div>

        <div class="forgot-password">
            <a href="#">Forgot Password?</a>
        </div>

        <button class="login-btn" onclick="handleLogin()">Login</button>

        <div class="error-message" id="errorMessage">Invalid email or password</div>
        <div class="success-message" id="successMessage">Login successful!</div>

        <div class="divider">
            <span>OR</span>
        </div>

        <div class="signup-link">
            Don't have an account? <a href="/BTMS_CP_1/Registration.php">Register</a>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.textContent = 'Hide';
            } else {
                passwordInput.type = 'password';
                toggleIcon.textContent = 'Show';
            }
        }

        function handleLogin() {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const errorMessage = document.getElementById('errorMessage');
            const successMessage = document.getElementById('successMessage');

            errorMessage.style.display = 'none';
            successMessage.style.display = 'none';

            if (!email || !password) {
                errorMessage.textContent = 'Please fill in all fields';
                errorMessage.style.display = 'block';
                return;
            }

            if (!email.includes('@')) {
                errorMessage.textContent = 'Please enter a valid email';
                errorMessage.style.display = 'block';
                return;
            }

            setTimeout(() => {
                window.location.href = 'dashboard.php'; 
            }, 1000);

            // Simulated login 
            successMessage.style.display = 'block';
            setTimeout(() => {
                console.log('Login attempt:', { email, password: '***' });
            }, 1000);
        }

        // Allow Enter key to submit
        document.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                handleLogin();
            }
        });
    </script>
</body>
</html>