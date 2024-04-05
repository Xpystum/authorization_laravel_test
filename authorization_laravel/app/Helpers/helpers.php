<?php



function app_url(string $path = ''){

    //implode - соединить строки по слеш
    //trim убираем слеши слево и с право
    return implode('/', [

        trim(config('app.url'), '/'),

        trim($path, '/'),

    ]);


}

