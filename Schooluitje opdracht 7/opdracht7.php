<?php

abstract class Person {
    protected $name;
    protected $class;
    protected $paid;

    public function __construct($name, $class, $paid) {
        $this->name = $name;
        $this->class = $class;
        $this->paid = $paid;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getClass() {
        return $this->class;
    }

    public function setClass($class) {
        $this->class = $class;
    }

    public function hasPaid() {
        return $this->paid;
    }

    public function setPaid($paid) {
        $this->paid = $paid;
    }

    abstract public function role();
}

class Student extends Person {
    private $percentage;

    public function __construct($name, $class, $paid, $percentage) {
        parent::__construct($name, $class, $paid);
        $this->percentage = $percentage;
    }

    public function getPercentage() {
        return $this->percentage;
    }

    public function setPercentage($percentage) {
        $this->percentage = $percentage;
    }

    public function role() {
        return "Student";
    }
}

class Leraar extends Person {
    public function role() {
        return "Leraar";
    }
}

class SchooltripList {
    private $participants = [];

    public function addParticipant(Person $participant) {
        $this->participants[] = $participant;
    }

    public function getParticipants() {
        return $this->participants;
    }

    public function calculateTotalAmount() {
        $totalAmount = 0;
        foreach ($this->participants as $participant) {
            if ($participant instanceof Student) {
                $totalAmount += ($participant->hasPaid()) ? 1 : 0;
            }
        }
        return $totalAmount;
    }

    
}


$student1 = new Student("Piet", "Klas A", true, 80);
$student2 = new Student("Jan", "Klas B", false, 70);
$teacher1 = new Leraar("Mr. Peter", "Klas C", false);

$schooltripList = new SchooltripList();
$schooltripList->addParticipant($student1);
$schooltripList->addParticipant($student2);
$schooltripList->addParticipant($teacher1);

?>

