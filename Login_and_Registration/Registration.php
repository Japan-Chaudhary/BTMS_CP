<?php
// registration.php - Registration form page
session_start();
$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
$formData = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : [];
unset($_SESSION['errors']);
unset($_SESSION['form_data']);
?>

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
             <?php if (!empty($errors)): ?>
                <div class="error-message" style="display: block;">
                    <?php foreach ($errors as $error): ?>
                        <p><?php echo htmlspecialchars($error); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <form action="register.php" method="POST">
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
                            <option value="Mehsana">Mehsana</option>
                            <option value="Palanpur">Palanpur</option>
                            <option value="Ahemdabad">Ahemdabad</option>
                            <option value="Visnagar">Visnagar</option>
                            <option value="Patan">Patan</option>
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

                <p class="login-link">Already have an account? <a href="/BTMS_CP_1/Login_and_Registration/login.php">Log in</a></p>
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

<?php
// SQL to create the users table
/*
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    user_type ENUM('student', 'faculty') NOT NULL,
    enrollment_number VARCHAR(50) NOT NULL UNIQUE,
    phone VARCHAR(15) NOT NULL,
    city VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_email (email),
    INDEX idx_enrollment (enrollment_number)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
*/
?>