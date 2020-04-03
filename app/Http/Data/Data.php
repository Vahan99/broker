<?php

namespace App\Http\Data;
use Prophecy\Exception\Doubler\MethodNotFoundException;

abstract class Data
{
    protected $forms;

    public function __call($name, $arguments)
    {
        if(!isset($this->handle()[$name])){
            throw new MethodNotFoundException("MethodNotFoundException $name()", Data::class, __FUNCTION__);
        } if(!empty($arguments)){
            foreach ($arguments as $argument){
                $array[$argument] = $this->handle()[$name][$argument];
            } return $array;
        } return $this->handle()[$name];
    }

    public function validate($form, $checked, $role)
    {
        return isset($this->forms[$form]) && $this->inArray($checked, $this->forms[$form], 'inputsBlocked') ?
            false  : $this->inArray($checked, $this->handle(), $role);
    }

    private function inArray($checked, $array, $index)
    {
        if(isset($checked, $array[$index])){
            return in_array($checked, $array[$index]);
        }
    }

    abstract protected function handle();
}