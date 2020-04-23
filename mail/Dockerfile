FROM ubuntu:latest

RUN sudo apt-get update -y && \ sudo apt-get upgrade -y 


RUN mkdir -p /dir1 && \
	mkdir -p /dir2 &&\

WORKDIR /workdir
VOLUME /volume


COPY example.conf /dir/
COPY example.conf /dir/

EXPOSE XX/tcp XX/udp

CMD ["/dir", "-c", "/file", "-fg"]
