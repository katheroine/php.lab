<?php

enum Role: string
{
    case BackendDeveloper = 'backend developer';
    case FrontendDeveloper = 'frontend developer';
    case AutomaticTester = 'automatic tester';
    case DevOpsEngineer = 'devops engineer';

    public function getLabel(): string
    {
        return $this->value;
    }
}

class Employee
{
    public function __construct(
        private string $name,
        private string $surname,
        private Role $role,
    ) {
    }

    public function getDescription(): string
    {
        return "Name: {$this->name}\n"
            . "Surname: {$this->surname}\n"
            . 'Role: ' . $this->role->getLabel();
    }
}

$employee = new Employee('Giuseppe', 'Gandolfini', Role::FrontendDeveloper);

print("Employee of the year:\n" . $employee->getDescription() . PHP_EOL);
