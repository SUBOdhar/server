import psutil

def get_battery_status():
    battery = psutil.sensors_battery()
    percent = battery.percent
    print(f"{percent}%")

if __name__ == "__main__":
    get_battery_status()
