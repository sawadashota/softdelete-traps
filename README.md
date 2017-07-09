# SoftDeleteTraps
Laravelの論理削除の落とし穴を検証するために作りました。

## Getting Start
```bash
$ docker-compose pull
$ docker-compose run --rm web php artisan migrate --seed 
$ docker-compose up -d
```

Then, access to [http://localhost:8080/countries](http://localhost:8080/countries)