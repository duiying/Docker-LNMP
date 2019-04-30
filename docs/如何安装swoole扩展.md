# 如何安装swoole扩展

#### 如何安装swoole扩展

```shell
# 进入PHP容器
[root@localhost Docker-LNMP]# docker exec -it cgi bash

# 解决gcc版本过低的问题
yum -y install centos-release-scl
yum -y install devtoolset-7
scl enable devtoolset-7 bash

# 下载、安装
wget https://github.com/swoole/swoole-src/archive/v4.2.1.tar.gz &&\
	tar -zxvf v4.2.1.tar.gz &&\
	cd swoole-src-4.2.1 &&\
	phpize &&\
	./configure &&\
	make && make install &&\
	sed -i '$a \\n[swoole]\nextension=swoole.so' /etc/php.ini &&\
cd ../ && rm -rf v4.2.1.tar.gz swoole-src-4.2.1

# 退出PHP容器
[root@510d01c199f5 /]# exit
exit

# 重启PHP容器
[root@localhost Docker-LNMP]# docker restart cgi
```

![swoole](https://raw.githubusercontent.com/duiying/img/master/swoole.png)  

