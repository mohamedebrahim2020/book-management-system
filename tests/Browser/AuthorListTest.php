<?php

namespace Tests\Browser;

use App\Models\Author;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AuthorListTest extends DuskTestCase
{
	use DatabaseMigrations;

	/**
     * A Dusk test example.
     */
    public function testAuthorListExample(): void
    {
		$this->browse(function (Browser $browser) {
			$browser->visit('/admin/authors')
				->pause(1000)
				->assertSee('No authors');
		});

		Author::factory()->count(10)->create();

        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/authors')
				    ->pause(1000)
                    ->assertSee('Laravel')
					->pause(1000)
					->clickLink('New author')
				     ->pause(1000)
					->assertUrlIs('http://127.0.0.1:8000/admin/authors/create');
        });
    }
}
