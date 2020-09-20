<?php 

    /**
     * .:: Completes some missing features of the PHP ReflectionClass without inheritance ::.
     * 
     * If you want to use the ReflectionClass of PHP while using my class, do this to avoid confusion and errors
     * 
     * $rc = new \ReflectionClass('myclass'); OR 
     * $rc = new \ReflectionClass('\Namespace\SubNamespace\Myclass'); OR 
     * $rc = new \ReflectionClass('Myclass::class'); when importing a class located in a namespace via a 'Use Namespace\SubNamespace\Myclass;'
     * $rc->getMethod();
     * 
     * It's up to you to choose what best suits your needs
     * 
     * @author Maxime Moreau
     * @version 1.0.0
     * @see https://www.php.net/manual/en/class.reflectionclass.php
     */

    namespace Library\Component\Reflection;

    final class ReflectionClass
    {
        public static function exists(string $class_name): bool
        {
            return class_exists($class_name, 1);
        }



        public static function methods(string $class_name): ?array
        {
            return self::exists($class_name) ? get_class_methods($class_name) : NULL;
        }



        public static function in_methods(string $class_name, string $method_name): bool
        {
            return in_array($method_name, self::methods($class_name) ?? []);
        }



        public static function getParameters(string $class_name, string $method_name): ?array
        {
            if(self::in_methods($class_name, $method_name))
            {
                $getParameters = (new \ReflectionMethod($class_name, $method_name))->getParameters();

                foreach ($getParameters as $object)
                {
                    $parameters[] = $object->name;
                }

                $getParameters = NULL;
                unset($getParameters);

                return $parameters ?? [];
            }


            return NULL;
        }
        


        public static function inParameters(string $class_name, string $method_name, string $parameters_name)
        {
            return in_array($parameters_name, self::getParameters($class_name, $method_name) ?? []);
        }



        public static function getTypeFunction(string $class_name, string $method_name, string $parameters_name): ?string
        {
            if(self::inParameters($class_name, $method_name, $parameters_name))
            {
                $getType = (new \ReflectionParameter([$class_name, $method_name], $parameters_name))->__toString();
        
                $position_opening_hook = strpos($getType, '[') + 13;
                $position_dollar = strpos($getType, '$') - 1;
                $type = substr($getType, $position_opening_hook, $position_dollar - $position_opening_hook);
        
                $getType = NULL;
                unset($getType);

                switch ($type[0])
                {
                    case '$':
                        $type = 'mixed';
                        break;
                    case '.':
                        $type = 'spread'; // [Special Case] => It's a operator and not a type, it is possible that an argument in the function uses it
                        break;
                    default:
                        break;
                }

                return $type;
            }

            return NULL;
        }



        public static function getTypesFunction(string $class_name, string $method_name): ?array
        {
            $getParameters = self::getParameters($class_name, $method_name);

            if($getParameters)
            {
                foreach ($getParameters as $parameters)
                {
                    $types[] = ['name' => $parameters, 'type' => self::getTypeFunction($class_name, $method_name, $parameters)];
                }

                return $types ?? [];
            }
            else
            {
                return NULL;
            }
        }
    }
?>
