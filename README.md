# Docker-LNMP
利用 Docker-Compose 编排 LNMP开发环境  

### `清单`
- PHP7.2
- Nginx
- MySQL5.6
- Redis
- phpMyAdmin
- phpRedisAdmin

### `快速启动`
```
* 克隆项目
    git clone git@github.com:duiying/Docker-LNMP.git
* 进入目录
    cd Docker-LNMP
* 容器编排
    docker-compose up -d
```
### `目录结构`
```
Docker-LNMP
|----docker                 Docker目录
|----www                    应用根目录
|--------index.php          PHP例程
|----README.md              说明文件
|----docker-compose.yml     docker compose 配置文件
```
### `Docker常用命令`