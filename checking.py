import serial
import time

z1baudrate = 9600
z1port = 'COM3'  

z1serial = serial.Serial(port=z1port, baudrate=z1baudrate)
z1serial.timeout = 2  

print (z1serial.is_open)  
if z1serial.is_open:
    while True:
        size = z1serial.inWaiting()
        if size:
            data = z1serial.read(size)
	    
            print(data)
            f = open("RFID.txt", "w")
            f.write(data)
            f.close()
        else:
            print ('no data')
        time.sleep(1)
else:
    print ('z1serial not open')
  
