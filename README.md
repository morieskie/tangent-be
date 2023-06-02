

## Postman collection

API documentation can be found on [https://documenter.getpostman.com/view/21595707/2s93sW8FCM](https://documenter.getpostman.com/view/21595707/2s93sW8FCM) 

## API Preview link

The preview for this api is hosted on EC2 on [https://3.88.191.199/api](https://3.88.191.199/api)

## Module structure

It follows a standard folder conventions by [Laravel 10.11.0](https://laravel.com/docs/10.11.0) and see example below: 

```
.
├── README.md
├── app
│   ├── Console
│   │   └── Kernel.php
│   ├── Exceptions
│   │   └── Handler.php
│   ├── Http
│   │   ├── Controllers
│   │   │   ├── BaseApiController.php
│   │   │   ├── Controller.php
│   │   │   ├── EmployeeController.php
│   │   │   ├── EmployeeSkillController.php
│   │   │   └── SkillController.php
│   │   ├── Kernel.php
│   │   ├── Middleware
│   │   │   ├── Authenticate.php
│   │   │   ├── EncryptCookies.php
│   │   │   ├── PreventRequestsDuringMaintenance.php
│   │   │   ├── RedirectIfAuthenticated.php
│   │   │   ├── TrimStrings.php
│   │   │   ├── TrustHosts.php
│   │   │   ├── TrustProxies.php
│   │   │   ├── ValidateSignature.php
│   │   │   └── VerifyCsrfToken.php
│   │   └── Requests
│   │       ├── StoreEmployeeRequest.php
│   │       ├── StoreEmployeeSkillRequest.php
│   │       ├── StoreSkillRequest.php
│   │       ├── UpdateEmployeeRequest.php
│   │       ├── UpdateEmployeeSkillRequest.php
│   │       └── UpdateSkillRequest.php
│   ├── Models
│   │   ├── Employee.php
│   │   ├── EmployeeSkill.php
│   │   ├── Skill.php
│   │   └── User.php
│   ├── Policies
│   │   ├── EmployeePolicy.php
│   │   ├── EmployeeSkillPolicy.php
│   │   └── SkillPolicy.php
│   ├── Providers
│   │   ├── AppServiceProvider.php
│   │   ├── AuthServiceProvider.php
│   │   ├── BroadcastServiceProvider.php
│   │   ├── EventServiceProvider.php
│   │   └── RouteServiceProvider.php
│   └── Repositories
│       ├── EmployeeRepository.php
│       ├── EmployeeSkillRepository.php
│       └── SkillRepository.php
├── artisan
├── bootstrap
│   ├── app.php
│   └── cache
│       ├── packages.php
│       └── services.php
├── composer.json
├── composer.lock
├── config
│   ├── app.php
│   ├── auth.php
│   ├── broadcasting.php
│   ├── cache.php
│   ├── cors.php
│   ├── database.php
│   ├── filesystems.php
│   ├── hashing.php
│   ├── logging.php
│   ├── mail.php
│   ├── queue.php
│   ├── sanctum.php
│   ├── services.php
│   ├── session.php
│   └── view.php
├── database
│   ├── factories
│   │   ├── EmployeeFactory.php
│   │   ├── EmployeeSkillFactory.php
│   │   ├── SkillFactory.php
│   │   └── UserFactory.php
│   ├── migrations
│   │   ├── 2014_10_12_000000_create_users_table.php
│   │   ├── 2014_10_12_100000_create_password_reset_tokens_table.php
│   │   ├── 2019_08_19_000000_create_failed_jobs_table.php
│   │   ├── 2019_12_14_000001_create_personal_access_tokens_table.php
│   │   ├── 2023_05_22_105636_create_employees_table.php
│   │   ├── 2023_05_23_085202_create_skills_table.php
│   │   └── 2023_05_23_231123_create_employee_skills_table.php
│   └── seeders
│       ├── DatabaseSeeder.php
│       ├── EmployeeSeeder.php
│       ├── EmployeeSkillSeeder.php
│       └── SkillSeeder.php
├── docker-compose.yml
├── package.json
├── phpunit.xml
├── public
│   ├── favicon.ico
│   ├── index.php
│   └── robots.txt
├── resources
│   ├── css
│   │   └── app.css
│   ├── js
│   │   ├── app.js
│   │   └── bootstrap.js
│   └── views
│       └── welcome.blade.php
├── routes
│   ├── api.php
│   ├── channels.php
│   ├── console.php
│   └── web.php
└── vite.config.js

```

# Environment requirements

- PHP 8
- MySQL
- Composer

## PHP Requirements

- PHP >= 7.1.3
- BCMath PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

## Environment Configuration

At the root of this project there's a sample env config `.env.example` should be renamed `.env` and 
then update variable to match you environment settings

## To get dependency 

Simply run `composer install` on the root of the project to retrieve all required dependencies

## To run the app

Run `docker compose up -d` and your dev server should be running on `http://127.0.0.1` this is the url you will on your
client side to consume this api i.e base url to set  `http://127.0.0.1/api`
