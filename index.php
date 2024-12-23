<?php
class Employee
{
    private $name;
    private $salary;

//    public function __construct($name,$salary)
//    {
//        $this->name = $name;
//        $this->salary = $salary;
//    }



    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * @param mixed $salary
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

}

$employee = new Employee("abdljbar","280000");

$employee = new Employee();
$employee->setName("abdljbar");
$employee->setSalary(20000);
class Manager extends Employee
{
    private $bonus;

    public function __construct()
    {

    }

}