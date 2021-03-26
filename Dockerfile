FROM ubuntu:20.10
RUN apt-get update

RUN export DEBIAN_FRONTEND=noninteractive
RUN apt-get install -y tzdata
RUN ln -fs /usr/share/zoneinfo/Europe/Warsaw /etc/localtime
RUN dpkg-reconfigure --frontend noninteractive tzdata

RUN apt-get install -y -qq php
RUN apt-get install sudo
RUN echo '%sudo ALL=(ALL) NOPASSWD:ALL' >> /etc/sudoers

RUN useradd -ms /bin/bash ubuntu
RUN usermod -aG sudo ubuntu
USER ubuntu

COPY . /home/ubuntu/DevilSwarm
WORKDIR /home/ubuntu/DevilSwarm
