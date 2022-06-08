From cuteribs/dsm-ubuntu1604

# develop nginx 
# Set the timezone.
RUN ln -sf /usr/share/zoneinfo/Asia/Hong_Kong /etc/localtime
RUN date


#update the repository to US
RUN rm -f /etc/apt/sources.list
#copy ./sources.list /etc/apt/sources.list

#redis
#import the repository of redies 
#copy ./dotdeb.org.list /etc/apt/sources.list.d/
#add the public key 
#copy ./dotdeb.gpg /tmp/
RUN apt-key add /tmp/dotdeb.gpg
#RUN wget -q -O - http://www.dotdeb.org/dotdeb.gpg | apt-key add -

RUN apt-get update -y

RUN apt-get install -y redis-server

# Keep upstart from complaining
RUN dpkg-divert --local --rename --add /sbin/initctl
RUN ln -sf /bin/true /sbin/initctl
RUN mkdir /var/run/sshd
RUN mkdir /run/php

# Let the conatiner know that there is no tty
ENV DEBIAN_FRONTEND noninteractive


#install app
#sudo, vim, git, nginx and add-apt-repository 
#RUN apt-get install -y vim git sudo
RUN apt-get install -y vim curl
RUN apt-get install -y nginx
RUN apt-get install -y software-properties-common python-software-properties
RUN apt-get update -y

#add ppa repository for php7.2 and install php7.2
RUN LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php
RUN apt-get update -y

#zip unzip 
RUN apt-get install -y php7.2-cli php7.2-fpm php7.2-curl php7.2-gd php7.2-mysql php7.2-mbstring php7.2-xml php-pear
RUN apt-get install -y php7.2-apcu php7.2-zip php7.2-xmlrpc php-redis php-memcached php-mongodb
RUN php -v
RUN php -m

#install composer
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN composer

#install mysql mysql-client
RUN apt-get -y install mysql-server

# mysql config
RUN sed -i -e "s/^bind-address\s*=\s*127.0.0.1/explicit_defaults_for_timestamp = true\nbind-address = 0.0.0.0/" /etc/mysql/mysql.conf.d/mysqld.cnf

#openssh-server
RUN apt-get install -y openssh-server

RUN mkdir -p /var/log/supervisor
RUN mkdir -p /var/run/php
RUN mkdir -p /var/log/php-fpm

# supervisor
RUN apt-get install -y supervisor
#copy ./supervisord.conf /etc/supervisord.conf

#clean apt-get
RUN apt-get clean
RUN rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*RUN apt-get clean

RUN rm -f /etc/nginx/sites-available/default
#copy ./nginx.default /etc/nginx/sites-available/default
#copy ./info.php	/var/www/html/



VOLUME ["/var/lib/mysql", "/var/run/sshd"]

EXPOSE 22 80 443 3386


