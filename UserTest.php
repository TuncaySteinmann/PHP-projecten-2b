<?php
    // Functie: classdefinitie User 
    // Auteur: Wigmans
    

    
    use \PHPUnit\Framework\TestCase;
    use loginopdracht\classes\User;
    
// de classname moet gelijk zijn aan de filenaam CalculatorTest.php
class UserTest extends TestCase
{
    protected $user;

    public function setUp(): void {
        $this->user = new User();
    }

    public function testSetGetPassword(){
        
        $this->user->SetPassword("1234");
        $this->assertEquals("1234", $this->user->GetPassword());    
    }

    
    }

  


    



    

?>