<?php

namespace App\Http\Data;
use Prophecy\Exception\Doubler\MethodNotFoundException;

abstract class Data
{
    public function __call($name, $arguments)
    {
        if(!isset($this->handle()[$name])){
            throw new MethodNotFoundException("MethodNotFoundException $name()", Data::class, __FUNCTION__);
        }

        if(!empty($arguments)){
            foreach ($arguments as $argument){
                $array[$argument] = $this->handle()[$name][$argument];
            } return $array;
        }

        return $this->handle()[$name];
    }

    public function validate($checked, $role)
    {
        if(isset($checked, $role)){
            return in_array($checked, $this->handle()[$role]);
        }
    }

    abstract protected function handle();
}