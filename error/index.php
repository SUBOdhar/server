<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/assets/warning.png">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #4e54c8, #8f94fb);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .error-container {
            max-width: 400px;
            background-color: rgba(45, 50, 56, 0.9);
            border: 1px solid #dc3545;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            opacity: 0;
            animation: fadeIn 0.5s forwards;
            text-align: center;
        }

        .error-icon {
            font-size: 64px;
            color: #dc3545;
            margin-bottom: 20px;
            animation: bounce 1s infinite; /* Add a subtle bounce animation */
        }

        .logo {
            max-width: 100%;
            height: auto;
            margin-bottom: 30px;
            border-radius: 50%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }

        h1 {
            color: #dc3545;
            font-size: 28px;
            margin-bottom: 15px;
        }

        p {
            font-size: 18px;
            margin-top: 15px;
            margin-bottom: 30px;
        }

        a {
            color: #61dafb;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }

        /* Responsive Styles */
        @media screen and (max-width: 480px) {
            .error-container {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="error-container">
        <img class="logo" src="/assets/svp.png" alt="Subodh Vet Pharma Logo">
        <div class="error-icon">&#9888;</div>
        <h1>Oops! Something went wrong.</h1>
        <p>We apologize for the inconvenience. Please try again later or <a href="/contact">contact support</a>.</p>
    </div>

    <script>
        // Detect system theme (light or dark mode)
        const prefersDarkMode = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;

        // Apply dark mode if the system prefers it
        if (prefersDarkMode) {
            document.body.style.background = 'linear-gradient(to right, #343a40, #60646b)';
            document.body.style.color = '#adb5bd';
        }
    </script>
</body>

</html>
