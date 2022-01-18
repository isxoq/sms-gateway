<?php

/*
  |--------------------------------------------------------------------------
  | SMS Gateways configurations
  |--------------------------------------------------------------------------
  |
  */

return [
    "gateways" => [
        "notify" => [
            "type" => "notify",
            "token" => "123456789qwertyuio",      // Notify.gov.uz taqdim etgan token
            "provider" => "uzinfocom",            // Alfa nom
            "active" => true                      // Faol holatda yoki nofaol holatda
        ]
    ]
];
