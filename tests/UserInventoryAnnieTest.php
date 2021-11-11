<?php

use App\UserRepoAnnie;

class UserInventoryAnnieTest extends \PHPUnit\Framework\TestCase
{
    public function testUserRoleValidation()
    {
        $mockRepo = $this->createMock(UserRepoAnnie::class);
        $inventory = new \App\UserInventory($mockRepo);

        $mockUsersArray = [
            ['user_id' => '1', 'username' => 'user1', 'user_email' => 'user1@example.com', 'user_pass' => 'p455w0rd', 'vkey' => 'examplekey', 'status' => 'verified', 'user_role' => 'user'],
            ['user_id' => '2', 'username' => 'admin', 'user_email' => 'admin@example.com', 'user_pass' => 'p455w0rd', 'vkey' => 'examplekey1', 'status' => 'verified', 'user_role' => 'admin']
        ];

        $mockRepo->method('fetchUsers')->willReturn($mockUsersArray);

        $inventory->setUsers();

        $this->assertEquals('user', $inventory->getUsers()[0]['user_role']);
        $this->assertEquals('admin', $inventory->getUsers()[1]['user_role']);
    }

    public function testUsernameIsNotAdmin()
    {
        $newUserDetails = [
            ['user_id' => '1', 'username' => 'user1', 'user_email' => 'user1@example.com', 'user_pass' => 'p455w0rd']
        ];

        $this->assertNotEquals('admin', $newUserDetails[0]['username']);
    }

    public function testThrowErrorWhenUsernameIsAdmin()
    {
        $newUserDetails = [
            ['user_id' => '1', 'username' => 'admin', 'user_email' => 'admin@example.com', 'user_pass' => 'p455w0rd']
        ];

        try{
            $this->assertNotEquals('admin', $newUserDetails[0]['username']);
            $this->fail('An Error should have been thrown');

        }catch (\Exception $error){

            echo 'The username "admin" is not available.';
        }

    }
}