<?php namespace Projkin\TeleBot\Core;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\RequestException;

class Telegram {

    // https://api.telegram.org/bot<token>/METHOD_NAME
    protected $token;
    protected $client;
    protected $apiUrl;


    public function __construct($token) {

        $this->apiUrl = 'https://api.telegram.org/bot'. $token .'/';
        $this->token = $token;
        $this->client = new GuzzleClient(['base_uri' => $this->apiUrl]);

    }


    public function request($method, $data = []) {

        try {
            $response = $this->client->post($method, ['query' => $data]);
            $result = $response->getBody();
        } catch (RequestException $e) {
            $result = $e->getResponse() ? (string) $e->getResponse()->getBody() : '';
        }

        return new TelegramResponse($result);
    }


}
