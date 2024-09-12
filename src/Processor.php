<?php

namespace ExchangeProcessor;

use Illuminate\Support\Facades\App;

class Processor
{
    private array $processors;

    private array $methods;

    public function __construct(array $processors = [], array $methods = [])
    {
        $this->setProcessors($processors);
        $this->setMethods($methods);
    }

    public function setProcessors(array $processors = []): self
    {
        $this->processors = [];

        foreach ($processors as $processor) {
            $this->processors[] = App::make($processor);
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

        foreach ($this->processors as $processor) {
            $exchangeName = $processor->getName();

            foreach ($this->methods as $method => $arguments) {
                $result[$exchangeName][$method] = $processor->$method(...$arguments);
            }
        }

        return $result;
    }
}
