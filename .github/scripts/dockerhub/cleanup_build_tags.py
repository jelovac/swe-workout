#!/usr/bin/env python3

import requests
import argparse
from datetime import datetime

parser = argparse.ArgumentParser("Build Tags Cleanup Script")

parser.add_argument("dockerhub_organisation", help="DockerHub Organisation Name", type=str)
parser.add_argument("dockerhub_repository", help="DockerHub Repository Name", type=str)
parser.add_argument("dockerhub_access_token", help="DockerHub JWT Access Token", type=str)

args = parser.parse_args()

dockerhub_api_v2_url:str = "https://hub.docker.com/v2"
dockerhub_organisation:str = args.dockerhub_organisation
dockerhub_repository:str = args.dockerhub_repository
dockerhub_access_token:str = args.dockerhub_access_token

dockerhub_tags_collection_iri = f"{dockerhub_api_v2_url}/repositories/{dockerhub_organisation}/{dockerhub_repository}/tags"
next_page_url:str|None = dockerhub_tags_collection_iri

while (next_page_url != None):

    get_tags_response = requests.get(
        url=next_page_url,
        headers={
            'Content-Type': 'application/json',
            'Authorization': f'JWT {dockerhub_access_token}'
        }
    )

    if get_tags_response.status_code != 200:
        raise SystemExit("An error has occured while trying to contact DockerHub API in order to retrieve tags!")
    
    get_tags_response_data = get_tags_response.json()

    if ('results' not in get_tags_response_data):
        raise SystemExit("Invalid result obtained from DockerHub API while trying to retrieve tags!")
    
    for tag in get_tags_response_data['results']:
        tag_name:str = tag['name']
        tag_last_pushed:str|None = tag['tag_last_pushed']

        if(
            tag_last_pushed is not None 
            and tag_name.startswith('build_')
        ):
            last_pushed_ts = datetime.strptime(tag_last_pushed, '%Y-%m-%dT%H:%M:%S.%fZ')
            current_ts = datetime.now()
            diff = (current_ts - last_pushed_ts).days  
    
            if diff > 7:
                print(f"Deleting tag: {tag_name}")
                tag_delete_request_response = requests.delete(
                    url=f"{dockerhub_api_v2_url}/repositories/{dockerhub_organisation}/{dockerhub_repository}/tags/{tag_name}",
                    headers={
                        'Authorization': f'JWT {dockerhub_access_token}'
                    }
                )

                if(
                    tag_delete_request_response.status_code == 202 
                    or tag_delete_request_response.status_code == 204
                    or tag_delete_request_response.status_code == 200
                ):
                    print(f"Delete request accepted by DockerHub API for tag `{tag_name}`.")
                else:
                    raise SystemExit(f"Could not delete tag: {tag_name}")

            else:
                print(f"Skipping tag: {tag_name} (less than 7 days old)")

    next_page_url = get_tags_response_data['next']
