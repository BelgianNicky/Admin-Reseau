#Choix de l'OS
FROM ubuntu:latest

#MAJ
RUN apt-get update -y && apt-get upgrade -y
RUN apt-get install wget zip unzip nano bind9 -y

COPY named.conf /etc/bind/
COPY named.conf.local /etc/bind/
COPY named.conf.options /etc/bind/

COPY zones /etc/bind/

EXPOSE 53 53/udp

