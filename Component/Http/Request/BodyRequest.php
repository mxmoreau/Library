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
        private static array $form;
        private static string $form_raw;


        public static function form(): array
        {
            return self::$form ??= $_POST;
        }



        public static function form_raw(): ?string
        {
            /*
                Does not work with enctype="multipart/form-data" in the <form> tag.
                To make it work do this: <form action="/" method="POST">
            */

            return self::$form_raw ??= file_get_contents('php://input');
        }



        public static function input(string $field_name): ?string
        {
            return $_POST[$field_name] ?? NULL;
        }
    }
?>
