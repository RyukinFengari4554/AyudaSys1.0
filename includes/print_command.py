import os
import json
from time import sleep
import datetime
import string
import random
from subprocess import call
import requests
from escpos import *


cmd ='ls /dev/*'
os.system(cmd)
cmd = 'ls /dev/usb*'
os.system(cmd)
cmd = 'sudo chmod 666 /dev/usb/lp0'
os.system(cmd)
# Print QR Code w/ Settings
thermal_printer = printer.File("/dev/usb/lp0")
thermal_printer.qr("../images/qr_code.png", size=4, model=2)
thermal_printer.cut()
print("\nStatus => Printer Printed the Receipt!\n\n")