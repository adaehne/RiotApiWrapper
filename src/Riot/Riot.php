<?php

namespace Adaehne\RiotApiWrapper\Riot;

use Adaehne\RiotApiWrapper\Request\RequestHandler;
use Adaehne\RiotApiWrapper\RiotApiWrapper;
use Adaehne\RiotApiWrapper\Riot\Account;
use Symfony\Component\HttpClient\CachingHttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Riot
{

    protected RequestHandler $requestHandler;

    public function __construct(RequestHandler $requestHandler){
        $this->requestHandler = $requestHandler;
    }

    /**
     * @param string $region
     * @return \Adaehne\RiotApiWrapper\Riot\Account
     */
    public function Account(string $region) :Account
    {
        return (new Account($this->requestHandler,$region));
    }
}