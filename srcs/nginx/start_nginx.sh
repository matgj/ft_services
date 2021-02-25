#!/bin/sh
chnmod 600 /etc/ssh
mv -f /sshd_config /etc/ssh/sshd_config
mkdir .ssh
mv /authorized_keys .ssh/authorized_keys
chmod 700 .ssh
chmod 644 .ssh/authorized_keys

#Start the SSH and nginx
/usr/sbin/sshd
/usr/sbin/nginx -g 'daemon off;' 