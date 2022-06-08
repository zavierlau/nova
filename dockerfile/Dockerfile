From ubuntu:20.04
  
# Set the timezone.
RUN ln -sf /usr/share/zoneinfo/Asia/Hong_Kong /etc/localtime
RUN date

#update the repository to US

RUN rm -f /etc/apt/sources.list


#add ppa tools add-apt-repository
RUN apt-get update -y
#RUN apt-get upgrade - 


RUN apt-get install -y  software-properties-common
#RUN add-apt-repository ppa:nginx/stable 

#add ppa repository for php7.4
#RUN LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php
#RUN apt-get update -y


RUN apt-get install -y --no-install-recommends vim supervisor
RUN apt-get install -y --no-install-recommends  nginx
RUN apt-get install -y curl

RUN apt-get install -y php7.4-cli php7.4-fpm php7.4-curl php7.4-gd php7.4-mysql php7.4-mbstring zip unzip php7.4-xml php-pear
RUN apt-get install -y php7.4-apcu php7.4-zip php-redis php-memcached php-mongodb
RUN service php7.4-fpm restart
RUN php -v
RUN php -m


RUN apt-get clean
RUN rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*RUN apt-get clean

RUN mkdir -p /var/log/supervisor
RUN mkdir -p /var/run/php
RUN mkdir -p /var/log/php-fpm

#COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
RUN rm -f /etc/nginx/sites-available/default
#copy ./nginx.default /etc/nginx/sites-available/default
#copy ./info.php /var/www/html/

EXPOSE 22 80 443
CMD ["/usr/bin/supervisord"]
