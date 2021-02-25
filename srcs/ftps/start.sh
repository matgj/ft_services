#!/bin/sh

#IP=$(cat /ip.txt)
#sed -i '' "s/##IP##/$IP/g"  /etc/vsftpd/vsftpd.conf

# create given user if doesn't exist
#if ! id -u ${FTP_USER} > /dev/null 2>&1; then
 adduser -h /home/./${FTP_USER} -s /bin/false -D ${FTP_USER} ${FTP_USER}
#fi

# set ftp user password
echo "${FTP_USER}:${FTP_PASSWORD}" | /usr/sbin/chpasswd

chown ${FTP_USER}:${FTP_USER} /home/${FTP_USER}/ -R

# generate key ssl if not exists
#if [[ ! -f /etc/vsftpd/vsftpd.key ]]; then
chmod 600 /etc/vsftpd
openssl req -x509 -nodes -days 365 -newkey rsa:4096 -subj "/C=FR/ST=PR/L=magrosje/O=FR/CN=42" -keyout /etc/vsftpd/vsftpd.key -out /etc/vsftpd/vsftpd.crt
#fi

/usr/sbin/vsftpd /etc/vsftpd/vsftpd.conf
