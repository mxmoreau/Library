<?php 

    /**
     * A set of functions that manage the body request.
     * 
     * @author Maxime Moreau
     * @version 1.0.0
     */
  
    namespace Library\Component\Http\Request;

    class BodyRequest
    {
        private static string $client_ip;
        private static string $client_port;
        private static array $client_browsers;
        private static string $client_time;
        private static string $client_time_float;
        private static string $client_time_date;



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
            return self::$client_browsers ??= \get_browser(null, 1);
        }



        public static function time(): string
        {
            return self::$client_time ??= $_SERVER['REQUEST_TIME'];
        }



        public static function time_float(): string
        {
            return self::$client_time_float ??= $_SERVER['REQUEST_TIME_FLOAT'];
        }



        public static function time_date(): string
        {
            return self::$client_time_date ??= \date('Y/m/d H:i:s', self::time_float());
        }
    }
?>
