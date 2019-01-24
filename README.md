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
```
* 安装docker和docker-compose
    yum -y install docker docker-compose
* 启动docker服务
    service docker start
```
### 快速启动
```
* 克隆项目
    git clone git@github.com:duiying/Docker-LNMP.git
* 进入目录
    cd Docker-LNMP
* 容器编排
    docker-compose up -d
```

### Docker常用命令
**删除所有容器**  
docker rm -f $(docker ps -aq)  
**删除所有镜像**  
docker rmi $(docker images -q)  