import splunklib.results as results

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

# Run an export search and display the results using the results reader.

kwargs_export = {"earliest_time": "-1h",
                 "latest_time": "now",
                 "search_mode": "normal"}
searchquery_export = 'search sourcetype=cp-firewall | top 10 qos_ip_address | table qos_ip_address count'

exportsearch_results = service.jobs.export(searchquery_export, **kwargs_export)

# Get the results and display them using the ResultsReader
reader = results.ResultsReader(exportsearch_results)
for result in reader:
    if isinstance(result, dict):
        print("Result: %s" % result)
    elif isinstance(result, results.Message):
        # Diagnostic messages may be returned in the results
        print ("Message: %s" % result)

# Print whether results are a preview from a running search
print("is_preview = %s " % reader.is_preview)
