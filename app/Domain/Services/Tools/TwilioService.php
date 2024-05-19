<?php

namespace App\Domain\Services\Tools;


use Twilio\Exceptions\ConfigurationException;
use Twilio\Rest\Api\V2010\Account\MessageInstance;
use Twilio\Rest\Client;

class TwilioService
{

    protected string  $account_sid;
    protected string  $auth_token;
    protected string  $twilio_number;
    protected Client  $client;

    /**
     * @throws ConfigurationException
     */
    public function __construct()
    {
        $this->account_sid = config("app.TWILIO_SID");
        $this->auth_token = config("app.TWILIO_TOKEN");
        $this->twilio_number = config("app.TWILIO_FROM");
        $this->client = new Client($this->account_sid, $this->auth_token);

    }

    public function sendSMS($phone, $message): MessageInstance
    {
        return $this->client->messages->create($phone, [
            'from' => $this->twilio_number,
            'body' => $message]);
    }
}
