FROM ubuntu:22.04
ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update \
    && apt-get -y install \
		  iputils-ping \
		  iproute2 \
		  net-tools \
		  dnsutils \
		  vim \
		  apache2 \
		  php libapache2-mod-php \
		  #slapd ldap-utils \
		  curl \
    && apt-get clean

EXPOSE 80 443 8080

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]



