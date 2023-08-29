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


COPY sources/*.php /var/www/html/
COPY sources/*.html /var/www/html/

RUN php -S 0.0.0.0:5000 /var/www/html/vuln132321321321.php

CMD ["/usr/sbin/apachectl", "-D", "FOREGROUND"]
