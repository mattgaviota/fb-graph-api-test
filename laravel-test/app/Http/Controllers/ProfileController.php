<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Return a facebook user profile.
     *
     * @return Psr7 Response
     */
    public function facebook(Request $request)
    {
        $access_token = getenv('FACEBOOK_ACCESS_TOKEN');
        $user = $request->id ?: '123456';
        $fields = [
            'id',
            'cover',
            'first_name',
            'last_name',
            'name'
        ];
        $client = new \GuzzleHttp\Client();
        try {
            $body = $client->request('GET', 'https://graph.facebook.com/v2.11/' . $user, [
                'query' => [
                    'fields' => implode(',', $fields),
                    'access_token' => $access_token,
                ]
            ])->getBody();
            return response()->json(json_decode($body));
        } catch (RequestException $e) {
            return response()->json(
                ['message' => 'Bad request, user id not exist.'],
                400
            );
        }
    }
}
