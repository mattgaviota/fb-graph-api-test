<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfileControllerTest extends TestCase
{
    /**
     * A test that try to retrieve a profile with a correct id
     *
     * @return void
     */
    public function testProfileGetAllowed()
    {
        $response = $this->json(
            'get',
            '/api/profile/facebook/100008050743902'
        );

        $response
            ->assertStatus(200)
            ->assertJson(
                ['id' => '100008050743902']
            )
        ;
    }

    /**
     * A test that try to retrieve a profile with an incorrect id
     *
     * @return void
     */
    public function testProfileGetNotAllowed()
    {
        $response = $this->json(
            'get',
            '/api/profile/facebook/123456'
        );

        $response
            ->assertStatus(400)
            ->assertJson(
                ['message' => 'Bad request, user id not exist.']
            )
        ;
    }
}
