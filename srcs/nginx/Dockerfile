FROM alpine
#Nginx openssl openssh packages
RUN apk update \
    && apk add nginx \
    && apk add --no-cache --upgrade bash \
    && apk add openssl \
    && apk add openssh-server \
    && apk add --update openssh 

#Creating new user and group 'www' for nginx
RUN adduser -D -g 'www' www

#Create a directory for html files
RUN mkdir /www \
    && chown -R www:www /var/lib/nginx \
    && chown -R www:www /www \
    && mkdir -p /run/nginx

#Configuring Nginx to listen to port 80 443 and process .html files
RUN rm /etc/nginx/nginx.conf
COPY nginx.conf /etc/nginx/nginx.conf 
COPY index.html /www/index.html

#Create an user for SSH, setup pw as password and generate KEY with default path empty pw
RUN adduser -D user \
    && echo "user:password"|chpasswd \
    && ssh-keygen -A

#Create a SSL key and crt
RUN yes "" | openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/certs/localhost.key -out /etc/ssl/certs/localhost.crt

#Config the sshd so he listen to port 30022 and allow user sign in, copy id rsa pub key of minikube inside authorized keys
COPY ssh/sshd_config /sshd_config 
COPY ssh/id_rsa.pub /authorized_keys

#Start .sh as executable
COPY start_nginx.sh ./start_nginx.sh
RUN chmod +x /start_nginx.sh
CMD sh ./start_nginx.sh

EXPOSE 80 443 30022