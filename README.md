## About

  The application reads current temperature of two configured cities. Cities are configured at Config/town.php with location details of each city.
  It uses https://openweathermap.org/api/one-call-api#data API to get the temperature of each city.
  Users can register in the application, then it logs the temperature of cities and display the saved records of temperature as per the user.
  
## Requirements

  	- Laravel 8
  	- Sqlite
  	- vue.js
  	- https://openweathermap.org/api/one-call-api - Access to one API

## Installation
  
  - Clone the repository in to local environemnt

        git clone git@github.com:anupamacng/TemperatureLogger.git

  - create file in storage/database.sqlite - Provide the permission
  - Copy .env.example and rename to .env
  - Change the environment variables as required

  - Install/ Update composer 

        composer update
 
  - Run the migrations

        php artisan migrate
  
        npm install
        npm run development
  
  - run php artisan serve to run your application
  - Then access the URL via browser


## Implementation 

- You can change the cities and in config/town.php file. Update the location details interms of lattitude and logitude if required.
- API paramters can be changed at config/weatherapi.php
- Temperature data is updated to the table at AuthenticatedSessionController, 
- API provider implemented in Factory pattern
- Laravel Breeze, used Authentications.
- Front end used Vue.js with Insertia
- 