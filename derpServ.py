# Built off of nettux443's answer on some stackoverflow page
# Janky bullshit by me

import socket, threading, pexpect, time, os
def tStamp(msg):
  print time.strftime('%m/%d/%y %H:%M:%S -- ')+msg

class ThreadedServer(object):
  def __init__(self, host, port, prog):
    self.host = host
    self.port = port
    self.prog = prog
    self.sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    self.sock.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEADDR, 1)
    self.sock.bind((self.host, self.port))

  def listen(self):
    self.sock.listen(5)
    while True:
      client, address = self.sock.accept()
      client.settimeout(60)
      threading.Thread(target = self.listenToClient,args = (client,address,self.prog)).start()

  def listenToClient(self, client, address, prog):
    sockAddr = address[0]+':'+str(address[1])
    tStamp(sockAddr+" connected")
    dsize = 1024
    try:
      p = pexpect.spawn('./'+prog)
      p.setecho(0)
      time.sleep(0.2) # Need these sleeps so that the program is actually done doing stuff
      pdat = p.read_nonblocking(1024,2)
      client.send(pdat)
      while p.isalive():
        cdat = client.recv(dsize)
        tStamp(sockAddr+" tried: "+cdat.rstrip())
        p.send(cdat)
        time.sleep(0.1)
	for line in p:
          client.sendall(line)
      client.close()
      tStamp(sockAddr+" disconnected")
    except Exception as e:
      print e
      client.close()
      tStamp(sockAddr+" disconnected")

if __name__ == "__main__":
  port_num = int(raw_input("Port number to listen on: "))
  prog_name = raw_input("Program to run on connect: ")
  if (not os.access(prog_name, os.X_OK)) or (os.path.isdir(prog_name)):
    print "I'm sorry dave, I can't do that."
    exit()
  tStamp("Waiting for connections...")
  ThreadedServer('',port_num,prog_name).listen()

