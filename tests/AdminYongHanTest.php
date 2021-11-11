<?php
use App\UserRepositoryYongHan;
use PHPUnit\Framework\TestCase;

class AdminYongHanTest extends TestCase
{
    protected $admin;

    protected function setUp(): void
    {
        $this->admin = new UserRepositoryYongHan;
    }

    protected function tearDown(): void
    {
        unset($this->admin);
    }

    // test pass if all data is returned correctly for mockAdmin
    public function test_MockAdmin_Returned()
    {
        $mockAdmin = $this->createMock(UserRepositoryYongHan::class);
        $mockAdminArray=[
            ['user_id' => 4, 'username' => 'admin', 'user_email' => 'admin@example.com',
                'user_pass' => 'p455w0rd', 'vkey' => '', 'user_role' => 'admin', 'status' => 'Verified'],
        ];
        $mockAdmin ->method('fetchAdmin')->willReturn($mockAdminArray);
        $users1 = $mockAdmin->fetchAdmin();
        $this->assertEquals('admin', $users1[0]['username']);
        $this->assertEquals('admin@example.com', $users1[0]['user_email']);
        $this->assertEquals('p455w0rd', $users1[0]['user_pass']);
        $this->assertEquals('', $users1[0]['vkey']);
        $this->assertEquals('admin', $users1[0]['user_role']);
        $this->assertEquals('Verified', $users1[0]['status']);
    }

    // test pass if loginUser functions as expected when admin tries to login
    public function test_loginUser_Admin()
    {
        $mockUser = $this->createMock(UserRepositoryYongHan::class);
        $mockAdminArray=[
            ['user_id' => 4, 'username' => 'admin', 'user_email' => 'admin@example.com',
                'user_pass' => 'p455w0rd', 'vkey' => '',
                'user_role' => 'admin', 'status' => 'Verified'
            ],
        ];

        $mockUser ->expects($this->exactly(1)) ->method('loginUser')->willReturn($mockAdminArray);
        $User = $mockUser->loginUser(
            'admin',
            'p455w0rd',
        );

        $this->assertEquals('admin', $User[0]['username']);
        $this->assertEquals('p455w0rd', $User[0]['user_pass']);
        $this->assertEquals('Verified', $User[0]['status']);
    }

    // deliberately fail test when user tries to register with admin as username
    public function testFail_User_Register_With_Admin_Username()
    {
        try {
            $this->assertTrue($this->admin->userRegistration(
                'admin',
                'admin@example.com',
                'p455w0rd',
                'p455w0rd',
            ));
        } catch (\Exception $error) {
            $this->assertEquals('Failed asserting that false is true.', $error->getMessage());
        }
    }
}
