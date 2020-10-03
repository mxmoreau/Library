<?php 

    /**
     * A set of functions that manage the request method
     * 
     * @author Maxime Moreau
     * @version 1.0.0
     */

    namespace Library\Component\Http\Request;

    final class MethodRequest
    {
        const METHODS = ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'TRACE', 'CONNECT', 'OPTIONS'];

        private static string $method;
        private static bool $is_method;

        public static function method(): string
        {
            return self::$method ??= strtoupper(htmlspecialchars($_SERVER['REQUEST_METHOD'], ENT_QUOTES, 'UTF-8'));
        }



        public static function isEqual(string $method): bool
        {
            return self::method() === strtoupper($method);
        }



        public static function isMethod(string $method = null): bool
        {
            return ($method !== null) ? in_array(strtoupper($method), self::METHODS) : self::$is_method ??= in_array(self::method(), self::METHODS);
        }
    }
?>
