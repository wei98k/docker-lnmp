#!/bin/bash
docker run --name mysql3307 -v /home/docker-data/mysql:/var/lib/mysql -e MYSQL_ROOT_PASSWORD=root123 -d -p 3307:3306  mysql/mysql-server:5.6
