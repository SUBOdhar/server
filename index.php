<!DOCTYPE html>
<?php
if (isset($_COOKIE["token"])) {
    // Redirect to /page if the user is  logged in
    header('location:/page/');
    exit();
}
?>
<html lang="en">

<head>

    <meta name="description"
        content="Subodh vet pharma(SVP)Your Trusted Partner in Veterinary Pharmaceuticals  At Subodh Vet Pharma(SVP), we are dedicated to providing high-quality veterinary pharmaceuticals to support the health and well-being of animals. With a commitment to excellence and innovation, we strive to be your trusted partner in animal healthcare.Explore our range of cutting-edge veterinary pharmaceuticals designed to meet the unique needs of different  animals.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" href="/assets/svp.ico" type="image/x-icon">
    <title>SVP | Home</title>

</head>

<body>
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

    <div class="topnav" id="myTopnav">
        <img src="assets/svp.png" alt="logo" width="50" height="50"
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


    <header id="home">
        <img src="assets/svp.png" alt="Logo" class="logo"> <!-- Add your logo here -->
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
        function changeLoaderIcon() {
            const loaderIcon = document.querySelector('.loader-wrapper i');
            const icons = ["fas fa-dog", "fas fa-cat", "fas fa-horse", "fas fa-fish", "fas fa-crow"];

            // Get the current icon index
            const currentIndex = icons.indexOf(loaderIcon.className);

            // Calculate the next index or go back to the first index
            const nextIndex = (currentIndex + 1) % icons.length;

            // Set the next icon
            loaderIcon.className = icons[nextIndex];
        }

        function startLoaderAnimation() {
            // Change the loader icon every 1 second (adjust as needed)
            setInterval(changeLoaderIcon, 1000);
        }

        // Call the startLoaderAnimation function when the page is loaded
        window.addEventListener('load', startLoaderAnimation);
    </script>

</body>

</html>