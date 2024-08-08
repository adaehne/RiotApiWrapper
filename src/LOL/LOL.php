<?php

namespace Adaehne\RiotApiWrapper\LOL;

use Adaehne\RiotApiWrapper\LOL\ChampionMastery;
use Adaehne\RiotApiWrapper\LOL\Champion;
use Adaehne\RiotApiWrapper\LOL\Clash;
use Adaehne\RiotApiWrapper\LOL\LeagueExp;
use Adaehne\RiotApiWrapper\LOL\League;
use Adaehne\RiotApiWrapper\LOL\Challenges;
use Adaehne\RiotApiWrapper\LOL\Status;
use Adaehne\RiotApiWrapper\LOL\Matches;
use Adaehne\RiotApiWrapper\LOL\Spectator;
use Adaehne\RiotApiWrapper\LOL\Summoner;
use Adaehne\RiotApiWrapper\Request\RequestHandler;

class LOL
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
     * @return \Adaehne\RiotApiWrapper\LOL\ChampionMastery
     */
    public function ChampionMastery(string $platform) :ChampionMastery
    {
        return (new ChampionMastery($this->requestHandler,$platform));
    }

    /**
     * @param string $platform
     * @return \Adaehne\RiotApiWrapper\LOL\Champion
     */
    public function Champion(string $platform): Champion
    {
        return (new Champion($this->requestHandler,$platform));
    }

    /**
     * @param string $platform
     * @return \Adaehne\RiotApiWrapper\LOL\Clash
     */
    public function Clash(string $platform): Clash
    {
        return (new Clash($this->requestHandler,$platform));
    }

    /**
     * @param string $platform
     * @return \Adaehne\RiotApiWrapper\LOL\LeagueExp
     */
    public function LeagueExp(string $platform): LeagueExp
    {
        return (new LeagueExp($this->requestHandler,$platform));
    }

    /**
     * @param string $platform
     * @return \Adaehne\RiotApiWrapper\LOL\League
     */
    public function League(string $platform): League
    {
        return (new League($this->requestHandler,$platform));
    }

    /**
     * @param string $platform
     * @return \Adaehne\RiotApiWrapper\LOL\Challenges
     */
    public function Challenges(string $platform): Challenges
    {
        return (new Challenges($this->requestHandler,$platform));
    }

    /**
     * @param string $platform
     * @return \Adaehne\RiotApiWrapper\LOL\Status
     */
    public function Status(string $platform): Status
    {
        return (new Status($this->requestHandler,$platform));
    }

    /**
     * @param string $region
     * @return \Adaehne\RiotApiWrapper\LOL\Matches
     */
    public function Matches(string $region): Matches
    {
        return (new Matches($this->requestHandler,$region));
    }

    /**
     * @param string $platform
     * @return \Adaehne\RiotApiWrapper\LOL\Spectator
     */
    public function Spectator(string $platform): Spectator
    {
        return (new Spectator($this->requestHandler,$platform));
    }

    /**
     * @param string $platform
     * @return \Adaehne\RiotApiWrapper\LOL\Summoner
     */
    public function Summoner(string $platform): Summoner
    {
        return (new Summoner($this->requestHandler,$platform));
    }

    //TODO Tournament STUB
    //TODO Tournament
}