<?php

namespace Adaehne\RiotApiWrapper\LOL;

use Adaehne\RiotApiWrapper\Exceptions\RequestExceptions;
use Adaehne\RiotApiWrapper\Regions;
use Adaehne\RiotApiWrapper\Request\RequestHandler;

class Champion
{
    /** @var string $basePath */
    protected string $basePath = '/lol/platform/v3';

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
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function rotations(): mixed
    {
        $path = $this->setPath('/champion-rotations');
        return $this->requestHandler->getResponse($path);
    }

    /**
     * @param string $subPath
     * @return string
     * @throws \Exception
     */
    private function setPath(string $subPath = ''): string
    {
        $baseUri = Regions::getPlatformPath($this->platform);
        return 'https://' . $baseUri . $this->basePath . $subPath;
    }
}