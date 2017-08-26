<?php

namespace Tests\Feature;

use App\Account;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AccountTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function it_should_create_account_with_owner()
    {
        /** @var Account $account */
        $account = factory(Account::class)->create();
        $this->assertEquals($account->id, Account::find($account->id)->id);
        $this->assertNotNull($account->owner_id);
    }
}
