<?php

use Illuminate\Support\Str;

function app_url(string $path = ''){

    //implode - соединить строки по слеш
    //trim убираем слеши слево и с право
    return implode('/', array_filter([

        trim(config('app.url'), '/'),

        trim($path, '/'),

    ]));


}


function uuid(string $path = '') : string
{
    return (string) Str::uuid();
}

function code() : string
{
    return (string) rand(100_000, 999_999);
}

