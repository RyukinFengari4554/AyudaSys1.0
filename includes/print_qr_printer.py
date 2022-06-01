from escpos.printer import Serial
from escpos import printer
import os
import sys
""" 9600 Baud, 8N1, Flow Control Enabled """
aqr = sys.argv[1]
cmd = 'sudo chmod 666 /dev/usb/lp0'
os.system(cmd)
p = printer.File("/dev/usb/lp0")
p.set(
        align="center",
        font="a",
        width=1,
        height=1,
        density=2,
        invert=0,
        smooth=False,
        flip=False,       
      )
p.text("This QR Code will serve as your\n Queue Number for Ayuda\n Distribution.\n")
p.text("                                ")
p.text("\n\n\n")
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
p.qr("%s"%aqr,native=True,size=12)
p.text("                                ")
p.text("\n")
p.set(
        align="center",
        font="a",
        width=1,
        height=1,
        density=2,
        invert=0,
        smooth=False,
        flip=False,       
      )

p.text("Notice:The ayuda will be\n distributed at 1 week's time.")
p.text("                                ")
p.text("                                ")
p.text("\n \n\n")
p.text("                                ")
p.text("                                ")
p.text("\n \n\n")
print("QR CODE PRINTED SUCCESSFULLY")
