# Facebook API Graph test

Simple endpoint to retrieve a Facebook public user profile by id made
with [Slim Framework](https://www.slimframework.com/).

## Install the Application

Clone the repository

    git clone git@github.com:mattgaviota/fb-graph-api-test.git

Enter to the directory of the app

    cd fb-graph-api-test/slim-test

To run the application in development, you need install the dependencies.

    composer install

Run this command to start a local server

    composer start

Run this command to run the test suite

    composer test

You can test the endpoint `http://localhost:8080/profile/facebook/{id}`

## Using docker

You can try the application using docker. The steps are the same as above except
instead of using `composer start` you can use

    docker-compose up -d

and then testing the endpoint.
