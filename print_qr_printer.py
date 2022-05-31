from escpos.printer import Serial
""" 9600 Baud, 8N1, Flow Control Enabled """


p.text("This is a test\n")
p = Serial(devfile='/dev/serial0',
           baudrate=9600,
           bytesize=8,
           parity='N',
           stopbits=1,
           timeout=1.00,
           dsrdtr=True
           )

p.set(
        underline=0,
        align="center",
        font="a",
        width=2,
        height=2,
        density=2,
        invert=0,
        smooth=False,
        flip=False,       
    )
#Printing the image
p.qr("AyudaSys",native=True,size=12)
