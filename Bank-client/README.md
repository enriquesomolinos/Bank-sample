Bank Client
==============================

This project contains the client that consumes the bank Api. It's programed with backbone.

Requirements
------------

In order to run this application correctly, you need to follow this steps:

 * Install nodejs
 * Launch **npm install -g bower** to install the bower dependency resolver.
 * Launch **npm install -g grunt-cli** to install the grunt client.
 * Lauch **npm install** to install the dependencies that are contained in the package.json.
 * Lauch **bower install** to install the dependencies that are contained in the bower.json.


Running the web application
---------

Start the server at por 8081 running **grunt devserver**.
Open your web browser and type **http://loalchost:8081**

Generate production package
---------

In development mode js files are splitted to allow debug the application.

So, if you want to generate an unique obfuscated js file you need to execute the grunt task called distPro typind **grunt distPro**

Future enchancements
---------
Implement a login page to use the Oauth2 server implemented in the server.

