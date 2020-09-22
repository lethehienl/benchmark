sudo apt-get update
sudo apt-get install apache2-utils 
ab -V

Test benchmark

ab -c 1 -n 50 -s 600 -r  http://mvpapitest.local/updateproduct.php
ab -c 100 -n 500 -s 600 -r http://mvpapitest.local/updateproduct.php
ab -c 300 -n 1000 -s 600 -r http://mvpapitest.local/updateproduct.php
ab -c 500 -n 2000 -s 600 -r http://mvpapitest.local/updateproduct.php

Where:
-c: concurrency, the number of multiple requests to perform at a time. Default is one request at a time.
-n: requests, the number of requests to perform for the benchmarking session. The default is to just perform a single request which usually leads to non-representative benchmarking results.
-r: Don't exit on socket receive errors.
And as positional argument, the URL of your website with the specified module e.g / (for homepage).

Apply monolog to track issue
Ref: https://stackify.com/php-monolog-tutorial/
cd: /var/www/projects/mvpapitest
sudo cp /var/www/composer.phar /var/www/projects/mvpapitest/
sudo php composer.phar require monolog/monolog

<php>
require_once(DIR.'/vendor/autoload.php');
use MonologLogger;
use MonologHandlerStreamHandler;

$logger = new Logger('channel-name');
$logger->pushHandler(new StreamHandler(DIR.'/app.log', Logger::DEBUG));
$logger->info('This is a log! ^_^ ');
$logger->warning('This is a log warning! ^_^ ');
$logger->error('This is a log error! ^_^ ');
</php>

