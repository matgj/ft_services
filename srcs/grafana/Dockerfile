FROM alpine:latest

#install packages
RUN apk update && apk add --no-cache --upgrade bash \
&& apk add libc6-compat --no-cache --repository=http://dl-cdn.alpinelinux.org/alpine/edge/main \
&& rm -rf /var/cache/apk/*

#install grafana
RUN wget https://dl.grafana.com/oss/release/grafana-6.7.2.linux-amd64.tar.gz \
&& tar -zxvf grafana-6.7.2.linux-amd64.tar.gz

#copy grafana db
RUN mkdir /grafana-6.7.2/data
COPY ./grafana.db ./grafana-6.7.2/data/

COPY start.sh /start.sh

#Start .sh as executable
RUN chmod +x /start.sh
EXPOSE 3000
CMD ./start.sh