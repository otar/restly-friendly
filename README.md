# Setup Guide

Assuming you already have PHP, Apache/Nginx and Neo4j installed, do the following:

* Clone the repository locally using Git
* Go to the project directory: `cd path/to/project`
* Point server directory to the `public/` directory if necessary.
* Import data into the Neo4j, source: https://raw.githubusercontent.com/otar/rest-api-friendships/master/test-data.cypher
* Install dependencies: `composer install`
* Copy `app/Config.example.php` to `app/Config.php` and set configuration options.
* Run tests: `URL=http://localhost/restly-friendly/public/index.php vendor/bin/phpunit tests/`

# Endpoints

Please refer to this page for the API endpoint specifications: https://github.com/otar/rest-api-friendships/blob/master/README.md#service-endpoints
