from locust import HttpLocust, TaskSet

def login(l):
    l.client.post("/admin/auth/login", {"username":"admin", "password":"education"})

def logout(l):
    l.client.get("/admin/auth/logout")

def index(l):
    l.client.get("/admin")

def users(l):
    l.client.get("/admin/auth/users")

def roles(l):
    l.client.get("/admin/auth/roles")

def logs(l):
    l.client.get("/admin/auth/logs")

def sleep(l): 
    l.client.get('/api/sleep/5'); 

class UserBehavior(TaskSet):
    tasks = {index: 1, users: 2, roles: 1, logs:2, sleep:1}

    def on_start(self):
        login(self)

    def on_stop(self):
        logout(self)

class WebsiteUser(HttpLocust):
    task_set = UserBehavior
    min_wait = 3000
    max_wait = 9000