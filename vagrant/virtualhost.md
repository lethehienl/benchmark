# Install virtualhost
    => Step 1: go to vagrant : open "terminal" -> go to "cd vagrant" folder -> run "vagrant up" -> run "vagrant ssh"
    => Step 2: edit virtualhost file : run sudo vi /etc/apache2/sites-available/000-default.conf
    => step 3: input data
```php
<VirtualHost *:80>
    ServerAdmin webmaster@mvpapitest.local
    DocumentRoot "/var/www/projects/mvpapitest"
    ServerName mvpapitest.local
    <Directory "/var/www/projects/mvpapitest">
       AllowOverride All
       Options Indexes MultiViews FollowSymLinks
       Require all granted
    </Directory>
    ErrorLog "/var/log/apache2/mvpapitest.local-error_log"
    CustomLog "/var/log/apache2/mvpapitest.local-access_log" common
</VirtualHost>
<VirtualHost *:80>
    ServerAdmin webmaster@mvpgatest.local
    DocumentRoot "/var/www/projects/mvpgatest"
    ServerName mvpgatest.local
    <Directory "/var/www/projects/mvpgatest">
       AllowOverride All
       Options Indexes MultiViews FollowSymLinks
       Require all granted
    </Directory>
    ErrorLog "/var/log/apache2/mvpgatest.local-error_log"
    CustomLog "/var/log/apache2/mvpgatest.local-access_log" common
</VirtualHost>

```


    => Step4: change host file : run  sudo vi /etc/hosts  and input
```php
127.0.0.1  mvpapitest.local mvpgatest.local
```

    => Step 5: Go to host file of real computer and change host
```php
10.9.1.3 mvpapitest.local mvpgatest.local
```
=> Done setup virtual host