<?php
include_once 'Pizza.php';
include_once 'PizzaBase.php';
include_once 'PizzaPattern.php';
include_once 'PizzaExtra.php';

// Class for Pizza Pattern (e.g., Margherita, Pepperoni)


// Class for Pizza Extras (e.g., Cheese, Olives, Mushrooms)


// Pizza Class


// Usage Example

// Create a base
$thinCrust = new PizzaBase("Thin Crust", 5.0);

// Create patterns
$margherita = new PizzaPattern("Margherita", 7.0);
$pepperoni = new PizzaPattern("Pepperoni", 8.5);

// Create extras
$cheese = new PizzaExtra("Extra Cheese", 2.0);
$olives = new PizzaExtra("Olives", 1.5);
$mushrooms = new PizzaExtra("Mushrooms", 2.0);

// Create a Pizza
$pizza = new Pizza($thinCrust);
$pizza->addPattern($margherita);
$pizza->addPattern($pepperoni);
$pizza->addExtra($cheese);
$pizza->addExtra($olives);
$pizza->addExtra($mushrooms);

// Display Pizza Details
$pizza->displayDetails();

interface Tasks
{
    public function coding($language);
    public function learning($subject);
}

class YoucodeMember implements Tasks
{
    public function coding($language)
    {
        echo "<br> am coding <br>";
    }

    public function learning($subject)
    {
        echo "<br> am learning <br>";
    }
}

$member = new YoucodeMember();
$member->coding("PHP");
$member->learning("OOP");