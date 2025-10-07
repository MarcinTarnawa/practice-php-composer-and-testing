<?php

namespace Core;

class Container
{
    protected $bindings = [];
    
    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }   

    public function resolve($key, array $parameters = [])
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new \Exception("No matching middleware found for key '{$key}'.");
        }

        $resolver = $this->bindings[$key];

        return call_user_func_array($resolver, $parameters);
    }
}