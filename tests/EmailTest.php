<?php
// tests/EmailTest.php
use PHPUnit\Framework\TestCase;
use App\Email;

class EmailTest extends TestCase
{
    /**
     * @test
     */
    public function can_be_created_from_a_valid_email()
    {
        $this->assertTrue(Email::isValid('test@example.com'));
    }

    /**
     * @test
     */
    public function cannot_be_created_from_an_invalid_email()
    {
        $this->assertFalse(Email::isValid('invalid-email'));
    }
}