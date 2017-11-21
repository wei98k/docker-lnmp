#!/bin/bash
docker rm $(docker ps -aq --filter exited=1)
