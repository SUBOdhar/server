<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    if (isset($_COOKIE["token"])) {
        // Redirect to login/page if the user is not logged in
        header('location: /page/');
        exit();
    } ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            scroll-behavior: smooth;
        }

        .topnav {
            overflow: hidden;
            background-color: #333;
        }

        .topnav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
            margin-top: 5px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
            border-radius: 5px;
        }

        .topnav .icon {
            display: none;
        }

        /* Style for login and signup container */
        .login-signup-container {
            float: right;
            padding-right: 5px;
            /* Add padding to the right */
        }

        /* Style for login and signup buttons */
        .login-signup-container a {
            display: inline-block;
            padding: 14px 16px;
            border-radius: 5px;
            margin-left: 10px;
        }

        @media screen and (max-width: 600px) {
            .topnav a:not(:first-child) {
                display: none;
            }

            .home {
                margin-top: 10px;
            }

            .topnav a.icon {
                float: right;
                display: block;
            }

            /* Adjust styles for login and signup container in mobile view */
            .login-signup-container {
                float: none;
                text-align: center;
                margin-top: 5px;
                padding-right: 0;
            }

            .login-signup-container a {
                display: block;
                margin: 5px 0;
                box-shadow: none;
            }

            .topnav.responsive {
                position: relative;
            }

            .topnav.responsive .icon {
                position: absolute;
                right: 0;
                top: 0;
            }

            .topnav.responsive a {
                float: none;
                display: block;
                text-align: left;
            }
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f0f0f0;
        }

        .loader-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #fff;
            z-index: 9999;
        }

        .loader {
            border: 8px solid #3498db;
            border-radius: 50%;
            border-top: 8px solid #fff;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            position: relative;
        }

        .loader i {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 24px;
            color: #3498db;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        header {
            background-color: #3498db;
            color: #fff;
            padding: 1em;
            text-align: center;
            animation: fadeInUp 1s ease-out;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .logo {
            width: 50px;
            margin-right: 20px;
        }

        h1 {
            color: #fff;
            margin: 0;
            font-size: 2em;
        }

        section {
            padding: 2em;
            animation: fadeIn 1s ease-out;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            color: #333;
        }

        h2 {
            color: #3498db;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-size: 1.5em;
        }

        p {
            color: #555;
            line-height: 1.6;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: #3498db;
            color: #fff;
            padding: 8px;
            margin-bottom: 8px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        footer {
            display: none;
            background-color: #2c3e50;
            color: #fff;
            text-align: center;
            padding: 1em;
            animation: fadeInUp 1s ease-out;
            position: relative;
            bottom: 0;
            left: 0;
            width: 100%;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <div class="topnav" id="myTopnav">
        <img src="svp.png" alt="" width="50" height="50"
            style="float: left;padding-top: 5px;padding-left: 5px;padding-right: 5px;">
        <a href="javascript:void(0);" class="home" onclick="scrollToSection('home')">Home</a>
        <a href="javascript:void(0);" onclick="scrollToSection('contact')">Contact</a>
        <a href="javascript:void(0);" onclick="scrollToSection('about')">About</a>
        <!-- Login and Signup container -->
        <div class="login-signup-container">
            <a href="/login/">Login</a>
            <a href="/login/">Signup</a>
        </div>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <!-- Loader screen -->
    <div class="loader-wrapper">
        <div class="loader">
            <i class="fas fa-dog"></i>
            <i class="fas fa-cat"></i>
            <i class="fas fa-horse"></i>
            <i class="fas fa-fish"></i>
            <i class="fas fa-crow"></i> <!-- Added hen icon -->
        </div>
    </div>

    <header id="home">
        <img src="svp.png" alt="Logo" class="logo"> <!-- Add your logo here -->
        <div>
            <h1>Subodh Vet Pharma</h1> <!-- Green text -->
            <p>Your Trusted Partner in Veterinary Pharmaceuticals</p>
        </div>
    </header>

    <section>
        <h2>Welcome to Subodh Vet Pharma</h2>
        <i class="fas fa-heartbeat" style="font-size: 64px; color: #e74c3c; margin-bottom: 20px;"></i>
        <!-- Red heartbeat icon -->
        <p>
            At Subodh Vet Pharma, we are dedicated to providing high-quality veterinary pharmaceuticals to support the
            health and well-being of animals. With a commitment to excellence and innovation, we strive to be your
            trusted
            partner in animal healthcare.
        </p>

        <h2>Key Products</h2>
        <p>Explore our range of cutting-edge veterinary pharmaceuticals designed to meet the unique needs of different
            animals.</p>
        <ul>
            <li><i class="fas fa-pills"></i> Medications for Livestock</li>
            <li><i class="fas fa-bone"></i> Pet Supplements</li>
            <li><i class="fas fa-egg"></i> Poultry Health Solutions</li>
            <!-- Add more products as needed -->
        </ul>

        <h2 id="about">Our Services</h2>
        <i class="fas fa-stethoscope" style="font-size: 64px; color: #3498db; margin-bottom: 20px;"></i>

        <p>We offer a range of services to ensure the well-being of animals:</p>
        <ul>
            <li><i class="fas fa-user-md"></i> Consultation with Experienced Veterinarians</li>
            <li><i class="fas fa-file-medical"></i> Customized Medication Plans</li>
            <li><i class="fas fa-heart"></i> Health and Wellness Programs</li>
        </ul>

        <h2>Why Choose Subodh Vet Pharma?</h2>
        <i class="fas fa-certificate" style="font-size: 64px; color: #f39c12; margin-bottom: 20px;"></i>
        <!-- Orange certificate icon -->
        <p>Our commitment to quality, innovation, and animal welfare sets us apart:</p>
        <ul>
            <li><i class="fas fa-check"></i> Strict Quality Control Standards</li>
            <li><i class="fas fa-user-md"></i> Experienced Team of Veterinarians and Researchers</li>
            <li><i class="fas fa-flask"></i> Continuous Innovation in Pharmaceutical Solutions</li>
        </ul>

        <h2>Get in Touch</h2>
        <i class="fas fa-envelope" style="font-size: 64px; color: #3498db; margin-bottom: 20px;"></i>
        <p>Have questions or need assistance? Contact us today.</p>
        <p>Email: <a href="mailto:query@svp.com.np" style="text-decoration: none; color: #555;">query@svp.com.np</a>
        </p>
        <p>Phone: <a href="tel:+9779851049428" style="text-decoration: none; color: #555;">+977 9851049428</a></p>

        <h2 id="contact">Ready to Transform Animal Healthcare?</h2>
        <i class="fas fa-handshake" style="font-size: 64px; color: #e67e22; margin-bottom: 20px;"></i>
        <!-- Orange handshake icon -->
        <p>Partner with Subodh Vet Pharma for innovative veterinary solutions.</p>
        <button
            style="background-color: #e67e22; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;"
            onclick="goToContactPage()">Contact
            Us</button>
    </section>

    <footer id="main-footer">
        <p>&copy; 2023 Subodh Vet Pharma. All rights reserved.</p>
    </footer>

    <script>
        function goToContactPage() {
            // Navigate to the contact.html page
            window.location.href = '/contact';
        }

        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }

        function scrollToSection(sectionId) {
            var section = document.getElementById(sectionId);
            section.scrollIntoView({ behavior: 'smooth' });
        }

        // Hide the loader and show the footer when the entire page is loaded
        window.addEventListener('load', function () {
            document.querySelector('.loader-wrapper').style.display = 'none';
            document.getElementById('main-footer').style.display = 'block'; // Show the footer
        });
    </script>

</body>

</html>