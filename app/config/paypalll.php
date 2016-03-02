<?php
return array(
    // set your paypal credential
    'client_id' => 'AbvyHrjXcsS0Dzg1isq_baYwMnyDomfD6NJSmlJNcIfhgwQmXn-jDHxG_uzrWOC3DF0pV0V1RwI9jsHE',
    'secret' => 'EPF2DTTulxhAUT9hV4BrWY2sZid4sJOvJ5orO76l8R-KNCtNO4m2X46dTTK6qwQaRVfWzWmXyzTMCbmh',

    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);
