Bank API
==============================

This project contains the API for the sample Bank. It only have implemented the charge add and charges list retrieve.

Requirements
------------

In order to run this application correctly, you need to activate this extensions in your php.ini file:

 * pdo-sqlite
 * mbstring
 * intl

Installation
------------

I publish the file composer.lock, so it's not necesary to run a "composer update", a "composer install" is recomended,
because you will download the same version of the dependencies that I have used in devepolment.

* composer update //will recreate the file composer.lock

* composer install //will install the dependencies noted in the file composer.lock

Running the web application
---------

* Simply open a command prompt and type composer serve.
* Now you can make request to the API

Security
---------

It have been created two adapter for authorization, but the HTTP basic authorization is enabled. If you wish to use Oauth2 authorization simply enter the dashboard and change it (it's also configured).

Aditional configuration
---------

At this moment CORS is configured to allow request from all sites.  If you want to filter this request modify the zfr_cors.global.php file in the config/autoload directory.

Documentation
------------

Api documentation can be found at

*  http://localhost:8080/apigility/swagger

Tests
------------

I've used TDD, BDD and PHPUnit in order to test this project.

To launch TDD generated test and PHPUnit test, launch: composer test.

To launch the BDD test launch from the root directory: composer testBDD.

Dev/Prod environmet
------------
Apigility allows to have a dev and prod environment.

To enable the development environment, type **development-enable**.
To enable the production environment, type **development-disable**.

Future enchancements
---------
Add more verbs to the charge endpoint, so users can delete charges and update them.

