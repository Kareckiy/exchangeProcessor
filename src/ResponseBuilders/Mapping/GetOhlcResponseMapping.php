<?php

namespace ExchangeProcessor\ResponseBuilders\Mapping;

class GetOhlcResponseMapping
{
    private ?string $pairNameField;
    private ?string $timeField;
    private ?string $openPriceField;
    private ?string $highPriceField;
    private ?string $lowPriceField;
    private ?string $closePriceField;
    private ?string $midPriceField;
    private ?string $volumeField;
    private ?int $countField;

    public function __construct(
        ?string $pairNameField = null,
        ?string $timeField = null,
        ?string $openPriceField = null,
        ?string $highPriceField = null,
        ?string $lowPriceField = null,
        ?string $closePriceField = null,
        ?string $midPriceField = null,
        ?string $volumeField = null,
        ?int $countField = null
    )
    {
        $this->pairNameField = $pairNameField;
        $this->timeField = $timeField;
        $this->openPriceField = $openPriceField;
        $this->highPriceField = $highPriceField;
        $this->lowPriceField = $lowPriceField;
        $this->closePriceField = $closePriceField;
        $this->midPriceField = $midPriceField;
        $this->volumeField = $volumeField;
        $this->countField = $countField;
    }

    public function getPairNameField(): ?string
    {
        return $this->pairNameField;
    }

    public function getTimeField(): ?string
    {
        return $this->timeField;
    }

    public function getOpenPriceField(): ?string
    {
        return $this->openPriceField;
    }

    public function getClosePriceField(): ?string
    {
        return $this->closePriceField;
    }

    public function getHighPriceField(): ?string
    {
        return $this->highPriceField;
    }

    public function getLowPriceField(): ?string
    {
        return $this->lowPriceField;
    }

    public function getMidPriceField(): ?string
    {
        return $this->midPriceField;
    }

    public function getVolumeField(): ?string
    {
        return $this->volumeField;
    }

    public function getCountField(): ?int
    {
        return $this->countField;
    }
}
