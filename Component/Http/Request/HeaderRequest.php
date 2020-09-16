<?php 

    /**
     * @author Maxime Moreau
     * @version 1.0.0
     * @see https://www.iana.org/assignments/message-headers/message-headers.xhtml
     */

    namespace Library\Component\Http\Request;

    final class HeaderRequest
    {
        private static array $headers;
        private static array $keys;
        private static array $values;
        private static bool $is_limit;
        private static int $count;


        public static function headers(): array
        {
            return self::$headers ??= getallheaders();
        }



        public static function keys(): array
        {
            return self::$keys ??= array_keys(self::headers());
        }



        public static function values(): array
        {
            return self::$values ??= array_values(self::headers());
        }



        public static function get($key): ?string
        {
            return self::headers()[$key] ?? NULL;
        }



        public static function has(string $key): bool
        {
            return !empty(self::get($key));
        }



        public static function count(): int
        {
            return self::$count ??= count(self::headers());
        }



        public static function isLimit(): bool
        {
            return self::$is_limit ??= self::count() > 12;
        }
    }
?>
