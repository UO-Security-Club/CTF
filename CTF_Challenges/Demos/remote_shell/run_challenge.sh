#!/bin/sh

nohup socat tcp-listen:4488,fork,reuseaddr EXEC:/home/ubuntu/CTF_Challenges/Demos/remote_shell/overflow &
