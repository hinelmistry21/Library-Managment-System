import serial
import time

z1baudrate = 9600
z1port = 'COM3'  # set the correct port before run it

z1serial = serial.Serial(port=z1port, baudrate=z1baudrate)
z1serial.timeout = 2  
if z1serial.is_open:
    while True:
        size = z1serial.inWaiting()
        if size:
            data = z1serial.read(size)
            print (data)
            data1=str(data).split("\\")[0].split("'")
            print(data1[1])
            f = open("C:/wamp64/www/dlms2.4/RFIDB.txt", "w")
            f.write(str(data1[1]))
            f.close()
        else:
            print()

        time.sleep(0.5)
else:
    print('It is not present')