From sheadmin/dev3:php2
COPY $CODEBUILD_SRC_DIR /code  
RUN chown -R www-data:www-data /code

#update php config (max_execution_time to 60)
RUN sed -i 's/max_execution_time = 30/max_execution_time = 60/g' /etc/php/7.4/fpm/php.ini
# (post_max_size to 50M)
RUN sed -i 's/post_max_size = 8M/post_max_size = 50M/g' /etc/php/7.4/fpm/php.ini
# (upload_max_filesize to 50M)
RUN sed -i 's/upload_max_filesize = 2M/upload_max_filesize = 50M/g' /etc/php/7.4/fpm/php.ini

#update php pool.d config
RUN sed -i 's/pm.max_children = 5/pm.max_children = 100/g' /etc/php/7.4/fpm/pool.d/www.conf
RUN sed -i 's/pm.start_servers = 2/pm.start_servers = 8/g' /etc/php/7.4/fpm/pool.d/www.conf
RUN sed -i 's/pm.min_spare_servers = 1/pm.min_spare_servers = 4/g' /etc/php/7.4/fpm/pool.d/www.conf
RUN sed -i 's/pm.max_spare_servers = 3/pm.max_spare_servers = 8/g' /etc/php/7.4/fpm/pool.d/www.conf
RUN sed -i 's/;clear_env = no/clear_env = no/g' /etc/php/7.4/fpm/pool.d/www.conf


RUN apt-get update && apt-get install wget -y
RUN apt-get clean
CMD ["/usr/bin/supervisord"]
