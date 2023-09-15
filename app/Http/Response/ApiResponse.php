<?php

namespace App\Http\Response;

use Illuminate\Http\Response;

class ApiResponse extends Response
{
    public $headers = ['Content-Type'=>'application/json; charset=utf-8'];
}
