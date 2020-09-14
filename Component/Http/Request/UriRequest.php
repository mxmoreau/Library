<?php 

    /**
     * @author Maxime Moreau
     * @version 1.0.0
     */

    namespace Library\Component\Http\Request;

    class UriRequest
    {
        private static string $uri;
        private static string $full;
        private static string $protocol;
        private static string $scheme;
        private static string $scheme_version;
        private static bool $scheme_isSecure;
        private static string $host;
        private static string $hosts;
        private static string $path;
        private static string $query;



        public static function uri()
        {
            return self::$uri ??= htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES, 'UTF-8');
        }



        public static function full()
        {
            return self::$full ??= self::scheme().'://'.self::hosts().self::uri();
        }



        public static function protocol(): string
        {
            return self::$protocol ??= $_SERVER['SERVER_PROTOCOL'];
        }



        public static function scheme(): string
        {
            return self::$scheme ??= strtolower($_SERVER['REQUEST_SCHEME']);
        }



        public static function scheme_version(): string 
        {
            return self::$scheme_version ??= explode('/', self::protocol(), 2)[1];
        }
        


        public static function scheme_isSecure(): bool
        {
            return self::$scheme_isSecure ??= self::scheme() === "https";
        }



        public static function host(): string 
        {
            return self::$host ??= $_SERVER['SERVER_NAME'];
        }

        
        
        public static function hosts(): string
        {
            return self::$hosts ??= $_SERVER['HTTP_HOST'];
        }



        public static function path(bool $decode=False): string
        {
            self::$path ??= explode('?', self::uri(), 2)[0];
           
            return $decode ? urldecode(self::$path): self::$path;
        }



        public static function query(): string
        {
            return self::$query ??= $_SERVER['QUERY_STRING'];
        }



        public static function isLimit(): bool
        {
            return mb_strlen(self::uri()) > 256;
        }
    }
?>
