#!/bin/bash

echo 'Rm Ecr Images'
aws ecr list-images --repository-name _repo_ --query 'imageIds[?type(imageTag)!=`string`].[imageDigest]' --output text | while read line; do aws ecr batch-delete-image --repository-name _repos_ --image-ids imageDigest=$line; done	
	