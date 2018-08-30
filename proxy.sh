#!/bin/bash

# определяем указанный host proxy-сервера
# указываем ip-адрес, на который нужно заменить указанный хост
PROXY_HOST=$(echo $http_proxy | sed -e "s/[^/]*\/\/\([^@]*@\)\?\([^:/]*\).*/\2/")
PROXY_IP=$(traceroute -n proxy.pbank.com.ua | awk -F '[()]' '{ print $2 }')

export HTTP_PROXY=$(echo $http_proxy | sed "s/${PROXY_HOST}/${PROXY_IP}/g")
