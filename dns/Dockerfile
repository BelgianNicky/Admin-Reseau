#Choix de l'OS
FROM ubuntu:latest

#MAJ
RUN apt-get update -y && apt-get upgrade -y
RUN apt-get install bind9 -y

COPY named.conf /etc/bind/named.conf
COPY named.conf.local /etc/bind/named.conf.local
COPY named.conf.options /etc/bind/named.conf.options

COPY zones/ /etc/bind/

EXPOSE 53

