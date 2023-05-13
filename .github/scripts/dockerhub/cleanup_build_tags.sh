#!/bin/bash

DOCKERHUB_REPOSITORY=$1
DOCKERHUB_ORGANISATION=$2
DOCKERHUB_ACCESS_TOKEN=$3

delete_image_tag() {
  local tag_name=$1
  curl \
    -X DELETE \
    -H "Authorization: JWT ${DOCKERHUB_ACCESS_TOKEN}" \
    "https://hub.docker.com/v2/repositories/${DOCKERHUB_ORGANISATION}/${DOCKERHUB_REPOSITORY}/tags/${tag_name}"
}

process_page() {
  local page="$1"

  for result in $(echo "$page" | jq -c '.results[]'); do
    local last_pushed=$(echo "$result" | jq -r '.tag_last_pushed')
    local tag_name=$(echo "$result" | jq -r '.name')

    if [[ "$last_pushed" != "null" && "$tag_name" == build_* ]]; then
      local last_pushed_ts=$(date -d "$last_pushed" +%s)
      local current_ts=$(date +%s)
      local diff=$(((current_ts - last_pushed_ts) / (24 * 60 * 60)))

      if [ "$diff" -gt 7 ]; then
        echo "Deleting tag: $tag_name"
        delete_image_tag "$tag_name"
      else
        echo "Skipping tag: $tag_name (less than 7 days old)"
      fi
    fi
  done
}

url="https://hub.docker.com/v2/repositories/${DOCKERHUB_ORGANISATION}/${DOCKERHUB_REPOSITORY}/tags"
next_url="$url"

while [ "$next_url" != "null" ]; do
  response=$(
    curl \
      -H "Authorization: JWT ${DOCKERHUB_ACCESS_TOKEN}" \
      -H "Accept: application/json" \
      "$next_url"
  )

  results=$(echo "$response" | jq -c '.results[]')
  next_url=$(echo "$response" | jq -r '.next')

  process_page "$results"
done
