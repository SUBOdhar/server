<html lang="en">
<?php if (!$_COOKIE["token"]) {
    header('location:../index.php');
} ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="chat.png" type="image/x-icon">

</head>

<body>
    <div class="box">
        <div class="top">
            <img class="logo" src="chat.png" height="40px" style="margin-bottom: 10px;">
            <div class="user">
                <img class="logousr" src="funcode.png" height="40px" style="margin-bottom: 10px;">
                <p>Funcode</p><ion-icon name="log-out-outline"></ion-icon>
            </div>
        </div>

        <div class="msg" id="msg">
            <button onclick="scrollToLatestMessage()" class="scroll-button" id="scrollButton"><ion-icon
                    name="arrow-down-outline"></ion-icon>
            </button>
        </div>

        <div class="input">
            <input type="text" class="text">
            <button onclick="send()"><ion-icon name="send-outline" style="font-size: 20px;    display: flex;
    align-items: center;
    border-radius: 16px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(3.5px);
    -webkit-backdrop-filter: blur(3.5px);
    border-radius: 8px;
    padding: 5px;
    text-align: center;
    margin: auto;"></ion-icon></button>
        </div>
        <div id="context-menu" class="custom-context-menu">
            <ul>
                <li id="remove-message">Remove</li>
            </ul>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>