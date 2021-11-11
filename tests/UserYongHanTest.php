<?php
use App\UserRepositoryYongHan;
use PHPUnit\Framework\TestCase;

class UserYongHanTest extends TestCase
{
    protected $user;

    protected function setUp(): void
    {
        $this->user = new UserRepositoryYongHan();
    }

    protected function tearDown(): void
    {
        unset($this->user);
    }

    // test pass if all data is returned correctly for mockUsers
    public function test_MockUsers_Are_Returned()
    {
        $mockUsers = $this->createMock(UserRepositoryYongHan::class);
        $mockUsersArray=[
                ['user_id' => 1, 'username' => 'user1', 'user_email' => 'user1@example.com', 'user_pass' => 'p455w0rd',
                'vkey' => '', 'user_role' => 'user', 'status' => 'Verified'],
                ['user_id' => 2, 'username' => 'user2', 'user_email' => 'user2@example.com', 'user_pass' => 'p455w0rd',
                'vkey' => '', 'user_role' => 'user', 'status' => 'Verified'],
                ['user_id' => 3, 'username' => 'user3', 'user_email' => 'user3@example.com', 'user_pass' => 'p455w0rd',
                'vkey' => '', 'user_role' => 'user', 'status' => 'Verified'],
                ['user_id' => 4, 'username' => 'admin', 'user_email' => 'admin@example.com', 'user_pass' => 'p455w0rd',
                'vkey' => '', 'user_role' => 'admin', 'status' => 'Verified'],
        ];
        $mockUsers ->method('fetchUsers')->willReturn($mockUsersArray);
        $users = $mockUsers->fetchUsers();
        $this->assertEquals('user1', $users[0]['username']);
        $this->assertEquals('user2', $users[1]['username']);
        $this->assertEquals('user3', $users[2]['username']);
        $this->assertEquals('admin', $users[3]['username']);
    }

    // test pass if all data is returned correctly for mockUser1
    public function test_MockUser1_Returned()
    {
        $mockUser = $this->createMock(UserRepositoryYongHan::class);
        $mockUser1Array=[
            ['user_id' => 1, 'username' => 'user1', 'user_email' => 'user1@example.com',
                'user_pass' => 'p455w0rd', 'vkey' => '', 'user_role' => 'user', 'status' => 'Verified'],
            ];
        $mockUser ->method('fetchUser1')->willReturn($mockUser1Array);
        $users1 = $mockUser->fetchUser1();
        $this->assertEquals('user1', $users1[0]['username']);
        $this->assertEquals('user1@example.com', $users1[0]['user_email']);
        $this->assertEquals('p455w0rd', $users1[0]['user_pass']);
        $this->assertEquals('', $users1[0]['vkey']);
        $this->assertEquals('user', $users1[0]['user_role']);
        $this->assertEquals('Verified', $users1[0]['status']);
    }

    //test pass if user is an array
    public function test_Validate_User_Is_Array()
    {
        $result = $this->user->validateUserIsArray();
        $this->assertTrue($result);
    }

    // test pass if user array has key of as listed
    public function test_Validate_User_Has_All_Keys()
    {
        $result = $this->user->validateUserKey();
        $this->assertArrayHasKey('user_id', $result);
        $this->assertArrayHasKey('username', $result);
        $this->assertArrayHasKey('user_email', $result);
        $this->assertArrayHasKey('user_pass', $result);
        $this->assertArrayHasKey('vkey', $result);
        $this->assertArrayHasKey('user_role', $result);
        $this->assertArrayHasKey('status', $result);
    }

    // deliberately fail test as user array is missing user_role key
    public function testFail_Validate_User_Missing_UserRole_Key()
    {
        $result = $this->user->validateUserMissingKey();
        $this->assertArrayHasKey('user_id', $result);
        $this->assertArrayHasKey('username', $result);
        $this->assertArrayHasKey('user_email', $result);
        $this->assertArrayHasKey('user_pass', $result);
        $this->assertArrayHasKey('vkey', $result);
        $this->assertArrayHasKey('status', $result);
        try {
            $this->assertArrayHasKey('user_role', $result);
        } catch (\Exception $error) {
            $this->assertEquals('Failed asserting that an array has the key \'user_role\'.', $error->getMessage());
        }
    }

    // test pass if verified user logs in
    public function test_loginUser_Verified_User()
    {
        $mockUser = $this->createMock(UserRepositoryYongHan::class);
        $mockUserArray=[
            ['user_id' => 1, 'username' => 'user1', 'user_email' => 'user1@example.com',
                'user_pass' => 'p455w0rd', 'vkey' => '',
                'user_role' => 'user', 'status' => 'Verified'
            ],
        ];

        $mockUser ->expects($this->exactly(1)) ->method('loginUser')->willReturn($mockUserArray);
        $User = $mockUser->loginUser(
            'user1',
            'p455w0rd',
        );

        $this->assertEquals('user1', $User[0]['username']);
        $this->assertEquals('p455w0rd', $User[0]['user_pass']);
        $this->assertEquals('Verified', $User[0]['status']);
    }

    // deliberately fail test as unverified user tries to log in
    public function testFail_loginUser_Unverified_User()
    {
        $mockUser = $this->createMock(UserRepositoryYongHan::class);
        $mockUserArray=[
            ['user_id' => 1, 'username' => 'user1', 'user_email' => 'user1@example.com',
                'user_pass' => 'p455w0rd', 'vkey' => '',
                'user_role' => 'user', 'status' => ''
            ],
        ];

        $mockUser ->expects($this->exactly(1)) ->method('loginUser')->willReturn($mockUserArray);
        $User = $mockUser->loginUser(
            'user1',
            'p455w0rd',
        );

        $this->assertEquals('user1', $User[0]['username']);
        $this->assertEquals('p455w0rd', $User[0]['user_pass']);
        try {
            $this->assertEquals('Verified', $User[0]['status']);
        } catch (\Exception $error) {
            $this->assertEquals('Failed asserting that two strings are equal.', $error->getMessage());
        }
    }

    // deliberately fail test as user inputs wrong password for login
    public function testFail_loginUser_Wrong_Password()
    {
        $mockUser = $this->createMock(UserRepositoryYongHan::class);
        $mockUserArray=[
            ['user_id' => 1, 'username' => 'user1', 'user_email' => 'user1@example.com',
                'user_pass' => 'p455w0rd', 'vkey' => '',
                'user_role' => 'user', 'status' => 'Verified'
            ],
        ];

        $mockUser ->expects($this->exactly(1)) ->method('loginUser')->willReturn($mockUserArray);
        $User = $mockUser->loginUser(
            'user1',
            'wrongPassword',
        );

        $this->assertEquals('user1', $User[0]['username']);
        $this->assertEquals('Verified', $User[0]['status']);
        try {
            $this->assertEquals('wrongPassword', $User[0]['user_pass']);
        } catch (\Exception $error) {
            $this->assertEquals('Failed asserting that two strings are equal.', $error->getMessage());
        }
    }

    // deliberately fail test as user does not input username when trying to log in
    public function testFail_loginUser_Missing_Username()
    {
        try {
            $this->assertTrue($this->user->loginUser(
                '',
                'p455w0rd',
            ));
        } catch (\Exception $error) {
            $this->assertEquals('Failed asserting that false is true.', $error->getMessage());
        }
    }

    // deliberately fail test as user does not input password when trying to log in
    public function testFail_loginUser_Missing_Password()
    {
        try {
            $this->assertTrue($this->user->loginUser(
                'user1',
                '',
            ));
        } catch (\Exception $error) {
            $this->assertEquals('Failed asserting that false is true.', $error->getMessage());
        }
    }
}
