# PHP-Auth-System
----------------------
* A log-in authentication system in PHP.

* To learn and understand how all the readymade login registration systems work, I have created this log-in Authentication system in PHP.

* I've used vanilla PHP which allows me to understand the LARAVEL concepts of routes and MVC architechture and how he handles the flow internally.

* I've followed an MVC architechture with all the request redirect to 'public/index.php' by the use of rules defined in .htaccess.

* The requests then goes to controller, models and views resprectively.

* I've used PDO (PHP Data Objects) to access the database. It increases the system security and is an advance way of handling databases than MySQl or MySQLi.

* jQuery validator is used for the fron end validation and Regex matching using preg_match is used for backend validation.

* Sweetalert2 is used for the pop-up messages.

* Functions are tested using PHP Unit testing.

* Sass is used for CSS and gulp to compile CSS and minify JS files.

* PHPmailer is used to send mails.

* Passwords are hashed and stored using Md5 hashing algorithm.

* **Below is the folder structure of the project**
```
.
├── gulpfile.js
├── composer.json
├── package.json
├── public
│   ├── assets\         ( contains all the production CSS and JS files )
│   ├── controllers\    ( business logic for each route goes here, seperate classes for each CRUD )
│   ├── includes\       ( additional helper classes goes here )
│   ├── models\         ( database logics(insert,update,select....) goes here )
│   ├── views\          ( display logic goes here)
│   └── index.php       ( index.php, autoloading and routing scripts goes here )
├── README.md
├── tests\              ( unit test cases goes here )
└── resources
    ├── logs\           ( mail logs, server error logs, system error logs goes here )
    └── assets\         ( contains all the development CSS and JS files )
```