# 如何安装yaf扩展

#### 安装yaf扩展

```shell
# 进入PHP容器
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

# 退出PHP容器
[root@510d01c199f5 /]# exit
exit

# 重启PHP容器
[root@localhost Docker-LNMP]# docker restart cgi
```

![yaf](https://raw.githubusercontent.com/duiying/img/master/yaf.png)  
