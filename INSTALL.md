INSTALL GUIDE
=============

(for ~~dummmies~~...I mean novice web developers)


1. Install dependencies

##### Install PostgreSQL
```sh
sudo apt-get install postgresql postgresql-contrib
```

###### Install PHP and NGINX
```sh
sudo apt-get install php php-sqlite php-pgsql php-fpm php5-mcrypt
```

###### Install npm and gulp (for building frontend)
```sh
sudo apt-get install npm
sudo npm install ---global gulp
```
(I needed to change the env from node to nodejs in first line of /usr/local/bin/gulp on linux mint)

###### Install rabbitmq for asynchronous tasks (schema updating etc.)
```sh
sudo apt-get install rabbitmq-server
```

2. Enable Tracy debugger

To really see what is going wrong, it is VERY helpful to setup debugging environment Tracy. It should suffice to:
```sh
cp app/bootstrap.php.debug app/bootstrap.php:
```

Then you should get extremely nice debug info right in the browser!
To see available commands in the app:
```php
php www/index.php list
```

3. Configure Postgre
[According to a guide for Ubuntu](https://help.ubuntu.com/community/PostgreSQL)
```sh
sudo -u postgres createuser --superuser $USER
sudo -u postgres psql
```
```
postgres=# \password $USER
```

###### Create the database (name must match config.local.neon)

```sh
createdb khanovaskola
```

(if you create DB under different psql user, you need to execute something like this)
```sql
GRANT ALL PRIVILEGES ON DATABASE khanovaskola to khanovaskola;
```

4. Configure app/config/config.local.neon
Tip: Get the template from:

```sh
cp app/config/stages/dev.neon app/config/config.local.neon
```
Note: the database parameters must match what you did in step 3.

5. Creating initial database inside PSQL
 - The most straightforward way seems to be importing the backup
```php
php index.php  backup:list
php index.php  backup:restore TIMESTAMP  (first number form previous command)
```
 - Clear the data in the database
```php
php www/index.php data:drop
```

6. TODO: Setting up NGINX

7. TODO: How to setup elasticsearch server

8. TODO: setting up workers via cron jobs for async tasks


