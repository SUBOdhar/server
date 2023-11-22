import psutil


def get_battery_status():
    battery = psutil.sensors_battery()
    power_plugged = battery.power_plugged

    if power_plugged:
        status = "1"
    else:
        status = "0"

    print(f"{status}")


if __name__ == "__main__":
    get_battery_status()
