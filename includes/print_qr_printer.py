from escpos.printer import Serial
from escpos import printer
""" 9600 Baud, 8N1, Flow Control Enabled """
import os

cmd = 'sudo chmod 666 /dev/usb/lp0'
os.system(cmd)
p = printer.File("/dev/usb/lp0")
p.set(
        align="center",
        font="a",
        width=2,
        height=2,
        density=2,
        invert=0,
        smooth=False,
        flip=False,       
    )
p.text("This QR Code will serve as your\n Queue Number for Ayuda Distribution.\n")
#Printing the image
p.set(
        align="center",
        font="a",
        width=2,
        height=2,
        density=2,
        invert=0,
        smooth=False,
        flip=False,       
    )
p.qr("AyudaSys",native=True,size=16)
p.text("\n \n \n")
p.text("Notice:The ayuda will be distributed at 1 week's time.")

