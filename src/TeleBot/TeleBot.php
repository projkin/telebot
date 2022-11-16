<?php namespace Projkin\TeleBot;

use Projkin\TeleBot\Core\Telegram;
use Projkin\TeleBot\Exception\TeleBotException;

class TeleBot {


    protected $botID;
    protected $telegram;


    public function __construct(string $token) {
        if (empty($token)) {
            throw new TeleBotException('API Token not defined!');
        }

        preg_match('/(\d+):[\w\-]+/', $token, $matches);

        if (!isset($matches[1])) {
            throw new TeleBotException('Invalid API Token defined!');
        }

        $this->telegram = new Telegram($token);
        $this->botID  = (int) $matches[1];
    }


    public function getMe() {
        return $this->telegram->request('getMe');
    }


    public function sendMessage(array $data) {
        return $this->telegram->request('sendMessage', $data);
    }


    public function getUpdates() {
        return $this->telegram->request('getUpdates');
    }


    public function setWebhook(array $data) {
        return $this->telegram->request('setWebhook', $data);
    }


    public function deleteWebhook(array $data) {
        return $this->telegram->request('deleteWebhook', $data);
    }

}