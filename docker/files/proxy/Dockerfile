FROM centos:7.2.1511

RUN yum install -y epel-release &&\
	rpm -ivh https://mirrors.tuna.tsinghua.edu.cn/remi/enterprise/remi-release-7.rpm &&\
	yum install -y --enablerepo=remi wget gcc gcc-c++ make

RUN wget http://nginx.org/packages/centos/7/noarch/RPMS/nginx-release-centos-7-0.el7.ngx.noarch.rpm &&\
	rpm -ivh nginx-release-centos-7-0.el7.ngx.noarch.rpm &&\
	yum -y install nginx &&\
	mkdir -p /data/www

# COPY ./Yii2.conf /etc/nginx/conf.d/default.conf

COPY docker-entrypoint.sh /usr/local/bin/

RUN chmod +x /usr/local/bin/docker-entrypoint.sh

CMD ["docker-entrypoint.sh"]