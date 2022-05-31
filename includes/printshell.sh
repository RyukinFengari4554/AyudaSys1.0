
curl ("../images/qr_code.png") |
pngtopnm > qr_code.ppm

ls /dev/*

ls /dev/usb*

sudo chmod 666 /dev/usb/lp0

#!/bin/bash
exec > qr_code.ppm    # All echo statements will write here
echo "P3 250 250 255"  # magic, width, height, max component value
for ((y=0; y<250; y++)) {
  for ((x=0; x<250; x++)) {
    echo -e "$((x^y)) $((x^y)) $((x|y))" > /dev/usb/lp0 # r, g, b
  }
}


