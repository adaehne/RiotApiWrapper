<?php

namespace Adaehne\RiotApiWrapper\TFT;

use Adaehne\RiotApiWrapper\TFT\League;
use Adaehne\RiotApiWrapper\TFT\Matches;
use Adaehne\RiotApiWrapper\TFT\Status;
use Adaehne\RiotApiWrapper\TFT\Summoner;
use Adaehne\RiotApiWrapper\Request\RequestHandler;

class TFT
{
    protected RequestHandler $requestHandler;

    /**
     * @param RequestHandler $requestHandler
     */
    public function __construct(RequestHandler $requestHandler){
        $this->requestHandler = $requestHandler;
    }

    /**
     * @param string $platform
     * @return \Adaehne\RiotApiWrapper\TFT\League
     */
    public function League(string $platform): League
    {
        return (new League($this->requestHandler,$platform));
    }

    /**
     * @param string $region
     * @return \Adaehne\RiotApiWrapper\TFT\Matches
     */
    public function Matches(string $region): Matches
    {
        return (new Matches($this->requestHandler,$region));
    }

    /**
     * @param string $platform
     * @return \Adaehne\RiotApiWrapper\TFT\Status
     */
    public function Status(string $platform): Status
    {
        return (new Status($this->requestHandler,$platform));
    }

    /**
     * @param string $platform
     * @return \Adaehne\RiotApiWrapper\TFT\Summoner
     */
    public function Summoner(string $platform): Summoner
    {
        return (new Summoner($this->requestHandler,$platform));
    }
}