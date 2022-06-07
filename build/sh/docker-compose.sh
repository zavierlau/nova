#!/bin/bash
sudo docker ps 
echo "docker login to ecr"
sudo aws ecr get-login-password --region ap-southeast-1 | sudo docker login --username AWS --password-stdin 959922238848.dkr.ecr.ap-southeast-1.amazonaws.com/sheadmin/weshecom
echo "Stopping current container"
sudo docker stop we-she-com_web_1
echo "Removing old container"
sudo docker rm -f we-she-com_web_1
echo "Rename the stopped container o old" 
sudo docker rename we-she-com_web_1 we-she-com_web_1-old
echo "RM old Image"
sudo docker rmi -f 959922238848.dkr.ecr.ap-southeast-1.amazonaws.com/sheadmin/weshecom:latest sheadmin/dev3:v5
echo "Fetching Latest Images"
sudo docker pull 959922238848.dkr.ecr.ap-southeast-1.amazonaws.com/sheadmin/weshecom
echo "Tag image"
sudo docker tag 959922238848.dkr.ecr.ap-southeast-1.amazonaws.com/sheadmin/weshecom sheadmin/dev3:v5
sudo docker images -a
echo "starting new container"
sudo docker-compose -f /we-she-com/docker-compose.yml up -d 
sudo docker ps 
echo 'Rm Ecr Images'
aws ecr list-images --repository-name _repo_ --region ap-southeast-1 --query 'imageIds[?type(imageTag)!=`string`].[imageDigest]' --output text | while read line; do aws ecr batch-delete-image --repository-name _repos_ --region ap-southeast-1 --image-ids imageDigest=$line; done	



