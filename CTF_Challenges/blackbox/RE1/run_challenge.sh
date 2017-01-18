#!/bin/sh

nohup socat tcp-listen:4477,fork,reuseaddr EXEC:/home/ubuntu/CTF_Challenges/blackbox/RE1/re1 &
