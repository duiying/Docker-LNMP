# 如何新建一个站点

比如部署一个Yii2项目 https://github.com/duiying/Yii2-Admin , 并且可以通过 http://frontend.yii2.test 访问  

#### 1. 配置Nginx
```shell
# Docker-LNMP/docker/config/proxy/conf.d 目录下新建一个配置文件 yii2-docker.conf
[root@localhost Docker-LNMP]# vim docker/config/proxy/conf.d/yii2-docker.conf
``` 
yii2-docker.conf 内容如下:
```
server {

    listen 80;

    server_name frontend.yii2.test;
    root /data/www/Yii2-Admin/frontend/web;
    index index.php index.html index.htm;

    location / {
        # Redirect everything that isn't a real file to index.php
        try_files $uri $uri/ /index.php$is_args$args;
    }

    # deny accessing php files for the /assets directory
    location ~ ^/assets/.*\.php$ {
        deny all;
    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_pass cgi:9000;
        try_files $uri =404;
    }

    location ~* /\. {
        deny all;
    }

}
```

#### 2. 克隆项目
```shell
# Docker-LNMP/www 目录下安装 https://github.com/duiying/Yii2-Admin , 安装过程如下:
[root@localhost Docker-LNMP]# cd www
[root@localhost www]# ls
index.php
[root@localhost www]# git clone https://github.com/duiying/Yii2-Admin.git
[root@localhost www]# ls
index.php  Yii2-Admin

# 更改目录权限
[root@localhost www]# chmod -R 777 Yii2-Admin/
```

#### 3. 修改本地hosts

```
# 192.168.246.128是虚拟机IP地址
192.168.246.128 frontend.yii2.test
```

#### 4. 重启Nginx
```shell
[root@localhost Docker-LNMP]# docker restart proxy
proxy
```

#### 5. 浏览器访问
http://frontend.yii2.test  

![yii2-index](https://raw.githubusercontent.com/duiying/img/master/yii2-index.png)  