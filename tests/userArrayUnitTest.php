<?php

require_once '../302CEM-Agile-Development-Group-2/src/userArrayUnitTest.php';
use PHPUnit\Framework\TestCase;

class userArrayUnitTestTest extends TestCase {

    /**
     * @var userArrayUnitTest
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void {
        $this->object = new userArrayUnitTest;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void {

    }

    //check if User is an array
    public function testValidateUserIsArray() {
        $result = $this->object->validateUserIsArray();
        $this->assertTrue($result);
    }

    public function testValidateUserKey() {
        $result = $this->object->validateUserKey();
        $this->assertArrayHasKey('user_id', $result);
        $this->assertArrayHasKey('username', $result);
        $this->assertArrayHasKey('user_email', $result);
        $this->assertArrayHasKey('user_pass', $result);
    }
}