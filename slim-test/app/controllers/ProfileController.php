<?php

namespace App\Controllers;

use GuzzleHttp\Exception\RequestException;

class ProfileController
{
    /**
     * Return a facebook user profile.
     *
     * @return Psr7 Response
     */
    public function facebook($request, $response, $args) {
        $access_token = getenv('FACEBOOK_ACCESS_TOKEN');
        $user = $args['id'] ?: '123456';
        $fields = [
            'id',
            'first_name',
            'last_name',
            'name',
            'cover'
        ];
        $client = new \GuzzleHttp\Client();
        try {
            $body = $client->request('GET', 'https://graph.facebook.com/v2.11/' . $user, [
                'query' => [
                    'fields' => implode(',', $fields),
                    'access_token' => $access_token,
                ]
            ])->getBody();
            $obj = json_decode($body);
            return $response->withStatus(200)->withJson($obj);
        } catch (RequestException $e) {
            $obj = ['message' => 'Bad request, user id not exist.'];
            return $response->withStatus(400)->withJson($obj);
        }
    }
}
