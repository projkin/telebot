<?php namespace Projkin\TeleBot\Core;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\RequestException;
use Projkin\TeleBot\Entities\Response;

class Client
{

    // https://api.telegram.org/bot<token>/METHOD_NAME
    protected $token;
    protected $connector;
    protected $apiUrl;


    public function __construct($token) {

        $this->apiUrl = 'https://api.telegram.org/bot'. $token .'/';
        $this->token = $token;
        $this->connector = new GuzzleClient(['base_uri' => $this->apiUrl]);

    }


    public function request($command, $data = []) {

        try {

            if (!empty($data)) {
                $client = $this->connector->post($command, ['query' => $data]);
            } else {
                $client = $this->connector->post($command);
            }
            $result = json_decode((string) $client->getBody(), JSON_OBJECT_AS_ARRAY);

            // Add controller to response body
            $result['controller'] = $command;

            // Create response object
            $response = new Response($result);
        } catch (RequestException $e) {
            $response = $e->getResponse() ? (string) $e->getResponse()->getBody() : '';
        }

        return $response;

    }


}
