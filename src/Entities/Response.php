<?php namespace Projkin\TeleBot\Entities;


/**
 * Class Response
 *
 * @link https://core.telegram.org/bots/api#making-requests
 *
 * @method bool   getOk()          If the request was successful
 * @method mixed  getResult()      The result of the query
 * @method int    getErrorCode()   Error code of the unsuccessful request
 * @method string getDescription() Human-readable description of the result / unsuccessful request
 *
 */

class Response extends Entity
{

    public $controller;

    public function __construct($data)
    {

        $isOk  = isset($data['ok']) ? (bool) $data['ok'] : false;
        $result = isset($data['result']) ? $data['result'] : null;
        $data['controller'] = isset($data['controller']) ? $data['controller'] : 'getMessage';

        // Set Controller
        $this->controller = $data['controller'];

        if ($isOk && is_array($result)) {
            $data['result'] = $this->makeResultObject($result);
        }

        parent::__construct($data);
    }


    public function isOk()
    {
        return (bool) $this->getOk();
    }


    protected function isAssoc(array $array)
    {
        return count(array_filter(array_keys($array), 'is_string')) > 0;
    }


    private function makeResultObject(array $result)
    {

        if ($this->isAssoc($result)) {
            $types = [
                'getMe'          => User::class,
                'getWebhookInfo' => WebhookInfo::class,
                'getChat'        => Chat::class,
            ];

            $object = array_key_exists($this->controller, $types) ? $types[$this->controller] : Message::class;
            return new $object($result);

        } else {

            $results = [];
            $types = [
                'getUpdates' => Update::class,
                'getMyCommands' => BotCommand::class,
            ];

            $object = array_key_exists($this->controller, $types) ? $types[$this->controller] : Update::class;

            foreach ($result as $data) {
                $results[] = new $object($data);
            }
            return $results;
        }

    }


    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }








}