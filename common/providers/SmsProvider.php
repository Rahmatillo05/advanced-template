<?php

namespace common\providers;

use mrmuminov\eskizuz\Eskiz;
use mrmuminov\eskizuz\types\sms\SmsSingleSmsType;

class SmsProvider
{

    private string $baseUrl = 'https://notify.eskiz.uz/api';
    public Eskiz $client;

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $this->client = new Eskiz(getenv('ESKIZ_EMAIL'), getenv('ESKIZ_PASSWORD'));
        $this->client->requestAuthLogin();
    }



    public function sanitizePhone(string $phone): string
    {
        return preg_replace('/[^0-9]/', '', $phone);
    }

    /**
     * @throws \Exception
     */
    public function getToken(): string
    {
        return $this->client->requestAuthLogin()->response->token;
    }

    public function sendSMS(string $phone_number, string $text)
    {
        $message = new SmsSingleSmsType(
            from: getenv('SMS_NICKNAME'),
            message: $text,
            mobile_phone: $this->sanitizePhone($phone_number),
            user_sms_id:rand(999, 9999)
        );

        $response = $this->client->requestSmsSend($message)->getResponse();
        return $response->client->statusCode;
    }
}