## Wish list API 

This project is a simple API for CRUD functionalities for a Wish list web application. This API is used in a web application to display all the wishes [https://github.com/ebytreesa/wishlist-ui](wihlist-ui)

## Endpoints
GET : api/wishes : returns a json with array of wishes
POST : api/wishes : create a new wish. Request should have a json body with title,description and link. 
PUT : api/wishes/{wihs_id} : update an existing wish. Request should have a json body with title,description and link. 
DELETE : api/wishes/{wish_id} : delete an existing wish.

## Starting the API
```
php artisan serve

```
API is setup to use a database `tinx`. 

## Technologies
Project is created with:
* Laravel: 8.0
* MySQL and PhpMyAdmin