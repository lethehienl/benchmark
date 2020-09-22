#!/usr/bin/env bash
#http://www.jvl-services.com/content/drupal-8/installation-drupal-8-ubuntu-14041-lts-apache2-php-mysql-and-phpmyadmin
if ! [ -L /var/www ]; then
  rm -rf /var/www
  ln -fs /vagrant /var/www
fi

