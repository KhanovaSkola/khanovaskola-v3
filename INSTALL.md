INSTALL GUIDE
=============

(for ~~dummmies~~...I mean novice web developers)


1. **Install dependencies**

##### Install PostgreSQL
```sh
sudo apt-get install postgresql postgresql-contrib
```

##### Install PHP and NGINX
```sh
sudo apt-get install php php-sqlite php-pgsql php-fpm php5-mcrypt php-curl
```

##### Install npm and gulp (for building frontend)
```sh
sudo apt-get install npm
sudo npm install ---global gulp
```
(I needed to change the env from node to nodejs in first line of /usr/local/bin/gulp on linux mint)

##### Install rabbitmq for asynchronous tasks (schema updating etc.)
```sh
sudo apt-get install rabbitmq-server
```

2. Enable Tracy debugger

To really see what is going wrong, it is **VERY helpful** to setup debugging environment *Tracy*. It should suffice to:
```sh
cp app/bootstrap.php.debug app/bootstrap.php:
```

Then you should get extremely nice debug info right in the browser!
To see available commands in the app:
```sh
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

##### Create the database (name must match config.local.neon)

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
```sh
php index.php  backup:list
php index.php  backup:restore TIMESTAMP  (first number form previous command)
```
 - Clear the data in the database
```sh
php www/index.php data:drop
```

6. Setting up NGINX

  - Setting up file permissions according to [20-chmod.sh] (production/deploy/post-receive.d/20-chmod.sh)
   (you may need to execute this for git to ignore these changes:)
   ```sh
   git config core.fileMode false
   ```
  - `sudo nginx -s stop`

  - Setup the web at localhost via an nginx conf file. For development, you can use (production/nginx-dev.conf) [production/nginx-dev.conf]. For production with HTTPS, look at (production/nginx.conf)[production/nginx.conf]
   ```sh
   cp production/nginx-dev.conf /etc/nginx/sites-available/ka-dev.conf
   ln -s /etc/nginx/sites-available/ka-dev.conf /etc/nginx/sites-enabled/ka-dev.conf
   ```
 - Make sure that user www-data is in the group that you previously used for the repo

 - Modify /etc/hosts , include e.g.
   ```
  127.0.0.1 ks.cz 
   ```

 - `sudo nginx`


7. TODO: How to setup elasticsearch server


8. Setting up workers via cron jobs for async tasks
(this is supremely important for production servers)
 - See [README for async tasks](doc/async-task.md)
 - Modify and put production/crontab into Cron jobs
  ```sh
  sudo cp production/crontab /etc/cron.d/KA
  ```

DEBUGGING
---------
(The following are messages from Tracy and corresponding corrective action)

*Problem:*
   ERROR in Kdyby/Facebook: Use of undefined constant URLOPT_CONNECTTIMEOUT – assumed ‚CURLOPT_CONNECTTIMEOUT‘

*Solution:*
   ```sh
   sudo apt-get install php-curl
   ```

*Problem:*
  Missing parameter ‘locale’
*Solution:*
  add parameter locale: “en” in app/config/config.local.neon (watch out, must be escaped with a TAB)

*Problem:*
   Call to undefined function App\Models\Services\mcrypt_get_iv_size() 

*Solution:*
   sudo apt-get install php5-mcrypt

