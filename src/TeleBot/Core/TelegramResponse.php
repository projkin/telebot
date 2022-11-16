<?php namespace Projkin\TeleBot\Core;

class TelegramResponse {


    protected $rawData;
    protected $result;
    protected $description;
    protected $ok;
    protected $errorCode;


    public function __construct(string $rawData) {

        $data = json_decode($rawData, JSON_OBJECT_AS_ARRAY);

        $result = isset($data['result']) ? $data['result'] : null;

        $this->rawData = $rawData;

        $this->description = isset($data['description']) ? $data['description'] : null;
        $this->errorCode = isset($data['error_code']) ? $data['error_code'] : null;
        $this->ok  = isset($data['ok']) ? (bool) $data['ok'] : false;

        if ($this->ok && is_array($result)) {
            $this->result = $result;
        }

    }


    public function getRawData() {
        return $this->rawData;
    }


    public function isOk() {
        return $this->ok;
    }


    public function getResult() {
        return $this->result;
    }


    public function getDescription() {
        return $this->description;
    }

    public function getErrorCode() {
        return $this->errorCode;
    }






}
