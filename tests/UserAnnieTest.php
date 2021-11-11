<?php

use App\UserRepoAnnie;

class UserAnnieTest extends \PHPUnit\Framework\TestCase
{
    public function testUserRoleValidation()
    {
        $mockRepo = $this->createMock(UserRepoAnnie::class);

        $mockUsersArray = [
            ['user_id' => '1', 'username' => 'user1', 'user_email' => 'user1@example.com', 'user_pass' => 'p455w0rd', 'vkey' => 'examplekey', 'status' => 'verified', 'user_role' => 'user'],
            ['user_id' => '2', 'username' => 'admin', 'user_email' => 'admin@example.com', 'user_pass' => 'p455w0rd', 'vkey' => 'examplekey1', 'status' => 'verified', 'user_role' => 'admin']
        ];

        $mockRepo->method('fetchUsers')->willReturn($mockUsersArray);

        $users = $mockRepo->fetchUsers();

        $this->assertEquals('user', $users[0]['user_role']);
        $this->assertEquals('admin', $users[1]['user_role']);

    }


}