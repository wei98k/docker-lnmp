#!/bin/bash
#dockerid = $(docker ps -qa)
docker stop $(docker ps -qa) && docker rm $(docker ps -qa)
