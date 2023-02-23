FROM ubuntu
ENV DEBIAN_FRONTEND=noninteractive
RUN apt-get update && apt-get -y install apache2 netcat php php-ldap libapache2-mod-php && apt-get clean && rm -rf /var/lib/apt/lists/*


EXPOSE 80
EXPOSE 443

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]