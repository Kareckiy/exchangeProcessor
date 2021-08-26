<?php

namespace ExchangeProcessor\Clients;

interface ClientContract
{
    public function getPairs(): array;

    public function getOHLC(string $pair, string $interval, int|string $since): array;
}
