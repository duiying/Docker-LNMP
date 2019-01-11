#!/bin/bash
# @auther <gengxiankun@126.com>

echo "info: starting php-fpm.."
/usr/sbin/php-fpm -c /etc/php.ini -y /etc/php-fpm.conf
tail -f /dev/null