

# Object-Oriented PHP Documentation
## Introduction
## Object Oriented Programming

OOP is a programming style in which we group methods and variables of a
particular topic into single class. For example, the code that relate users
will be in User class. OOP is heavily adopted because it support code
organization, provides modularity and reduces the need to repeat ourselves. 

- Encapsulation is the bundling of data (attributes) and methods (functions) that operate on the data within a single unit (class).
- Inheritance: A class can inherit from another class and take advantage of the
  methods and properties defined by the superclass.
- Polymorphism: Similar objects can respond to the same messages (method) in
  different ways. 
- Composition: an object is built from other objects. embedding classes in
  other classes. (has a)

## Classes

Classes are used to group the code that handles a certain topic into one place.
It is a template for creating objects, providing initial values for state
(properties/attributes) and implementations of behavior methods.
```php
class YouCodeMember {
    // Properties/Attributes
    // Public property
    public $name;

    // Protected property
    protected $age;

    // Private property
    private $role;

    // Method to display member information
    public function displayInfo() {
        return "Name: {$this->name}, Age: {$this->age}, Role: {$this->role}";
    }
}
```
[See cheatsheet](./src/class.php)

* Constructors are called automatically when an object is created, ensuring that properties are initialized as soon as the object comes into existence.
* A class can have only one constructor.
* Overloading (multiple constructors with different parameter lists) isn't supported directly in PHP. However, default parameter values or conditional logic inside the constructor can achieve similar effects.
```` php 

    // Constructor method
    public function __construct($name, $age, $role) {
        $this->name = $name;
        $this->age = $age;
        $this->role = $role;
    }
 
````
*  __destruct function is a special method within a class that gets called automatically when an object is no longer in use or when all references to it are deleted.
```` php 
    public function __destruct() {
        echo "Object destroyed.";
    } 
````
* __get() magic method is used to intercept attempts to access inaccessible or non-existent properties of an object. It's triggered when code tries to read a property that is not accessible or doesn’t exist within the object.
*  __set() method in PHP is a magic method that's invoked when you try to assign a value to an inaccessible or non-existent property within a class. It enables you to define custom logic to handle such property assignments.

```` php 
class DynamicProperties {
    private $data = [];

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function __get($name) {
        return $this->data[$name] ?? null;
    }
}

$obj = new DynamicProperties();

// Setting properties dynamically
$obj->name = "John";
$obj->age = 30;

// Accessing properties using magic method __get
echo $obj->name; // Outputs: "John"
echo $obj->age; // Outputs: 30
````

## Objects

A person can be seen as an object defined by two components: attributes (such
as eye color, age, height) and behaviors (such as walking, talking,
breathing). In its basic definition, an object is an entity that contains both
data and behavior.

* Attributes and Behaviors in the YouCodeMember Class
Attributes:

Name, Age, Role: These properties represent the attributes of a YouCodeMember object. Each member instance can have different values for these attributes, making each member unique.
Behaviors:

displayInfo(): This method represents a behavior of a YouCodeMember object. It displays the information (name, age, role) associated with a particular member.

In OOP, objects are the building blocks, they are instances of a some class. A
program that leverages OO style is basically a collection of objects. The
behavior of an object represents what the object can do and the data stored
within an object represents the state of the object.
```php

// Creating an object (instance) of the YouCodeMember class
$member1 = new YouCodeMember("Khalid oukha", 25, "Student");

// Accessing properties and calling methods of the object
echo $member1->displayInfo(); // Output: Name: khalid oukha, Age: 25, Role: Student

```

[See cheatsheet](./src/class.php)

## $this Keyword

`$this` keyword are used to interact with/refer to a class method or properties
from within the class. Among different uses of `$this` keyword, there is
chaining methods and properties. 

[See example](./src/chaining-with-this.php)

## Public, Private, and Protected Keywords

- We use `public` if we want the methods or properties to be accessed on public
  scope as well as within the class.
- We use `private` if we want the methods or properties to be accessed within
  the class only.
- We use `protected` if we want the methods or properties to be accessed within
  the class and class child.

## Access private properties

To access `private` properties from outside the class, we use publicly defined
setters and getters. Using private properties limit the possible interaction to
our private properties from public scope. This is useful when for example we
want to define a hook each time a method is called to get the model of the
object, such as save the request in a log. 
```php
    // Getters and setters for protected property $age
    public function getAge() {
        return $this->age;
    }

    public function setAge($newAge) {
        $this->age = $newAge;
    }

    // Getters and setters for private property $role
    public function getRole() {
        return $this->role;
    }

    public function setRole($newRole) {
        $this->role = $newRole;
    }

```

[See example](./src/access-private-props.php)


## Inheritance

Inheritance is central concept in OOP, they enable us to reduce code
duplications by creating a parent/master class with properties and method that
can be inherited by child classes. In php, and many other languages, we use `extends` keyword to inherit from another class.

```` php 

// Subclass StaffMember extending YouCodeMember
class StaffMember extends YouCodeMember {
    // Additional property specific to StaffMember
    private $department;

    // Constructor for StaffMember
    public function __construct($name, $age, $role, $department) {
        // Calling parent class constructor
        parent::__construct($name, $age, $role);
        $this->department = $department;
    }

    // Method specific to StaffMember
    public function getDepartment() {
        return $this->department;
    }

    // Overriding the displayInfo method from the parent class
    public function displayInfo() {
        return parent::displayInfo() . ", Department: {$this->department}";
    }
}

// Creating an object (instance) of the StaffMember class
$staffMember = new StaffMember("Alice Smith", 28, "Administrator", "HR");

// Accessing methods and properties
echo $staffMember->displayInfo(); // Output: Name: ismail, Age: 28, Role: Administrator, Department: coash
````

[See example](./src/inheritance.php)


## Abstract classes

Put simply, an abstract class is a class with at least one abstract method and
with a abstract keyword in front of it. They get used for multiple reasons:

1. When we want be commit to writing certain class methods, or when we are only sure of there names.
2. When we want child classes to define these methods.

Abstract classes cannot be instantiated, and whatever non-abstract class
derived from it must include actual implementations of all inherited abstract
methods and properties. 

[See example](./src/abstract-classess.php)

## Interfaces

An interface can be seen as an outline of what a particular object can do. They
are considered one of the main building blocks of the SOLID pattern. With
interfaces we can create code which specifies which methods a class must
implement, without having to define how these methods are implemented. 

A lot of people may find interface to be similar to abstract classes, or
doesn't know which one to choice, here a few notes on that:

Interfaces are contract, we "implement" them to provide code and behavior that
fit the description of the interface. In the other hand, Abstract Classes are
behavior, we "extend" them and add additional behaviors, sometimes we are
required to add specific behavior left that are left out by the class (methods
marked with "abstract").

Interface maybe used when multiple classes need to define the same methods.
However, abstract class might be appropriate when we need the share code
between subclasses

| Interface | Abstract Class |
|-----------|----------------|
| An interface cannot have concrete methods in it i.e. methods with definition. | An abstract class can have both abstract methods and concrete methods in it. |
| All methods declared in interface should be public | An abstract class can have public, private and protected etc methods. |
| Multiple interfaces can be implemented by one class. | One class can extend only one abstract class. |

[See example](./src/interface.php)

## Polymorphism

Put simply, Polymorphism is a principle that state that methods in different
classes doing similar things should have the same name. 

[See example](./src/polymorphism.php)

## Type hinting

Type hinting is used to specify the expected data type for an argument. It is
used for better code organization and improved error messages.

```php
// Class
function funName(ClassName $object) {  }
// Strings
function funName(string $arg) {  }
// Array
function funName(array $arg) {  }
// Boolean
function funName(bool $arg) {  }
// Integers
function funName(int $arg) {  }
// Floats
function funName(float $arg) {  }
```

To specify the output type of a function, we add after `(expected type)` `: int`

## Static methods and properties

Static methods and properties are those properties with `static` keyword
in front of them. They enable us to approach methods and properties of a class
without the need to first create an object out of the class. They are used
mainly as utilities. The following are the main use cases for them:

- As counters, to save the last value that has been assigned to them. For
  example, the method `add1ToCars()` adds 1 to the `$numberOfCars` property
  each time they are invoked.

- As utilities for the main classes. Utility methods can perform all kinds of
  tasks, such as: conversion between measurement systems (kilograms to pounds),
  data encryption, sanitation, and any other task that is not more than a
  service for the main classes. The example given below is of a static method
  with the name of redirect that redirects the user to the URL that we pass to
  it as an argument.

```php
class Utilis {
  static public function redirect($url) {
    header("Location: $url");
    exit;
  }
}

Utilis::redirect("http://www.phpthusiast.com");
```

## Traits

Traits are a mechanism for code reuse. A Trait is intended to reduce some
limitations of single inheritance by enabling a developer to reuse sets of
methods freely in several independent classes living in different class
hierarchies. 

A Trait is similar to a class, but only intended to group functionality in a
fine-grained and consistent way. It is not possible to instantiate a Trait on
its own.

Some people refer to traits as "like an automatic CTRL+C/CTRL+V for your
classes". You specificity some methods in a trait and "import" them into your
class. It will make your code behave like the methods were written inside your
class.

When using a trait, we should be on the lookout for code duplication and for
naming conflicts that are the result of calling the methods in different traits
with the same name. 

[See example](./src/traits.php)

## Namespaces and code integration

Namespaces and code integration are used when the project grow in complexity,
and we need to start organizating our code and integrate them from different
resources. Or when we have multiple class or methods with the same name.
* Syntax for Declaring a Namespace:
````php
namespace Youcode; 

````
* Example of Setting a Namespace in a PHP File:

````php
namespace YourNamespace;

class YouCodeMember {
    // Class code here...
}

````
* using namespace

````php 
// File: index.php

require_once 'YourNamespace/YouCodeMember.php'; // Include the file containing the namespaced class

use YourNamespace\YouCodeMember; // Import the class with the "use" statement

// Create an object (instance) of the class
$member = new YouCodeMember();

// Access methods and properties of the object
// $member->methodName();
// $member->propertyName;

````
## Autoload

* PHP autoloading eliminates the need to explicitly include or require files containing class definitions.
It dynamically loads class files when a class is first used in the code.

* PHP provides autoloading functions (spl_autoload_register or __autoload) that allow developers to register custom autoloaders.
The autoloading functions are responsible for finding and including the necessary class files based on the class name.

````php
spl_autoload_register(function ($className) {
    $path = __DIR__ . '/classes/' . str_replace('\\', '/', $className) . '.php';
    if (file_exists($path)) {
        require_once $path;
    }
});

````

## Gestion des Erreurs

* Les Erreurs de Syntaxe
Les erreurs de syntaxe se produisent lorsque le code ne respecte pas la syntaxe attendue par le langage. Elles sont généralement détectées lors de la phase de compilation du code et doivent être corrigées avant l'exécution.

* Les Erreurs d'Exécution
Les erreurs d'exécution surviennent pendant l'exécution du script. Par exemple, un appel à une fonction qui n'existe pas, une division par zéro, etc. Ces erreurs peuvent être interceptées et gérées.

#### Gestion des Exceptions

Utilisation de try, catch, throw
* try Block:
The try block is where you enclose the code that might throw exceptions. It's like a guarded section where you anticipate that an exceptional condition might occur. If an exception occurs within this block, PHP looks for a corresponding catch block to handle it.

* catch Block:
The catch block is used to handle exceptions that are thrown within the corresponding try block. When an exception occurs, PHP attempts to match the thrown exception type with the types specified in the catch blocks. If there's a match, the code within that specific catch block is executed.

* throw Statement:
The throw statement is used to explicitly throw an exception. It allows you to create custom exceptions or handle exceptional situations and trigger the appropriate exception to be caught by a catch block.

```` php
try {
    // Code that might throw an exception
    $numerator = 10;
    $denominator = 0;
    
    if ($denominator === 0) {
        throw new Exception("Division by zero is not allowed.");
    }

    $result = $numerator / $denominator;
    echo "Result: $result";
} catch (Exception $e) {
    // Handling the caught exception
    echo "Caught exception: " . $e->getMessage();
}
````

## Principes SOLID 
### 1. Single Responsibility Principle (SRP)
* This principle states that a class should have only one reason to change. In other words, a class should have only one responsibility.

### 2. Open/Closed Principle (OCP)
* This principle suggests that software entities should be open for extension but closed for modification. It encourages the extension of behavior without modifying existing code.

### 3. Liskov Substitution Principle (LSP)
* The LSP emphasizes that objects of a derived class should be usable as objects of the base class without altering the correctness of the program.

### 4. Interface Segregation Principle (ISP)
* This principle advocates splitting larger interfaces into smaller and specific interfaces, thereby avoiding forcing classes to implement unused methods.

### 5. Dependency Inversion Principle (DIP)
* The DIP promotes depending on abstractions rather than implementation details. High-level modules should not depend on low-level modules but on abstractions.

