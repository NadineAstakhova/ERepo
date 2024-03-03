## Approach

The core logic is contained in the directory <code>\src</code>.

The main purpose of this implementation is to show the scalability of the code. That is why the architecture approach DDD was used. <br/>
I highlighted two main domain models according to the task: Team, Employee, Counter, Employee step Counter.

This approach gives us the opportunity to change the DB and communication between services.

About "parallel using" - PHP as a language is thread safe itself. So for the solution of the task I decided to use persistent layer to show how it could be done 
for a realistic situation. Yes, I can use multi-threading with pthreads and usual objects, however it isn't suitable for our task. As an engineer, I cannot recommend you to use pthread for developing REST API. 
For example, you can read this article https://www.sitepoint.com/parallel-programming-pthreads-php-fundamentals/ to understand why. The task itself is better for Java.
But in the standard project life the problematic situation with parallel using of data could be happened. 
Imagine, we have more than one pod of our application but only one DB. For such case we can use transactions: the realisation is <code>src/Infrastructure/Repositories/EmployeeCounterRepository.php</code>

## Answers

1. Persistence: I suggest to use DB. Here I used MySQL. Perhaps, using PostgreSQL will be better in the situation of a lot of employees and a lot of requests to
report links from <code>src/Application/Http/Controllers/TeamCounterController.php</code> Because via PostgreSQL we can create Materialized Views for such data.
2. Fault tolerance: Making microservices - incrementing counters microservices; crud for counters; crud for teams; crud for employees; service for reporting links. 
Also, we can separate db to read and write instance. 
3. Scalability: a) Create rules for autoscaling of pods, load balancer. We can separate db to read and write instance and use PostgreSQL with Materialized View. 
b) yes, to PostgreSQL.
4. Authentication: a) I use Laravel, so it is easy. Add users table with roles and middleware to Laravel.  b_ It is about roles of users. 

Documentation is http://127.0.0.1/api/documentation.

Postman collection EfficyTask.postman_collection.json

## Installation

For working with an app I used Docker and Sail.

### Using Docker and Sail

I'm using Windows, so these steps work for Windows. If you use Linux, the installation may be different.

1. Be sure, that you have Docker Desktop and Ubuntu-20.04 like a distro.
   If no, install via Terminal <code>wsl --install -d Ubuntu-20.04</code> and set as default <code>wsl --set-default Ubuntu-20.04</code>.

2. Run sail up Artisan command, which will start the docker container <code>bash ./vendor/laravel/sail/bin/sail up</code>

Common approach is https://medium.com/@mbilalnaeem/how-to-dockerize-laravel-using-laravel-sail-with-docker-desktop-wsl-2-backend-in-windows-e7033e28e1d

### Usual local installation

Be sure that you have installed PHP 8.3, MySQL 8.0, Composer and your favorite local server.

1. Clone the project.
2. At the directory of the project use the console command <code>composer install</code>
3. Create .env and copy data from .env.example
4. Execute <code>php artisan key:generate</code>
5. Create a db and at local .env change configuration of the database to yours:<code>DB_HOST etc</code>
6. Execute <code>php artisan migrate</code>
7. If you want, you can execute <code>php artisan db:seed</code> for testing data
8. Perfect! You can access to the salary report via any of API routes


## Notes

- The default Laravel application creation contains some unnecessary configurations, files, I let myself not delete them and waste my time doing it. 
- More abstractions could be added, but for the technical task, I think that's enough
