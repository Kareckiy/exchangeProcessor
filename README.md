# Exchanger
Package to process requests to crypto exchanges.

## Usage

### Example
```php
// Determine which exchanges are being contacted
$exchanges = [KrakenExchange::class];

// Determine what operations need to be performed
$methods = [
  'getPairs' => []
];

// Start processing
$result = (new Processor($exchanges, $methods))->execute();

// Get the data you want
$krakenPairs = $result['kraken']['getPairs'];
```
