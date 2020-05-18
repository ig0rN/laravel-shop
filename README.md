# Shop example

## Description

Basic shop example created using Laravel framework

Specification:
 - The product has a code (unique combination of letters and numbers entered by the user), name, description, price and picture.
 - Each product has one category to which it belongs. The category has only a name.
 - There are 2 types of users in the database,  admin and worker. Both types have all the permissions, except for displaying and adding shop( list item 5).
 - The shop sells its products several times a year. When selling, it reduces the prices of those products that participate in the sale. The sale has its date to last. After the expiration of the date, the price of the product is returned to its original one value.
 - The owner of the app decided to sell the app to another shop, so I created a table which kept records of all stores (each store has only a name). I made a page to add and view all stores, which will only be visible to the admin user.
 - All shops have a common database, which means that the same database saves categories, products and sales for all shops. One shop may not make CRUD operations for the categories / products / sales of the other shop.
 - Whenever a user makes CUD operations I record who and when made it and display it for R operation. 
 - In all tables I use SoftDelete behavior that Laravel offers and I display only records that haven’t been deleted by SoftDelete.
 - I use MySql database and I enter data only with a database seeder.

## Installation guide & useful informations:

 1. Clone repository</br>
 2. Create database</br>
 3. Configure .env file for DB</br>
 4. Open up CMD and go to root folder</br>
 5. Run command "composer update"</br>
 6. Run command "php artisan migrate:fresh --seed"</br>
 7. You can look up in UsersTableSeeder for user login credentials</br>
 8. The page that shows products on sale is the page that you use to edit sale
