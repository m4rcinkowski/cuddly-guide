# REST API example

Simple REST API with an endpoint to add a product with input validation.  
Contains several cool design patterns.

Uses Symfony 4.4 (latest LTS release as of November 2020).

## Usage

1. Set up the environment by running:  
    ```
    docker-compose up
    ```
1. Send a `POST` request to `http://localhost:8080/products` endpoint with a body like below:
   ```json
   {
       "name": "chrupki kukurydziane",
       "price": 1.69
   }
   ```
