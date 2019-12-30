<?php

namespace lorenzoaiello\LaravelIPWhitelisting;

use Exception;

class NotWhitelistedException extends Exception
{
    public static function IPNotAllowed($source_ip)
    {
        return new static('The IP Address '.$source_ip.' is not allowed.');
    }
}