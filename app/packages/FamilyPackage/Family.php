<?php
namespace App\packages\FamilyPackage;


class Family {
    public $person;
    public $tv;

    public function __construct(Person $person, Tv $tv)
    {
        $this->person = $person;
        $this->tv = $tv;

        echo "family created";
    }

    public function sayhello()
    {
        echo "hello Family";
    }
}

?>