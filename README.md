# ntua_dblab_lamp_demo
A LAMP stack boilerplate code for the 6th semester course of Introduction to Database Systems 2022. 


# Prerequisites 
1) A running mysql server installed and know its credentials
2) A running HTTP server preferably Apache

# Setup 
1) Import the world_x database from [world_x.sql](./sample_data/world.sql) using your prefered client ( MySQL CLI , Terminal, MySQL Workbench, PhpMyAdmin) 
2) Configure your database credentials in the [database.php](./objects/database.php) connector script.
3) Place this repository as a whole in your HTTP server's root directory and keep its name intact: ntua_dblab_lamp_demo
    3-1) Apache's root web directory on linux hosts can be found at /var/www/html/ 
    3-2) Apache's root web directory on windows hosts can be found at C:/Apache24/htdocs
    3-3) Apache's root web directory on windows hosts ( XAMPP ) can be found at C:/xampp/htdocs
    3-3) Apache's root web directory on OSX hosts can be found at \<Disk Letter\>/Library/WebServer/Documents


4) Using your web browser navigate to
http://localhost/ntua_dblab_lamp_demo
This by default serves the index.php file


# Demonstration

Start by checking the database's health and carefully read:
[database.php](./objects/database.php) 
[health.php](./objects/health.php) 

After you can experiment and call the different API's by navigating to 
[http://localhost/ntua_dblab_lamp_demo/api/readAllCities.php](http://localhost/ntua_dblab_lamp_demo/api/readAllCities.php) 
[http://localhost/ntua_dblab_lamp_demo/api/readAllCountries.php](http://localhost/ntua_dblab_lamp_demo/api/readAllCountries.php) 
[http://localhost/ntua_dblab_lamp_demo/api/readCitiesOfCountryCode.php?country_code=GRC](http://localhost/ntua_dblab_lamp_demo/api/readCitiesOfCountryCode.php?country_code=GRC) 
or by giving a non-existent URL parameter
[http://localhost/ntua_dblab_lamp_demo/api/readCitiesOfCountryCode.php?country_code=42](http://localhost/ntua_dblab_lamp_demo/api/readCitiesOfCountryCode.php?country_code=42) 

All the above API's are accessed through the GET HTTP method which means they can be requested by the browser. POST requests are also very popular more secure and more scalable but cannot be issued by the browser. You can modify the above endpoints (API's) to work with the POST HTTP method as an exercise if you want and test them using a tool like [postman](https://www.postman.com/). 

# Questions

For any further questions you can ask me or any other lab volunteer  through our Discord server







