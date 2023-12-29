<?php

namespace Tests\Feature;

use App\Models\Url;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotEquals;

class UrlTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_short_url_is_formated_correctly():void
    {
        $url = Url::create(["url"=>"http://test1.com"]);
        $urlName = $url->name;
        $urlEndpoint = 'api/url/'.$urlName;
        $response = $this->get($urlEndpoint);
        $response->assertStatus(200);
        assertNotEquals($url->formatted_name, $url->url);
    }
}
