#!/bin/sh

#Save IP
export IP=$(cat /ip.txt)
#Put the real minikube ip
sed -i "s/IP/$IP/g" /www/wp-config.php
#run a php built-in web server listening on all ip adress on this machine, with root set to /www/
php -S 0.0.0.0:5050 -t /www/