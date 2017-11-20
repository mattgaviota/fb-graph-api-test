<?php

namespace Tests;

class ProfileControllerTest extends BaseTestCase
{
    public function testProfileGetAllowed()
    {
        $response = $this->runApp('GET', '/profile/facebook/100008050743902');
        $result = json_decode($response->getBody(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertSame($result['id'], "100008050743902");
    }

    public function testProfileGetNotAllowed()
    {
        $response = $this->runApp('GET', '/profile/facebook/123456');
        $result = json_decode($response->getBody(), true);

        $this->assertEquals(400, $response->getStatusCode());
        $this->assertContains('Bad request, user id not exist.', $result['message']);
    }
}
