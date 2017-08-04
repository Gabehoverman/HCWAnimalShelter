# README #

This README would normally document whatever steps are necessary to get your application up and running.

### What is this repository for? ###

* Web Application for the Huntington Cabell-Wayne Animal Shelter
* Version
* [Learn Markdown](https://bitbucket.org/tutorials/markdowndemo)

### How do I get set up? ###

* Clone the repository
* Install MySQL and create a local database for development
* Create a file called .env in the project root directory.  Use the template provided in .env.example to set the environment variables for your development environment
* Open a terminal window in the project directory.  Run "php artisan migrate".  This will create the schema in your local database.
* Run "php artisan db:seed".  This will seed data in the animal_types and states tables.  It will also create a user with the password specified in the environment variable ADMIN_PASSWORD
* Run "php artisan serve".  This will start a local development server which you can use to test the project

### Miscellaneous notes ###

The "app/" directory is namespaced as "HCWS" and "HCWS" can be used as an alias for the app directory

### Accounts and Credentials ###
Heroku and Cloudinary account info:
hcw.animal.shelter.website@gmail.com
Password reminder: Small Kitty 1

Database hosting is currently being done by www.freesqldatabase.com

### Who do I talk to? ###

* Repo owner or admin
* Other community or team contact