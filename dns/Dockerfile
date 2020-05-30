#Choix de l'OS
FROM ubuntu:latest

#MAJ
RUN apt-get update -y && apt-get upgrade -y
RUN apt-get install bind9 -y

COPY named.conf /etc/bind/
COPY named.conf.local /etc/bind/
COPY named.conf.options /etc/bind/

RUN mkdir /etc/bind/zones
COPY zones/178.51.in-addr.arpa /etc/bind/zones/178.51.in-addr.arpa
COPY zones/18.172.in-addr.arpa /etc/bind/zones/18.172.in-addr.arpa
COPY zones/db.internal /etc/bind/zones/db.internal
COPY zones/db.wt1-11.ephec-ti.be /etc/bind/zones/db.wt1-11.ephec-ti.be

EXPOSE 53

