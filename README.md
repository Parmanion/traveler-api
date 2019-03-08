# Traveler api

### Install
```
git clone git@github.com:Parmanion/traveler-api.git
composer install 
```

### Launch
```
docker compose up
```

if this is your first launch you can also generate all fake data for your dev environment
```
docker exec -it YOUR_CONTAINER_ID /bin/bash
composer run fixtures
```
you can now request api on localhost:8081

### Documentation
TODO
