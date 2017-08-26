<?php

namespace Tests\Feature;

use App\Account;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class AccountTest extends TestCase
{
    use DatabaseMigrations, WithoutMiddleware;

    /**
     * @test
     */
    public function it_should_create_account_with_owner_and_redirect()
    {
        /** @var User $user */
        $user = factory(User::class)->create();
        /** @var Account $account */
        $account = factory(Account::class)->make(['owner_id' => $user->id]);

        $this->be($user);
        $this
            ->post('/accounts', $account->toArray())
            ->assertRedirect('accounts');

        $this->assertDatabaseHas('accounts', $account->toArray());
    }

    /**
     * @test
     */
    public function it_should_not_create_account_without_existing_owner()
    {
        $account = factory(Account::class)->make(['owner_id' => 123]);
        $this->be(factory(User::class)->create());

        $this
            ->post(route('accounts.store'), $account->toArray())
            ->assertSessionHasErrors();

        $this->assertDatabaseMissing('accounts', ['owner_id' => 2]);
    }

    /**
     * @test
     */
    public function it_should_allow_only_logged_user_to_create_account()
    {
        $user = factory(User::class)->create();
        /** @var Account $account */
        $account = factory(Account::class)->make(['owner_id' => 123]);

        $this->be($user);
        $this
            ->post(route('accounts.store'), $account->toArray())
            ->assertSessionHasErrors();
    }
}
