echo Stopped:
docker kill `docker ps -a | grep web07 | cut -d ' ' -f1`
echo Removed:
docker rm `docker ps -a | grep web07 | cut -d ' ' -f1`
