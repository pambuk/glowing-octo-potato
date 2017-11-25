<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginAsAdminTest extends DuskTestCase
{
    /**
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/login')
                ->type('#email', 'wojtek.zymonik@gmail.com')
                ->type('#password', '123123')
                ->click('button[type=submit]')
                ->assertSee('Admin')
                ->clickLink('Admin')
                ->assertSee('Operation Sources');
        });
    }
}
