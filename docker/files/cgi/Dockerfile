FROM centos:7.2.1511

RUN yum install -y epel-release &&\
	rpm -ivh https://mirrors.tuna.tsinghua.edu.cn/remi/enterprise/remi-release-7.rpm

RUN yum install -y --enablerepo=remi --enablerepo=remi-php72 \
    php \
	php-opcache \
	php-devel \
	php-mbstring \
	php-xml \
	php-zip \
	php-cli \
	php-fpm \
	php-mcrypt \
	php-mysql \
	php-pdo \
	php-curl \
	php-gd \
	php-mysqld \
	php-bcmath \
	php-redis \
	php-process \
	wget \
	gcc \
	gcc-c++ \
	make \
	unzip \ 
	cronie \
	crontabs &&\
    mkdir /run/php-fpm/ &&\
    yum clean all

RUN curl -sSL https://getcomposer.org/installer | php &&\
    mv composer.phar /usr/local/bin/composer &&\
    composer config -g repo.packagist composer https://packagist.phpcomposer.com &&\
    composer global require fxp/composer-asset-plugin v1.4.2 -vvv

RUN sed -i 's/listen = 127.0.0.1:9000/listen = [::]:9000/p' /etc/php-fpm.d/www.conf &&\
	sed -i '/listen.allowed_clients = 127.0.0.1/d' /etc/php-fpm.d/www.conf
	
RUN wget https://github.com/edenhill/librdkafka/archive/v1.0.0-RC8.tar.gz &&\
    tar -zxvf v1.0.0-RC8.tar.gz &&\
	cd librdkafka-1.0.0-RC8 &&\
	./configure &&\
	make && make install &&\
	cd ../ && rm -rf v1.0.0-RC8.tar.gz librdkafka-1.0.0-RC8
	
RUN wget https://github.com/arnaud-lb/php-rdkafka/archive/3.0.5.tar.gz &&\
    tar -zxvf 3.0.5.tar.gz &&\
	cd php-rdkafka-3.0.5 &&\
	phpize &&\
	./configure &&\
	make && make install &&\
	sed -i '$a \\n[rdkafka]\nextension=rdkafka.so' /etc/php.ini &&\
    cd ../ && rm -rf 3.0.5.tar.gz php-rdkafka-3.0.5

COPY docker-entrypoint.sh /usr/local/bin/

RUN chmod +x /usr/local/bin/docker-entrypoint.sh

RUN sed -i '/session    required   pam_loginuid.so/c\#session    required   pam_loginuid.so' /etc/pam.d/crond

CMD ["docker-entrypoint.sh"]
