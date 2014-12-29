import splunklib.results as results
from time import sleep
import sys
import splunklib.client as client

HOST = "192.168.10.15"
PORT = 8089
USERNAME = "admin"
PASSWORD = "q1w2e3"

# Create a Service instance and log in 
service = client.connect(
    host=HOST,
    port=PORT,
    username=USERNAME,
    password=PASSWORD)

jobs = service.jobs


# Run a one-shot search and display the results using the results reader

# Set the parameters for the search:
# - Search everything in a 24-hour time range starting June 19, 12:00pm
# - Display the first 10 results
kwargs_oneshot = {"earliest_time": "2014-12-28T12:00:00.000-07:00",
                  "latest_time": "2014-12-29T12:00:00.000-07:00"}
searchquery_oneshot = 'search sourcetype=cp-firewall | top 10 qos_ip_address | table qos_ip_address count'

oneshotsearch_results = service.jobs.oneshot(searchquery_oneshot, **kwargs_oneshot)

# Get the results and display them using the ResultsReader
reader = results.ResultsReader(oneshotsearch_results)
for item in reader:
    print(item)
