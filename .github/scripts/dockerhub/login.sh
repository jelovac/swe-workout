#!/bin/bash

username=$1
password=$2

if [[ -z $username || -z $password ]]; then
  echo "Invalid input arguments. Please provide: login.sh {username} {password}"
  exit 1
fi

response=$(curl --location --request POST 'https://hub.docker.com/v2/users/login' \
  --header 'Content-Type: application/json' \
  --header 'Accept: application/json' \
  --data-raw "{\"username\": \"$username\", \"password\": \"$password\"}")

token=$(echo "$response" | jq -r '.token')

echo "$token"
