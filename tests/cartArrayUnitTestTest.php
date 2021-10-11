<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
<?php

require_once '../302CEM-Agile-Development-Group-2/src/cartArrayUnitTest.php';
use PHPUnit\Framework\TestCase;

class cartArrayUnitTestTest extends TestCase {

    /**
     * @var cartArrayUnitTest
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void {
        $this->object = new cartArrayUnitTest;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void {

    }

    //check if cart is an array
    public function testValidateCartIsArray() {
        $result = $this->object->validateCartIsArray();
        $this->assertTrue($result);
    }

    //check array key has key of as listed
    public function testValidateCartKey() {
        $result = $this->object->validateCartKey();
        $this->assertArrayHasKey('isbn', $result);
        $this->assertArrayHasKey('amt', $result);
        $this->assertArrayHasKey('title', $result);
        $this->assertArrayHasKey('pic', $result);
        $this->assertArrayHasKey('price', $result);
    }

    //$isbn, $amt, $title, $pic, $price
    //check if each element of array is validated with correct type
    //correct input
    public function testValidateCartTypeTrue() {
        $result = $this->object->
        validateCartType("9791296965391", 20, "Book of Life", "https://unsplash.com/photos/DCzpr09cTXY", 294); //test all correct
        $this->assertTrue($result);
    }

    //false input for all string input
    public function testValidateCartTypeFalse1() {
        $result = $this->object->
        validateCartType(true, 20, 2384634, "https://unsplash.com/photos/DCzpr09cTXY", 294);
        $this->assertFalse($result);
    }

    //false input for all string input
    public function testValidateCartTypeFalse2() {
        $result = $this->object->
        validateCartType(6463728313, 20, false, "https://unsplash.com/photos/DCzpr09cTXY", 294);
        $this->assertFalse($result);
    }

    //false input for all int input
    public function testValidateCartTypeFalse3() {
        $result = $this->object->
        validateCartType("9791296965391", 0.1, "Book of Life", "https://unsplash.com/photos/DCzpr09cTXY", 123.4245424);
        $this->assertFalse($result);
    }

    //false input for all int input
    public function testValidateCartTypeFalse4() {
        $result = $this->object->
        validateCartType("9791296965391", -1, "Book of Life", "https://unsplash.com/photos/DCzpr09cTXY", -1323.23);
        $this->assertFalse($result);
    }

    //false input for url input
    public function testValidateCartTypeFalse5() {
        $result = $this->object->
        validateCartType("9791296965391", 20, "Book of Life", "thisisnoturl.com", 294);
        $this->assertFalse($result);
    }

}