#Choix de l'OS
FROM ubuntu:latest


#MAJ
RUN sudo apt-get update -y
RUN sudo apt-get upgrade -y

#Installation de apache php
RUN sudo apt-get install apache2 php7 

#Installation de postfix
RUN sudo apt-get install postfix -y

#Installaion de dovecot
RUN sudo apt-get install dovecot-imapd dovecot-pop3d -y

#Installation de SquirrelMail
RUN sudo wget https://sourceforge.net/projects/squirrelmail/files/stable/1.4.22/squirrelmail-webmail-1.4.22.zip
RUN sudo unzip squirrelmail-webmail-1.4.22.zip
RUN sudo mv squirrelmail-webmail-1.4.22 /var/www/html/
RUN sudo chown -R www-data:www-data /var/www/html/squirrelmail-webmail-1.4.22/
RUN sudo chmod 755 -R /var/www/html/squirrelmail-webmail-1.4.22/
RUN sudo mv /var/www/html/squirrelmail-webmail-1.4.22/ /var/www/html/squirrelmail

#Config files
COPY www /var/
COPY main.cf /etc/postfix/

RUN mkdir -p /dir1 && \
	mkdir -p /dir2 &&\

WORKDIR /workdir
VOLUME /volume


COPY example.conf /dir/
COPY example.conf /dir/

EXPOSE XX/tcp XX/udp

CMD ["/dir", "-c", "/file", "-fg"]
