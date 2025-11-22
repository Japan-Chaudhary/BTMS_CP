<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="Registration.css" >
</head>
<body>
    

    <div class="main-content">
        <div class="registration-container">
            <h1>Create Account</h1>
            <p class="subtitle">Join us today and get started</p>

            <form onsubmit="handleRegister(event)">
                <div class="form-row">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" id="firstName" name="firstName" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Select Type</label>
                        <div class="radio-group">
                            <div class="radio-option">
                                <input type="radio" id="student" name="userType" value="student" checked>
                                <label for="student">Student</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" id="faculty" name="userType" value="faculty">
                                <label for="faculty">Faculty</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="enrollment">Enrollment Number</label>
                        <input type="text" id="enrollment" name="enrollment" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <select id="city" name="city" required>
                            <option value="">City</option>
                            <option value="mumbai">Mehsana</option>
                            <option value="delhi">Palanpur</option>
                            <option value="bangalore">Ahemdabad</option>
                            <option value="kolkata">Visnagar</option>
                            <option value="chennai">Patan</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="password-wrapper">
                            <input type="password" id="password" name="password" required>
                            <button type="button" class="toggle-password" onclick="togglePassword('password')">
                                <span id="toggleIcon1">Show</span>
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <div class="password-wrapper">
                            <input type="password" id="confirmPassword" name="confirmPassword" required>
                            <button type="button" class="toggle-password" onclick="togglePassword('confirmPassword')">
                                <span id="toggleIcon2">Show</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="terms" name="terms" required>
                    <a href='#'><label for="terms" class="checkbox-label">I agree to the Terms and Conditions</label></a>
                </div>

                <button type="submit" class="register-button">Register</button>

                <div class="error-message" id="errorMessage">Please check your information</div>
                <div class="success-message" id="successMessage">Registration successful!</div>

                <p class="login-link">Already have an account? <a href="/BTMS_CP_1/login.php">Log in</a></p>
            </form>
        </div>
    </div>

    <script>
        function togglePassword(fieldId) {
            const passwordInput = document.getElementById(fieldId);
            const toggleIcon = document.getElementById(fieldId === 'password' ? 'toggleIcon1' : 'toggleIcon2');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.textContent = 'Hide';
            } else {
                passwordInput.type = 'password';
                toggleIcon.textContent = 'Show';
            }
        }

        function handleRegister(event) {
            event.preventDefault();
            
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            const terms = document.getElementById('terms').checked;
            const errorMessage = document.getElementById('errorMessage');
            const successMessage = document.getElementById('successMessage');

            errorMessage.style.display = 'none';
            successMessage.style.display = 'none';

            if (!terms) {
                errorMessage.textContent = 'Please accept the Terms and Conditions';
                errorMessage.style.display = 'block';
                return;
            }

            if (password !== confirmPassword) {
                errorMessage.textContent = 'Passwords do not match';
                errorMessage.style.display = 'block';
                return;
            }

            if (password.length < 6) {
                errorMessage.textContent = 'Password must be at least 6 characters';
                errorMessage.style.display = 'block';
                return;
            }

            // Simulated registration
            successMessage.style.display = 'block';
            setTimeout(() => {
                console.log('Registration successful');
            }, 1000);
        }
    </script>
</body>
</html>