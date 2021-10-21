<?php

use App\UserRepository;
use PHPUnit\Framework\TestCase;

class MockUsersTest extends TestCase
{
    public function testMockUsersAreReturned(){
        $mockUser = $this->createMock(UserRepository::class);
        $mockUserArray=[
            ['user_id' => 1, 'username' => 'user1', 'user_email' => 'user1@example.com', 'user_pass' => 'p455w0rd'],
            ['user_id' => 2, 'username' => 'user2', 'user_email' => 'user2@example.com', 'user_pass' => 'p455w0rd'],
            ['user_id' => 3, 'username' => 'user3', 'user_email' => 'user3@example.com', 'user_pass' => 'p455w0rd'],
        ];
        $mockUser ->method('fetchUsers')->willReturn($mockUserArray);
        $users = $mockUser->fetchUsers();
        $this->assertEquals('user1', $users[0]['username']);
    }

    public function testMockUsers1AreReturned(){
        $mockUser = $this->createMock(UserRepository::class);
        $mockUser1Array=[
            ['user_id' => 1, 'username' => 'user1', 'user_email' => 'user1@example.com', 'user_pass' => 'p455w0rd'],
        ];
        $mockUser ->method('fetchUsers1')->willReturn($mockUser1Array);
        $users1 = $mockUser->fetchUsers1();
        $this->assertEquals('user1', $users1[0]['username']);
        $this->assertEquals('p455w0rd', $users1[0]['user_pass']);
    }

    public function testMockUsers2AreReturned(){
        $mockUser = $this->createMock(UserRepository::class);
        $mockUser2Array=[
            ['user_id' => 2, 'username' => 'user2', 'user_email' => 'user2@example.com', 'user_pass' => 'p455w0rd'],
        ];
        $mockUser ->method('fetchUsers2')->willReturn($mockUser2Array);
        $users2 = $mockUser->fetchUsers2();
        $this->assertEquals('user2', $users2[0]['username']);
        $this->assertEquals('p455w0rd', $users2[0]['user_pass']);
    }

    public function testMockUsers3AreReturned(){
        $mockUser = $this->createMock(UserRepository::class);
        $mockUser3Array=[
            ['user_id' => 3, 'username' => 'user3', 'user_email' => 'user3@example.com', 'user_pass' => 'p455w0rd'],
        ];
        $mockUser ->method('fetchUsers3')->willReturn($mockUser3Array);
        $users3 = $mockUser->fetchUsers3();
        $this->assertEquals('user3', $users3[0]['username']);
        $this->assertEquals('p455w0rd', $users3[0]['user_pass']);
    }


}