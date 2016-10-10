<?php

namespace App\Services;

class InputService 
{

	public function crawlers($request)
	{
        $childs = [];
        $newInput = [];

        foreach($request as $key => $value)
        {
            if(strpos($key, 'child_') !== false){
                $childs[] = [
                    str_replace('child_', '', $key) => $value
                ];
            } else {
                $newInput[$key] = $value;
            }
        }

        return array_merge($newInput, ['child_class' => json_encode($childs)]);
	}
}