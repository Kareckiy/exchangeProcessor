<?php

namespace ExchangeProcessor;

use Illuminate\Support\Facades\App;

class Processor
{
    private array $exchanges;

    private array $methods;

    public function __construct(array $exchanges = [], array $methods = [])
    {
        $this->setExchanges($exchanges);
        $this->setMethods($methods);
    }

    public function setExchanges(array $exchanges = []): self
    {
        $this->exchanges = [];

        foreach ($exchanges as $exchange) {
            $this->exchanges[] = App::make($exchange);
        }

        return $this;
    }

    public function setMethods(array $methods = []): self
    {
        $this->methods = $methods;

        return $this;
    }

    public function execute(): array
    {
        $result = [];

        foreach ($this->exchanges as $exchange) {
            $exchangeName = $exchange->getName();

            foreach ($this->methods as $method => $arguments) {
                $result[$exchangeName][$method] = $exchange->$method(...$arguments);
            }
        }

        return $result;
    }
}
