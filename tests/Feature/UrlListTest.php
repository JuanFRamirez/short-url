<?php

namespace Tests\Feature;

use App\Models\Url;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UrlListTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_get_list_of_urls_returns_data_correctly():void{
        Url::factory(15)->create();
        $response = $this->get('api/url');
        $response->assertStatus(200);
    }
}
