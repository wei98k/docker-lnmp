# docker-lnmp

## build environment

### step1
insatll docker 

### step2
execute ```docker-compose up -d ```

build done 

## 已构建镜像

Laravel-5.5: ``` docker pull hellomjw/php:laravel ```

php-5.6: ``` docker pull hellomjw/php:5.6 ```

## Docker基本命令

构建一个镜像
```
docker build -t my-name . 
```
查看本地镜像
```
docker images
```

运行一个镜像
```
docker run -idt <镜像ID>
```

查看正在运行的容器
```
docker ps 
docker ps -qa #查看所有容器
```

进入容器
```
docker exec -it <容器ID> bash # 或 sh  
```

推送容器的线上仓库
```
# https://hub.docker.com 注册用户 创建一个仓库地址
sudo docker login #登录
sudo docker commit -m "推送说明" -a "推送人名字" <容器ID> <你创建的仓库地址> eg:ouruser/sinatra:v2
sudo docker push <你创建的仓库地址>
```

### 相关资料

[Blog-地址](http://www.majianwei.com)

[laravel5.5搭建方法](http://www.majianwei.com/docker%E5%AE%89%E8%A3%85laravel/)

[Docker常用命令](https://hellomjw.gitbooks.io/-liunx/content/docker.html)

