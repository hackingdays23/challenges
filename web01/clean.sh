echo Stopped:
docker kill `docker ps -a | grep web1 | cut -d ' ' -f1`
echo Removed:
docker rm `docker ps -a | grep web1 | cut -d ' ' -f1`
