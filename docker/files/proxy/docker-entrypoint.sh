#!/bin/bash
# @auther <1822581649@qq.com>

echo "info: nginx non-daemon startup"
nginx -c /etc/nginx/nginx.conf
tail -f /dev/null