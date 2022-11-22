<?php namespace Projkin\Test;


abstract class Entity
{


    protected $sub_entities = [];


    public function __construct($data) {

        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }


    public function __call(string $method, array $args)
    {

        //Convert method to snake_case (which is the name of the property)
        $property_name = mb_strtolower(ltrim(preg_replace('/[A-Z]/', '_$0', substr($method, 3)), '_'));

        $action = substr($method, 0, 3);
        if ($action === 'get') {

            $property = $this->getProperty($property_name);

            if ($property !== null) {
                //Get all sub-Entities of the current Entity
                $sub_entities = $this->subEntities();

                if (isset($sub_entities[$property_name])) {
                    $class = $sub_entities[$property_name];
                    if (is_array($class)) {
                        return $this->objectFromArray(reset($class), $property_name);
                    }
                    return new $class($property);
                }

            }

            return $property;

        }
        return null;

    }


    public function getProperty($property, $default = null)
    {
        if (isset($this->$property)) {
            return $this->$property;
        }

        return $default;
    }


    protected function subEntities()
    {
        return $this->sub_entities;
    }


    protected function objectFromArray($class, $property)
    {
        $new_objects = [];

        try {
            if ($objects = $this->getProperty($property)) {
                foreach ($objects as $object) {
                    if (!empty($object)) {
                        $new_objects[] = new $class($object);
                    }
                }
            }
        } catch (Exception $e) {
            $new_objects = [];
        }

        return $new_objects;
    }


}

