from locust import HttpLocust, TaskSet

def index(l):
    l.client.get("/")

def stress(l):
    l.client.get("/api/stress")

class UserBehavior(TaskSet):
    tasks = {index: 2, stress: 1}

class WebsiteUser(HttpLocust):
    task_set = UserBehavior
    min_wait = 5000
    max_wait = 9000