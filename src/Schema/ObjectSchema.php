<?php

namespace RoundingWell\Schematic\Schema;

use RoundingWell\Schematic\Schema;

class ObjectSchema extends Schema
{
    public function phpType()
    {
        return 'object';
    }

    public function property($name)
    {
        return Schema::make($this->schema->properties->$name);
    }

    /**
     * @return Schema[]
     */
    public function properties()
    {
        $props = [];

        foreach ($this->schema->properties as $name => $schema) {
            $props[$name] = $this->property($name);
        }

        return $props;
    }

    /**
     * @return string[]
     */
    public function required()
    {
        return !is_null($this->schema->required) ? $this->schema->required : [];
    }

    public function isRequired($property)
    {
        return in_array($property, $this->required());
    }
}
