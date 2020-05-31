FROM ubuntu:latest

RUN apt-get update -y && apt-get upgrade -y
RUN apt-get install nano -y

RUN DEBIAN_FRONTEND=noninteractive apt-get install apache2 -y 

COPY sites-available/ /etc/apache2/sites-available
COPY sites-enabled/ /etc/apache2/sites-enabled

COPY b2b.wt1-11.ephec-ti.be/ /var/www/b2b.wt1-11.ephec-ti.be
COPY html/ /var/www/html

COPY certificate.crt /etc/ssl/
COPY private.key /etc/ssl/

RUN a2enmod ssl
RUN service apache2 restart

EXPOSE 80 443
