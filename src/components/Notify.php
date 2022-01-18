<?php

class Notify
{

    public $token;
    public $provider;
    public $data;

    public $endpoint = "https://notify.gov.uz/api/web/rest/send-sms";


    public function __construct(array $data)
    {
        $this->token = config("sms_gateway.gateways.notify.token");
        $this->provider = config("sms_gateway.gateways.notify.provider");
        $this->data = $data;
    }


    /**
     * Sms yuborish funksiyasi
     * @return mixed
     */
    public function sendMessage()
    {
        $data = [
            "token" => $this->token,
            "provider" => $this->provider,
            "phone" => $this->data["phone"],
            "text" => $this->data["text"],
        ];

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $this->endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json'
            ],
        ]);

        $response = json_decode(curl_exec($curl), true);
        curl_close($curl);
        return json_decode($response);
    }

}
