# Docker-LNMP
利用 Docker-Compose 编排 LNMP开发环境  

### 清单
> 注: 完整版(docker-compose up -d)
- PHP7.2
- Nginx
- MySQL5.6
- Redis
- phpMyAdmin
- phpRedisAdmin
> 注: 精简版(docker-compose -f docker-compose-simplify.yml up -d)
- PHP7.2
- Nginx
- MySQL5.6
- Redis
### 目录结构
```
Docker-LNMP
|----docker                             Docker目录
|--------config                         配置文件目录
|------------proxy                      nginx配置文件目录
|--------files                          DockerFile文件目录
|------------cgi                        php-fpm DockerFile文件目录
|----------------Dockerfile             php-fpm DockerFile文件
|----------------docker-entrypoint.sh   php-fpm 启动脚本
|------------proxy                      nginx DockerFile文件目录
|----------------Dockerfile             nginx DockerFile文件
|----------------docker-entrypoint.sh   nginx 启动脚本
|--------log                            日志文件目录
|------------cgi                        php-fpm日志文件目录
|------------proxy                      nginx日志文件目录
|----www                                应用根目录
|--------index.php                      PHP例程
|----README.md                          说明文件
|----docker-compose.yml                 docker compose 配置文件(完整版: LNMP+Redis+phpMyAdmin+phpRedisAdmin)
|----docker-compose-simplify.yml        docker compose 配置文件(精简版: LNMP+Redis)
```
### 准备
```shell
# 安装docker和docker-compose
yum -y install epel-release 
yum -y install docker docker-compose

# 启动docker服务
service docker start

# 配置阿里云docker镜像加速器(建议配置加速器, 可以提升docker拉取镜像的速度)
mkdir -p /etc/docker
vim /etc/docker/daemon.json
# 新增下面内容
{
    "registry-mirrors": ["https://8auvmfwy.mirror.aliyuncs.com"]
}
# 重新加载配置、重启docker
systemctl daemon-reload 
systemctl restart docker 
```
### 安装
```
# 克隆项目
git clone https://github.com/duiying/Docker-LNMP.git
# 进入目录
cd Docker-LNMP
# 容器编排
docker-compose up -d
```
### 测试
执行成功
```
Creating cgi ... done
Creating proxy ... done
Creating mysql ...
Creating phpmyadmin ...
Creating phpredisadmin ...
Creating cgi ...
Creating proxy ...
```
访问IP, 效果图如下    
![效果图](https://raw.githubusercontent.com/duiying/img/master/docker-lnmp.png)

### 可能遇到的问题
```
# Error信息
The "https://packagist.phpcomposer.com/packages.json" file could not be down
# 解决方案
这是由于composer中国镜像失效, 修改Docker-LNMP/docker/files/cgi/Dockerfile
https://packagist.phpcomposer.com 改为 https://packagist.laravel-china.org
```
### 更新日志
- cgi容器支持crontab
- PHP支持rdkafka扩展
- PHP支持POSIX、PCNTL扩展

### Docker常用命令
**删除所有容器**  
docker rm -f $(docker ps -aq)  
**删除所有镜像**  
docker rmi $(docker images -q)  

### 感谢
[gengxiankun/dockerfiles](https://github.com/gengxiankun/dockerfiles)