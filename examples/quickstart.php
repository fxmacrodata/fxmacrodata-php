<?php
// Quickstart: latest US policy rate, release calendar and catalogue.
// USD works without a key; set FXMACRODATA_API_KEY for other currencies.
require_once __DIR__ . '/../vendor/autoload.php';

$config = FXMacroData\Configuration::getDefaultConfiguration();
$key = getenv('FXMACRODATA_API_KEY');
if ($key) {
    $config->setApiKey('X-API-Key', $key);
}

$api = new FXMacroData\Api\FXMacroDataApi(new GuzzleHttp\Client(), $config);

$rates = $api->getAnnouncements('USD', 'policy_rate');
$latest = $rates->getData()[0] ?? null;
if ($latest === null) {
    fwrite(STDERR, "no observations returned\n");
    exit(1);
}
printf("USD policy rate: %s on %s\n", $latest->getVal(), $latest->getDate());

$api->getCalendar('USD');

$catalogue = $api->getDataCatalogue('USD');
printf("USD catalogue: %d indicators\n", count($catalogue));
