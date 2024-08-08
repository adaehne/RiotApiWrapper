<?php

namespace Adaehne\RiotApiWrapper;

use Adaehne\RiotApiWrapper\LOL\LOL;
use Adaehne\RiotApiWrapper\Request\RequestCache;
use Adaehne\RiotApiWrapper\Request\RequestHandler;
use Adaehne\RiotApiWrapper\Request\RequestInitiator;
use Adaehne\RiotApiWrapper\Riot\Riot;
use Adaehne\RiotApiWrapper\TFT\TFT;
use Symfony\Component\HttpClient\CachingHttpClient;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class RiotApiWrapper
{

    /** @var string|null $apiKey */
    protected $apiKey = null;

    protected $client;

    /** @var RequestInitiator $handler */
    private RequestInitiator $handler;

    /** @var RequestCache|null $cache */
    private RequestCache|null $cache = null;

    /**
     * @param string $riotKey
     */
    public function __construct(string $riotKey){
        $this->apiKey = $riotKey;
        $this->handler = $this->RequestInitiator();
        $this->client = $this->handler->getClient();
    }

    /**
     * @return RequestCache
     */
    public function Cache(): RequestCache
    {
        $this->cache = $this->RequestCache($this->client);
        return $this->cache;
    }

    /**
     * @return Riot
     */
    public function Riot(): Riot
    {
        return (new Riot(new RequestHandler($this->getClient(),$this->apiKey)));
    }

    /**
     * @return LOL
     */
    public function LOL(): LOL
    {
        return (new LOL(new RequestHandler($this->getClient(),$this->apiKey)));
    }

    /**
     * @return TFT
     */
    public function TFT(): TFT
    {
        return (new TFT(new RequestHandler($this->getClient(),$this->apiKey)));
    }


    /**
     * @return CachingHttpClient|HttpClient|HttpClientInterface
     */
    private function getClient(){
        if($this->cache){
            return $this->cache->getClient();
        }

        return $this->client;
    }

    /**
     * @return RequestInitiator
     */
    private function RequestInitiator(): RequestInitiator
    {
        return (new RequestInitiator());
    }

    /**
     * @param HttpClientInterface|HttpClient $client
     * @return RequestCache
     */
    private function RequestCache(HttpClientInterface|HttpClient $client): RequestCache
    {
        return (new RequestCache($client));
    }


}