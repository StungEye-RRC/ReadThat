<?php

require_once 'includes/includes.php';

class UserTest extends \Codeception\TestCase\Test {
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before() {
    }

    protected function _after() {
    }

    public function testAddingUserToDatabase() {
        $username = "test_username";
        add_new_user_to_database($username, 'password');
        
        $this->tester->seeInDatabase('users', array('username' => $username));
    }
    
    public function testSuccessfulUserLogins() {
        $user = user_login_successful('ghoster', 'password');
        $this->assertTrue($user['username'] == 'ghoster');
    }
    
    public function testUnsuccessfulUserLogins() {
        $user = user_login_successful('ghoster', 'badpassword');
        $this->assertFalse($user);
    }
}