# 如何安装 Yaf 扩展

#### 安装 Yaf 扩展

```shell
# 进入 PHP 容器
[root@localhost Docker-LNMP]# docker exec -it cgi bash

# 下载、安装
wget http://pecl.php.net/get/yaf-3.0.8.tgz &&\
	tar -zxvf yaf-3.0.8.tgz &&\
	cd yaf-3.0.8 &&\
	phpize &&\
	./configure &&\
	make && make install &&\
	sed -i '$a \\n[yaf]\nextension=yaf.so\nyaf.environ=product' /etc/php.ini &&\
cd ../ && rm -rf yaf-3.0.8.tgz yaf-3.0.8

# 退出 PHP 容器
[root@510d01c199f5 /]# exit
exit

# 重启 PHP 容器
[root@localhost Docker-LNMP]# docker restart cgi
```

<div align=center><img src="https://raw.githubusercontent.com/duiying/img/master/yaf.png" width="600"></div>  
