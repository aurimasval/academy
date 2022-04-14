<?php

namespace Application\Provider;

class ProductImageProvider
{
    public function getImage(): string
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.thecatapi.com/v1/images/search?api_key=81e5d5ed-56d6-40c9-94f6-bb0a73a33d98');
        $response = json_decode($response->getBody(), true);

        return $response[0]['url'];
    }
}