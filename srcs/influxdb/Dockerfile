FROM alpine:latest

#install packages
RUN apk update && apk add influxdb \
&& apk add --no-cache --upgrade bash

COPY start.sh /start.sh

#Start .sh as executable
RUN chmod +x /start.sh
EXPOSE 8086
CMD ./start.sh