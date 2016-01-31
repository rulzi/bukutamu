# Symfony Buku Tamu

A Symfony project created on January 27, 2016, 12:31 pm.

## Instalasi
Clone Repository
```sh
$ git clone https://github.com/rulzi/bukutamu.git
```
Buat databse kemudian masuk kedalam folder dan install composer
```sh
$ composer install
```
Update Database
```sh
$ php app/console doctrine:schema:update --force
```
Buat user login
```sh
$ php app/console fos:user:create admin
$ php app/console fos:user:promote admin ROLE_ADMIN
```
Jalankan applikasi
```sh
$ php app/console server:run
```
buka browser [localhost:8000](http://localhost:8000)

### Kritik dan Saran
Jika ada Kritik atau saran kirim ke email science.afandi@gmail.com