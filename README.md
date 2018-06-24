# WP-DB Abstraction

**Observe** This project is currently in development and have no release yet. It is not usable in the way that it is intended to 
be used when ready.  
Feel free to contribute or wait for a v1.0.0 release.

This project is intended to be used as a layer between the database and the logic of the webpage or application created using WordPress.  

The intention is that all the base database entities should be represented by models, models which can be acquired via repositories, instead of direct queries.
The base classes in the project will allow for usage of the WordPress database classes or direct PDO access to both show how simple it can be implemented through the repository pattern
and to let you start your project without having to create it all yourself.

As some might notice, the model/entity classes are quite similar to how the `Doctrine` ORM/DBAL works. It uses the same type of annotations
as you would with doctrine if using the annotations to declare the fields and tables.  
This is very much intentional, I even use the Doctrine annotation package for the annotations themselves.  
The reason to this is to introduce the concept of Doctrine, a ORM/DBAL that I love, to others, making it easier for them to move
over to a framework in which the `Model View Controller` or similar pattern is used.

I intend to implement other mapping types similar to the other doctrine mappings, such as YML based and class based, but that is in 
future releases.

## Models

The models, or entities, are classes which represents a single database entry.  
A model extends the `AbstractModel` class, which gives it a few methods and traits that enables it to integrate with the 
projects underlying classes.  
Further more, to allow the model to be able to interact correctly with the database a few annotations are available to use:

* `Model`
* `Field`

The `Model` annotation is required on a model class, it marks the class as a entity and exposes the database table used by the model through a annotation variable:

```php
<?php
use Jitesoft\WordPress\DBAL\Annotations\Model;
use Jitesoft\WordPress\DBAL\Models\AbstractModel;

/**
 * @Model(table="my_database_table")
 */
class MyModel extends AbstractModel {
}
```

The model also have to expose fields to the database handler, each field should be marked to be exposed but they do not have to be public.  
Thanks to the use of reflection, the project can access any type of variables in the model, hence it's important that the fields to be
exported are correctly annotated.

The annotation for fields is simply `Field`. It exposes two variables: `name`, `hidden`, in which the first is a mapping to the database field name
and the second marks the field hidden to the json_encode method.

```php
<?php
use Jitesoft\WordPress\DBAL\Annotations\Model;
use Jitesoft\WordPress\DBAL\Models\AbstractModel;
use Jitesoft\WordPress\DBAL\Annotations\Field;
/**
 * @Model(table="my_database_table")
 */
class MyModel extends AbstractModel {
  
  /** @var int
   *  @Field(name="my_database_id_field")
   */
  private $id;

  /**
   * @var string
   * @Field(name="my_hidden_field", hidden=true)
   */
  private $secret;
}
```

All models will inherit the `JsonSerialize` interface from the  `AbstractModel`, by default, this method will fetch each of the none-hidden properties and return a json object with the values.
