<?php

namespace Adaehne\RiotApiWrapper\LOL;

use Adaehne\RiotApiWrapper\Exceptions\RequestExceptions;
use Adaehne\RiotApiWrapper\LOL\Options\MatchesOPT;
use Adaehne\RiotApiWrapper\Regions;
use Adaehne\RiotApiWrapper\Request\RequestHandler;

class Matches
{
    /** @var string $basePath */
    protected string $basePath = '/lol/match/v5';

    /** @var RequestHandler $requestHandler */
    protected RequestHandler $requestHandler;

    /** @var string $platform */
    protected string $platform;

    /**
     * @param RequestHandler $requestHandler
     * @param string $platform
     */
    public function __construct(RequestHandler $requestHandler, string $platform)
    {
        $this->requestHandler = $requestHandler;
        $this->platform = $platform;
    }

    /**
     * @param string $puuid
     * @param array $options
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function ids(string $puuid, array $options = []): mixed
    {
        $path = $this->setPath('/matches/by-puuid/' . $puuid . '/ids' . MatchesOPT::ids($options));
        return $this->requestHandler->getResponse($path);
    }

    /**
     * @param string $matchId
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function match(string $matchId): mixed
    {
        $path = $this->setPath('/matches/' . $matchId);
        return $this->requestHandler->getResponse($path);
    }

    /**
     * @param string $matchId
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function timeline(string $matchId): mixed
    {
        $path = $this->setPath('/matches/' . $matchId . '/timeline');
        return $this->requestHandler->getResponse($path);
    }

    /**
     * @param string $subPath
     * @return string
     * @throws \Exception
     */
    private function setPath(string $subPath = ''): string
    {
        $baseUri = Regions::getRegionPath($this->platform);
        return 'https://' . $baseUri . $this->basePath . $subPath;
    }
}