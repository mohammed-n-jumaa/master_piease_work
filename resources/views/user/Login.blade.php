<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration & Login</title>
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@1,600;1,700;1,800&family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">    
    <style>
        body {
            background: url('img/carousel-2.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #fff;
            overflow: hidden;
        }

        .container {
            max-width: 600px;
            margin-top: 40px;
        }

        .card {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.6);
            position: relative;
        }

        .form-header {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .form-header span {
            font-size: 16px;
            font-weight: bold;
            padding: 8px 15px;
            color: #1b1b1b;
            background-color: #aa9166;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .form-header span.active {
            background-color: #a18f66;
            color: #fff;
        }

        .form-header span:hover:not(.active) {
            background-color: #a6882a;
            color: #fff;
        }

        .form-group label {
            color: #aa9166;
            font-size: 14px;
        }

        .form-control {
            background-color: #333;
            border: none;
            color: #fff;
            margin-bottom: 12px;
            padding: 8px;
            font-size: 14px;
        }

        .btn-gold {
            background-color: #aa9166;
            color: #1b1b1b;
            font-weight: bold;
            width: 100%;
            padding: 8px;
            font-size: 16px;
        }

        .btn-gold:hover {
            background-color: #c29d2d;
            color: #fff;
        }

        .toggle-form-link {
            color: #aa9166;
            cursor: pointer;
        }

        .form-row {
            display: flex;
            gap: 10px;
        }

        .form-row .form-group {
            flex: 1;
        }

        .lawyer-fields, .user-fields {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="form-header">
                <span id="register-toggle" class="active">Register</span>
                <span id="login-toggle">Login</span>
            </div>
            <div id="form-container">
                <!-- Registration Form -->
                <div id="registration-form">
                    <form enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="role">Select Role</label>
                            <select id="role" class="form-control" required>
                                <option value="">Select Role</option>
                                <option value="lawyer">Lawyer</option>
                                <option value="user">User</option>
                            </select>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="first-name">First Name</label>
                                <input type="text" class="form-control" id="first-name" required>
                            </div>
                            <div class="form-group">
                                <label for="last-name">Last Name</label>
                                <input type="text" class="form-control" id="last-name" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="birthdate">Date of Birth</label>
                                <input type="date" class="form-control" id="birthdate" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm-password">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm-password" required>
                            </div>
                        </div>

                        <!-- Lawyer-Specific Fields -->
                        <div class="lawyer-fields">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="specialization">Specialization</label>
                                    <input type="text" class="form-control" id="specialization">
                                </div>
                                <div class="form-group">
                                    <label for="certificate">Upload Certificate</label>
                                    <input type="file" class="form-control" id="certificate">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-gold">Register</button>
                    </form>
                    <p class="text-center mt-3">
                        Already have an account? <span class="toggle-form-link" id="show-login-form">Log in</span>
                    </p>
                </div>

                <!-- Login Form -->
                <div id="login-form" style="display:none;">
                    <form>
                        <div class="form-group">
                            <label for="login-email">Email</label>
                            <input type="email" class="form-control" id="login-email" required>
                        </div>
                        <div class="form-group">
                            <label for="login-password">Password</label>
                            <input type="password" class="form-control" id="login-password" required>
                        </div>
                        <button type="submit" class="btn btn-gold">Log In</button>
                    </form>
                    <p class="text-center mt-3">
                        Don't have an account? <span class="toggle-form-link" id="show-register-form">Sign up</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const registerToggle = document.getElementById("register-toggle");
        const loginToggle = document.getElementById("login-toggle");
        const registrationForm = document.getElementById("registration-form");
        const loginForm = document.getElementById("login-form");
        const roleSelect = document.getElementById("role");
        const lawyerFields = document.querySelector(".lawyer-fields");
        const showLoginForm = document.getElementById("show-login-form");
        const showRegisterForm = document.getElementById("show-register-form");

        registerToggle.addEventListener("click", () => {
            registrationForm.style.display = "block";
            loginForm.style.display = "none";
            registerToggle.classList.add("active");
            loginToggle.classList.remove("active");
        });

        loginToggle.addEventListener("click", () => {
            loginForm.style.display = "block";
            registrationForm.style.display = "none";
            loginToggle.classList.add("active");
            registerToggle.classList.remove("active");
        });

        roleSelect.addEventListener("change", (e) => {
            if (e.target.value === "lawyer") {
                lawyerFields.style.display = "block";
            } else {
                lawyerFields.style.display = "none";
            }
        });

        showLoginForm.addEventListener("click", () => {
            loginForm.style.display = "block";
            registrationForm.style.display = "none";
        });

        showRegisterForm.addEventListener("click", () => {
            registrationForm.style.display = "block";
            loginForm.style.display = "none";
        });
        
    </script>
</body>
</html>
