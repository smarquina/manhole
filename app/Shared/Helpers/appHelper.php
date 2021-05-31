<?php

if (!function_exists('getClassShortName')) {
    /**
     * @param string $class
     * @return string
     * @throws \ReflectionException
     */
    function getClassShortName(string $class): string {
        return (new ReflectionClass($class))->getShortName();
    }
}

if (!function_exists('classHydrate')) {
    function class_hydrate(array $array, $object) {
        $class = get_class($object);

        $methods = get_class_methods($class);
        foreach ($methods as $method) {
            preg_match('/^(set)(.*?)$/i', $method, $results);
            $pre = $results[1] ?? '';
            $k = $results[2] ?? '';
            $k = strtolower(substr($k, 0, 1)) . substr($k, 1);

            if ($pre === 'set' && !empty($array[$k])) {
                $object->$method($array[$k]);
            }
        }
        return $object;
    }
}
