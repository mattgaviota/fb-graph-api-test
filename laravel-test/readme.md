# Facebook API Graph test

Simple endpoint to retrieve a Facebook public user profile by id made
with [Laravel Framework](https://laravel.com/).

## Requisites

In order to try this application you need install [composer](https://getcomposer.org/)
and you need the Facebook API Token from a [Facebook App](https://developers.facebook.com)
configured in the `.env file`.

## Install the Application

Clone the repository

    git clone git@github.com:mattgaviota/fb-graph-api-test.git

Enter to the directory of the app

    cd fb-graph-api-test/laravel-test

To run the application in development, you need install the dependencies.

    composer install

After installing this, you may need to configure some permissions. Directories
within the  `storage` and the `bootstrap/cache` directories should be writable
by your web server or Laravel will not run.

Run this command to start a local server

    composer start

Run this command to run the test suite

    composer test

You can test the endpoint `http://localhost:8080/api/profile/facebook/{id}`

## Using docker

You can try the application using docker. The steps are the same as above except
instead of using `composer start` you can use

    docker-compose up -d

and then testing the endpoint.
