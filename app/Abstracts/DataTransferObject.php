<?php

namespace App\Abstracts;

use Illuminate\Contracts\Support\Arrayable;

abstract class DataTransferObject implements Arrayable
{
    public function toArray(): array
    {
        $output = [];

        foreach ($this as $key => $value) {
            if ($value) {
                $output[$key] = $value;
            }
        }

        return $output;
    }
}
