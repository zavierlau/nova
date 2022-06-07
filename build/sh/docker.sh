#!/bin/bash
sudo docker ps 
echo 'Download code from S3'
sudo wget https://shedemo.s3.ap-southeast-1.amazonaws.com/deploy/gaw/code.zip -P /home/ubuntu/deploy/
echo 'unzip code'
sudo unzip -o /home/ubuntu/deploy/code.zip -d /home/ubuntu/deploy/ && sudo rm /home/ubuntu/deploy/code.zip
echo 'rsync code to Production'
sudo rsync -avzh --progress /home/ubuntu/deploy/ /home/ubuntu/gawcapital.com/
echo "restart container"
sudo docker-compose -f /home/ubuntu/gawcapital.com/docker-compose.yml down
sudo docker-compose -f /home/ubuntu/gawcapital.com/docker-compose.yml up -d
echo 'rm code'
sudo rm -rf /home/ubuntu/deploy/*



