# WP-DB Abstraction

This project is intended to be used as a layer between the database and the logic of the webpage or application created using WordPress.  

The intention is that all the base database entities should be represented by models, models which can be acquired via repositories, instead of direct queries.
The base classes in the project will allow for usage of the WordPress database classes or direct PDO access to both show how simple it can be implemented through the repository pattern
and to let you start your project without having to create it all yourself.
