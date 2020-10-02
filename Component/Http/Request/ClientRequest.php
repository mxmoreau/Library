<?php

    /**
     * Retrieve data from the client who sent the request.
     * 
     * @author Maxime Moreau
     * @version 1.0.0
     */

    namespace Library\Component\Http\Request;

    final class ClientRequest
    {
        private static string $client_ip;
        private static string $client_port;
        private static array $client_browsers;



        public static function ip(): string
        {
            return self::$client_ip ??= $_SERVER['REMOTE_ADDR'];
        }



        public static function port(): string
        {
            return self::$client_port ??= $_SERVER['REMOTE_PORT'];
        }



        public static function browser(): array
        {
            // get_browser() => https://browscap.org/ .ini

            return self::$client_browsers ??= get_browser(null, true);
        }
    }
?>
