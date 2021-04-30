<?php

namespace App\Packages\ExchangeProcessor\Exchanges;

use GuzzleHttp\Client;
use Exception;

abstract class BaseExchange implements ExchangeContract
{
    protected string $apiKey;

    protected string $name;

    protected Client $client;

    public function __construct()
    {
        $this->makeName();
        $this->setClient();

        try {
            $this->apiKey = config(sprintf("exchanges.%s.apiKey", $this->name));
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    protected function setClient(): void
    {
        $client = new Client(['base_uri' => config(sprintf("exchanges.%s.apiUrl", $this->name))]);
        $this->client = $client;
    }

    protected function makeName(): void
    {
        $name = (new \ReflectionClass($this))->getShortName();
        $name = strtolower($name);

        $this->name = str_replace("exchange", "", $name);
    }
}
