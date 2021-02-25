FROM alpine:latest
#Get the minikube ip to config mysql database
ARG IP

#Mariadb packages
RUN apk update \
&& apk add mariadb mariadb-client && apk add --no-cache --upgrade bash \
&& rm -rf /var/cache/apk/*

#We write minikube ip in a .txt
RUN echo $IP > ip.txt

#Scripts to init mysql database
COPY ./init_docker.sh .
COPY ./init_mysql.sh .
COPY wordpress.sql .

#Apply permission .sh as executable
RUN chmod +x init_docker.sh
RUN chmod +x init_mysql.sh

COPY start.sh /start.sh

#Start .sh as executable
RUN chmod +x start.sh
EXPOSE 3306
CMD ./init_docker.sh