FROM ubuntu:latest

MAINTAINER Fernando Fresteiro aka M4st3r3k

#RUN echo "deb http://ports.ubuntu.com/ubuntu-ports jammy-security main restricted " > /etc/apt/sources.list
#RUN echo "deb http://ports.ubuntu.com/ubuntu-ports jammy-security universe" > /etc/apt/sources.list
#RUN echo "deb http://ports.ubuntu.com/ubuntu-ports jammy-security multiverse" > /etc/apt/sources.list

RUN DEBIAN_FRONTEND=noninteractive

RUN apt-get update -y && apt-get upgrade -y

RUN apt-get install -y tzdata

RUN apt-get install -y apache2 && apt install -y php

RUN rm -rf /var/www/html/index.html && chown -R www-data:www-data /var/www/html

RUN mkdir /var/www/html/audio
RUN mkdir /var/www/html/css
RUN mkdir /var/www/html/downloads
RUN mkdir /var/www/html/media

COPY source/*.php /var/www/html/
COPY source/audio /var/www/html/audio
COPY source/css /var/www/html/css
COPY source/downloads /var/www/html/downloads
COPY source/media /var/www/html/media

CMD ["/usr/sbin/apachectl", "-D", "FOREGROUND"]
