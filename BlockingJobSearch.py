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
# check how many jobs are there in user account
print("number of jobs are" , len(jobs))
# search ids of the jobs
print ("\nSearch IDs:\n   " + "\n   ".join([job.sid for job in jobs]))


# Run a blocking search--search everything, return 1st 100 events
kwargs_blockingsearch = {"exec_mode": "blocking"}
searchquery_blocking = "search * | head 100"

print("Wait for the search to finish...")

# A blocking search returns the job's SID when the search is done
job = jobs.create(searchquery_blocking, **kwargs_blockingsearch)
print("...done!\n")

# Get properties of the job
print("Search job properties")
print ("Search job ID:        ", job["sid"])
print("The number of events: ", job["eventCount"])
print ("The number of results:", job["resultCount"])
print ("Search duration:      ", job["runDuration"], "seconds")
print ("This job expires in:  ", job["ttl"], "seconds")

# Print installed apps to the console to verify login
print("splunk application names/n")
for app in service.apps:
    print(app.name)
