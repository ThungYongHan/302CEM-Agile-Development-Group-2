<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
<?php
require_once '../302CEM-Agile-Development-Group-2/src/redirectUnitTestClass.php';
use PHPUnit\Framework\TestCase;

class redirectUnitTestTest extends TestCase{

    /**
     * @var redirectUnitTestClass
     */
    protected $object;

    protected function setUp(): void {
        $this->object = new redirectUnitTestClass;
    }

    protected function tearDown(): void {
    }

    public function testOnlineRedirectOK() {
        $result = $this->object->redirect200();
        $url = get_headers('http://localhost:8080/302CEM-Agile-Development-Group-2-testmerge/GameBrowsingHomepage.php');
        $this->assertSame($result, $url[0]);
    }

    public function testValidateUserSessionIsEmptyTrue() {
        $result = $this->object->validateUserSessionIsEmptyTrue();
        $this->assertEmpty($result);
    }

}