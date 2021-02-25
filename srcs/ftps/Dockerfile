FROM alpine:latest
ARG IP

#Nginx vsftpd packages
RUN apk add --no-cache vsftpd openssl && apk add --no-cache --upgrade bash

RUN echo $IP > ip.txt
RUN export IP=$(cat /ip.txt)

#Configuring vsftpd
COPY vsftpd.conf  /etc/vsftpd/vsftpd.conf

#Replace IP by minikube ip
RUN sed -i "s/##IP##/$IP/g" /etc/vsftpd/vsftpd.conf

#Start .sh as executable 
COPY ./start.sh /start.sh
CMD sh /start.sh
EXPOSE 20 21 30020 30021