<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;

class AccountTest extends TestCase
{
    /** @test  */
    public function an_account_number_can_be_set(): void
    {
        // La configuration
        $account = new \App\Account();

        // L'action
        $account->setAccountNumber(1);

        // L'assertion
        $this->assertSame(1, $account->getAccountNumber());
    }

    /** @test */
    public function an_account_can_be_related_to_a_user(): void
    {
        // La configuration
        $account = new \App\Account();
        $user = new App\User();

        // L'action
        $account->setUser($user);

        // L'assertion
        $this->assertSame($user, $account->getUser());
    }
}

