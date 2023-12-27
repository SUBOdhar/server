<?php
$output = shell_exec("python3 power.py");
$output2 = shell_exec("python3 status.py");
$batteryLevel = (int) $output; // Convert the output to an integer

// You may want to add additional validation or error handling here
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live battery percentage</title>

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css">

    <style>
        /* Add any additional styles here */
    </style>
</head>

<body>
    <!--=============== BATTERY ===============-->
    <section class="battery">
        <div class="battery__card">
            <div class="battery__data">
                <p class="battery__text">Battery</p>
                <h1 class="battery__percentage">
                    <?php echo $batteryLevel; ?>%
                </h1>

                <p class="battery__status">
                    <i class="ri-plug-line"></i>
                    <?php echo $batteryLevel <= 20 ? 'Low battery' : ''; ?>
                </p>
            </div>

            <div class="battery__pill">
                <div class="battery__level">
                    <div class="battery__liquid"></div>
                </div>
            </div>
        </div>
    </section>

    <!--=============== MAIN JS ===============-->
    <script>
        /*=============== BATTERY ===============*/
        initBattery()

        function initBattery() {
            const batteryLiquid = document.querySelector('.battery__liquid'),
                batteryStatus = document.querySelector('.battery__status'),
                batteryPercentage = document.querySelector('.battery__percentage')

            // Simulate battery information obtained from PHP
            const batt = {
                level: <?php echo $batteryLevel; ?> / 100,
                charging: false

                // Assume not charging for simplicity
            };

            updateBattery = () => {
                /* 1. We update the number level of the battery */
                let level = Math.floor(batt.level * 100);
                batteryPercentage.innerHTML = level + '%';

                /* 2. We update the background level of the battery */
                batteryLiquid.style.height = `${parseInt(batt.level * 100)}%`;

                /* 3. We validate full battery, low battery, and if it is charging or not */
                if (level == 100) {
                    /* We validate if the battery is full */
                    batteryStatus.innerHTML = `Full battery <i class="ri-battery-2-fill green-color"></i>`;
                    batteryLiquid.style.height = '103%'; /* To hide the ellipse */
                } else if (level <= 20 && !batt.charging) {
                    /* We validate if the battery is low */
                    batteryStatus.innerHTML = `Low battery <i class="ri-plug-line animated-red"></i>`;
                } else if (batt.charging) {
                    /* We validate if the battery is charging */
                    batteryStatus.innerHTML = `Charging... <i class="ri-flashlight-line animated-green"></i>`;
                } else {
                    /* If it's not loading, don't show anything. */
                    batteryStatus.innerHTML = '';
                }

                /* 4. We change the colors of the battery and remove the other colors */
                if (level <= 20) {
                    batteryLiquid.classList.add('gradient-color-red');
                    batteryLiquid.classList.remove('gradient-color-orange', 'gradient-color-yellow', 'gradient-color-green');
                } else if (level <= 40) {
                    batteryLiquid.classList.add('gradient-color-orange');
                    batteryLiquid.classList.remove('gradient-color-red', 'gradient-color-yellow', 'gradient-color-green');
                } else if (level <= 80) {
                    batteryLiquid.classList.add('gradient-color-yellow');
                    batteryLiquid.classList.remove('gradient-color-red', 'gradient-color-orange', 'gradient-color-green');
                } else {
                    batteryLiquid.classList.add('gradient-color-green');
                    batteryLiquid.classList.remove('gradient-color-red', 'gradient-color-orange', 'gradient-color-yellow');
                }
            }

            updateBattery();

            /* 5. Battery status events */
            // Note: The existing event listeners are already in place to handle chargingchange and levelchange
        }
    </script>
</body>

</html>