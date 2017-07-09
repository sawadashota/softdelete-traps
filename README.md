# SoftDeleteTraps
Laravelの論理削除の落とし穴を検証するために作りました。
詳細は[Laravelの論理削除と愉快なトラップたち](http://qiita.com/sawadashota/items/2cefb140441e1e720fc5)を御覧ください。

## Getting Start
```bash
$ docker-compose pull
$ docker-compose run --rm web php artisan migrate --seed 
$ docker-compose up -d
```

Then, access to [http://localhost:8080/countries](http://localhost:8080/countries)