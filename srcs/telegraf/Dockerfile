FROM alpine:latest
ARG IP

#We write minikube ip in a .txt
RUN echo $IP > ip.txt
RUN export IP=$(cat /ip.txt)

#install package and telegraf
RUN apk add --no-cache --upgrade bash \ 
&& mkdir /etc/telegraf \
&& wget https://dl.influxdata.com/telegraf/releases/telegraf-1.13.3-static_linux_amd64.tar.gz \
&& tar -C . -xzf telegraf-1.13.3-static_linux_amd64.tar.gz \
&& chmod +x telegraf/* \
&& cp telegraf/telegraf /usr/bin/ \
&& rm -rf *.tar.gz* telegraf/ 

COPY start.sh .
#copy conf telegraf and replace ip by minikube ip
COPY telegraf.conf /etc/telegraf/telegraf.conf
RUN sed -i "s/##IP##/$IP/g" /etc/telegraf/telegraf.conf

#Start .sh as executable 
EXPOSE 4999
RUN chmod +x /start.sh
CMD ./start.sh