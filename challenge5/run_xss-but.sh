#!/bin/bash

if [ $# -ne 1 ]; then
	exit 1
fi

tmpfile="$1"
#cookiefile=$2

RUN=`phantomjs --ignore-ssl-errors=true --local-to-remote-url-access=true --web-security=false --ssl-protocol=any xss-bot.js $tmpfile | grep -oP "cookie=.{0,55}"`

echo $RUN
