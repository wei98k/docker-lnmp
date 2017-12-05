FROM node:9.2-alpine
RUN apk update && apk upgrade

RUN npm install gulp -g

RUN mkdir /home/src
ADD src/package.json /home/src/package.json
RUN npm install

EXPOSE 3000
EXPOSE 35729

CMD ["npm", "start"]
