FROM alpine
ARG IP

#PHP packages
RUN apk update && apk add wget && apk add --no-cache --upgrade bash && mkdir /www \
&& apk add php7 php7-fpm php7-opcache php7-gd php7-mysqli php7-zlib php7-curl php7-mbstring php7-json php7-session

#Save IP
RUN echo $IP > ip.txt

#Install WP
RUN wget https://wordpress.org/latest.tar.gz \
&& tar -xvf latest.tar.gz \
&& mv wordpress/* /www \
&& rm -rf /var/cache/apk/*

#Copy config wp
COPY wp-config.php /www/wp-config.php

#Start .sh as executable 
COPY setup.sh .
RUN chmod +x setup.sh
EXPOSE 5050
CMD ./setup.sh