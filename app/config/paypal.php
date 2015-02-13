<?php
return array(
    // set your paypal credential
    'client_id' => 'ATIZVBBmj5h69qPF3_bdBJRypjd2p2UOm4jMOXzHFprMQtauBS_Oc-3UoTcB',
    'secret' => 'EIow1hB-A6lxiMT1vB_j37_m7NQ9Hf-OA-4byB9BslU7PZdNryynmIgb1n_5',

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