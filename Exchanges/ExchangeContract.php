<?php

namespace Exchanges;

interface ExchangeContract
{
    public function getPairs(): array;

    public function getOHLC(string $pair, string $interval, int|string $since): array;
}
