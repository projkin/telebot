<?php namespace Projkin\TeleBot;

use Projkin\TeleBot\Core\Client;
use Projkin\TeleBot\Exception\TeleBotException;

class TeleBot {


    //protected $botID;
    protected $client;


    public function __construct(string $token) {
        if (empty($token)) {
            throw new TeleBotException('API Token not defined!');
        }

        preg_match('/(\d+):[\w\-]+/', $token, $matches);

        if (!isset($matches[1])) {
            throw new TeleBotException('Invalid API Token defined!');
        }

        $this->client = new Client($token);
        //$this->botID  = (int) $matches[1];
    }


    public function response(string $command, array $data = [])
    {
        return $this->client->request($command, $data);
    }















//    /**
//     * Setters
//     */
//    public function sendMessage(array $data)
//    {
//        return $this->client->request('sendMessage', $data);
//    }
//
//
//
//    /**
//     * Getters
//     */
//    public function getMe() {
//        return $this->client->request('getMe');
//    }
//
//    public function getUpdates()
//    {
//        return $this->client->request('getUpdates');
//    }
//
//
//    public function getWebhookInfo()
//    {
//        return $this->client->request('getWebhookInfo');
//    }
//
//
//    public function setWebhook(array $data)
//    {
//        return $this->client->request('setWebhook', $data);
//    }
//
//
//    public function deleteWebhook(array $data)
//    {
//        return $this->client->request('deleteWebhook', $data);
//    }

}