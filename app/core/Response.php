<?php

namespace app\core;

class Response{

    public function setResponseCode(int $code){
        http_response_code($code);
    }
}