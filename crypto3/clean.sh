echo Stopped:
docker kill `docker ps -a | grep cripto03 | cut -d ' ' -f1`
echo Removed:
docker rm `docker ps -a | grep cripto03 | cut -d ' ' -f1`
