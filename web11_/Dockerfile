FROM ubuntu:latest

MAINTAINER Caio Farias aka fl45hky or g3n3

#RUN echo "deb http://ports.ubuntu.com/ubuntu-ports jammy-security main restricted " > /etc/apt/sources.list
#RUN echo "deb http://ports.ubuntu.com/ubuntu-ports jammy-security universe" > /etc/apt/sources.list
#RUN echo "deb http://ports.ubuntu.com/ubuntu-ports jammy-security multiverse" > /etc/apt/sources.list

RUN DEBIAN_FRONTEND=noninteractive

RUN apt-get update -y && apt-get upgrade -y

RUN apt-get install -y tzdata

RUN apt-get install -y apache2 && apt install -y php

RUN rm -rf /var/www/html/index.html && chown -R www-data:www-data /var/www/html


COPY source/*.php /var/www/html/
COPY source/*.html /var/www/html/
RUN echo "NjggNzQgNzQgNzAgNzMgM2EgMmYgMmYgNzQgNzcgNjkgNzQgNzQgNjUgNzIgMmUgNjMgNmYgNmQgMmYgNjIgNjEgNjQgNmEgNmYgNzIgNjEgNzMgNWYgNmUgNmYgNzc=" > /var/www/html/flag.txt

CMD ["/usr/sbin/apachectl", "-D", "FOREGROUND"]
