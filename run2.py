import requests
import json
import numpy as np
from pandas.io.json import json_normalize
import pandas as pd
import json as json

auth_endpoint = "https://auth.emsicloud.com/connect/token" # auth endpoint

client_id = "4k6sdq7k0dnapei8" # replace 'your_client_id' with your client id from your api invite email
client_secret = "RpVATwtI" # replace 'your_client_secret' with your client secret from your api invite email
scope = "emsi_open" # ok to leave as is, this is the scope we will used

payload = "client_id=" + client_id + "&client_secret=" + client_secret + "&grant_type=client_credentials&scope=" + scope # set credentials and scope
headers = {'content-type': 'application/x-www-form-urlencoded'} # headers for the response
access_token = json.loads((requests.request("POST", auth_endpoint, data=payload, headers=headers)).text)['access_token'] # grabs request's text and loads as JSON, then pulls the access token from that
print
def extract_skills_list():
    all_skills_endpoint = "https://emsiservices.com/skills/versions/latest/skills" # List of all skills endpoint
    auth = "Authorization: Bearer " + access_token # Auth string including access token from above
    headers = {'authorization': auth} # headers
    response = requests.request("GET", all_skills_endpoint, headers=headers) # response
    response = response.json()['data'] # the data

    # Extracting only "id" and "name" fields
    extracted_data = [{"id": item["id"], "name": item["name"]} for item in response]

    # Creating a dictionary to represent the extracted data
    data_to_write = {'data': extracted_data}

    # Writing the data to a JSON file
    with open('output.json', 'w') as json_file:
        json.dump(data_to_write, json_file, indent=2)

extract_skills_list()