FROM ubuntu:latest

RUN apt-get update -y && apt-get upgrade -y
RUN apt-get install nano -y

RUN DEBIAN_FRONTEND=noninteractive apt-get install apache2 -y 

COPY sites-available/ /etc/apache2/sites-available/
COPY sites-enabled/ /etc/apache2/sites-enabled/

COPY b2b.wt1-11.ephec-ti.be/ /var/www/
COPY html/ /var/www/

COPY certificate.crt /etc/ssl/
COPY private.key /etc/ssl/

EXPOSE 80 443
