<?php
require_once "src/Person.php";

class Employee extends Person
{
  // 属性: employeeId, salary
  protected int $employeeId;
  protected int $salary;

  public function __construct(string $name, int $age, string $address, int $employeeId, int $salary)
  {
    // 親クラスのコンストラクタを呼び出す
    parent::__construct($name, $age, $address);
    $this->employeeId = $employeeId;
    $this->salary = $salary;
  }
}
