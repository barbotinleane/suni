<?php

namespace App\Services;

class Clocker
{
    public function now(): string
    {
        return date('Y-m-d H:i:s');
    }
}
