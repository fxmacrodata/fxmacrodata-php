# FXMacroData SDK for PHP

Client for the [FXMacroData API](https://fxmacrodata.com/documentation/reference?utm_source=github&utm_medium=referral&utm_campaign=fxmacrodata-php&utm_content=readme): macroeconomic announcements with release timestamps, release calendars, FX reference rates, rate differentials, yield curves, COT positioning and commodities, sourced from central banks and statistics offices across 22 currencies.

USD endpoints work without an API key. Other currencies need a [subscription](https://fxmacrodata.com/subscribe?utm_source=github&utm_medium=referral&utm_campaign=fxmacrodata-php&utm_content=subscribe).

## Install

```bash
composer require fxmacrodata/fxmacrodata-php
```

## Quickstart

```php
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
```

The same file is in this repository at `examples/quickstart.php`.

## Authentication

The key is sent in the `X-API-Key` header and never in the URL. The quickstart reads it from the `FXMACRODATA_API_KEY` environment variable.

## API reference

All URIs are relative to *https://api.fxmacrodata.com*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*FXMacroDataApi* | [**getAnnouncementChanges**](docs/Api/FXMacroDataApi.md#getannouncementchanges) | **GET** /v1/announcements/changes | Poll recent live announcement release changes
*FXMacroDataApi* | [**getAnnouncements**](docs/Api/FXMacroDataApi.md#getannouncements) | **GET** /v1/announcements/{currency}/{indicator} | Get macroeconomic indicator data
*FXMacroDataApi* | [**getCalendar**](docs/Api/FXMacroDataApi.md#getcalendar) | **GET** /v1/calendar/{currency} | Get upcoming economic data release dates
*FXMacroDataApi* | [**getCommodities**](docs/Api/FXMacroDataApi.md#getcommodities) | **GET** /v1/commodities/{indicator} | Get commodity indicator data
*FXMacroDataApi* | [**getCot**](docs/Api/FXMacroDataApi.md#getcot) | **GET** /v1/cot/{currency} | Get CFTC Commitment of Traders (COT) data
*FXMacroDataApi* | [**getCurves**](docs/Api/FXMacroDataApi.md#getcurves) | **GET** /v1/curves/{currency} | Get curve analytics by currency
*FXMacroDataApi* | [**getDataCatalogue**](docs/Api/FXMacroDataApi.md#getdatacatalogue) | **GET** /v1/data_catalogue/{currency} | Get Currently Available Macroeconomic Indicators
*FXMacroDataApi* | [**getFactor**](docs/Api/FXMacroDataApi.md#getfactor) | **GET** /v1/factors/{currency}/{factor} | Get a precomputed FX factor for one currency
*FXMacroDataApi* | [**getFinancialPrices**](docs/Api/FXMacroDataApi.md#getfinancialprices) | **GET** /v1/financial_prices/{currency} | Official financial prices and yield curves
*FXMacroDataApi* | [**getForex**](docs/Api/FXMacroDataApi.md#getforex) | **GET** /v1/forex/{base}/{quote} | Get FX spot rates
*FXMacroDataApi* | [**getFxIntradayReferenceRates**](docs/Api/FXMacroDataApi.md#getfxintradayreferencerates) | **GET** /v1/fx/intraday-reference-rates/{base}/{quote} | Get subscriber intraday FX reference rates
*FXMacroDataApi* | [**getFxReferenceRates**](docs/Api/FXMacroDataApi.md#getfxreferencerates) | **GET** /v1/fx/reference-rates/{base}/{quote} | Get timestamped official FX reference rates
*FXMacroDataApi* | [**getFxSessionRates**](docs/Api/FXMacroDataApi.md#getfxsessionrates) | **GET** /v1/fx/session-rates/{base}/{quote} | Get official FX session-close reference rates
*FXMacroDataApi* | [**getFxSourceUniverse**](docs/Api/FXMacroDataApi.md#getfxsourceuniverse) | **GET** /v1/fx/source-universe | List public FX reference-rate pair universe
*FXMacroDataApi* | [**getFxSources**](docs/Api/FXMacroDataApi.md#getfxsources) | **GET** /v1/fx/sources | List public FX reference-rate sources
*FXMacroDataApi* | [**getHealth**](docs/Api/FXMacroDataApi.md#gethealth) | **GET** /v1/health | Ping the API
*FXMacroDataApi* | [**getLatestAnnouncements**](docs/Api/FXMacroDataApi.md#getlatestannouncements) | **GET** /v1/announcements/{currency}/latest | Get latest values for all indicators in a currency
*FXMacroDataApi* | [**getLatestCommodities**](docs/Api/FXMacroDataApi.md#getlatestcommodities) | **GET** /v1/commodities/latest | Get latest values for all commodity indicators
*FXMacroDataApi* | [**getMarketSessions**](docs/Api/FXMacroDataApi.md#getmarketsessions) | **GET** /v1/market_sessions | FX market session timetable
*FXMacroDataApi* | [**getPredictionCoverage**](docs/Api/FXMacroDataApi.md#getpredictioncoverage) | **GET** /v1/predictions/coverage | Which forecast publishers cover which currency (no API key)
*FXMacroDataApi* | [**getPredictionCoverageForCurrency**](docs/Api/FXMacroDataApi.md#getpredictioncoverageforcurrency) | **GET** /v1/predictions/coverage/{currency} | Per-indicator forecast coverage for one currency (no API key)
*FXMacroDataApi* | [**getPredictions**](docs/Api/FXMacroDataApi.md#getpredictions) | **GET** /v1/predictions/{currency}/{indicator} | List predictions for one indicator of a currency
*FXMacroDataApi* | [**getPressReleases**](docs/Api/FXMacroDataApi.md#getpressreleases) | **GET** /v1/press-releases/{currency} | Recent central bank press releases
*FXMacroDataApi* | [**getRateDifferentials**](docs/Api/FXMacroDataApi.md#getratedifferentials) | **GET** /v1/rate_differentials/{base}/{quote} | Get pair rate differentials
*FXMacroDataApi* | [**getRiskSentiment**](docs/Api/FXMacroDataApi.md#getrisksentiment) | **GET** /v1/risk_sentiment | Global risk-on / risk-off indicator
*FXMacroDataApi* | [**ping**](docs/Api/FXMacroDataApi.md#ping) | **GET** /v1/ping | Ping the API
*FXMacroDataApi* | [**researchPanel**](docs/Api/FXMacroDataApi.md#researchpanel) | **POST** /v1/research/panel | Build a panel of values known at each decision time

## Models

- [AnnouncementChangeEvent](docs/Model/AnnouncementChangeEvent.md)
- [AnnouncementChangesResponse](docs/Model/AnnouncementChangesResponse.md)
- [AnnouncementChangesScope](docs/Model/AnnouncementChangesScope.md)
- [AnnouncementDataPoint](docs/Model/AnnouncementDataPoint.md)
- [AnnouncementPredictions](docs/Model/AnnouncementPredictions.md)
- [AnnouncementProvenance](docs/Model/AnnouncementProvenance.md)
- [AnnouncementRemap](docs/Model/AnnouncementRemap.md)
- [AnnouncementResponse](docs/Model/AnnouncementResponse.md)
- [CBTargetEntry](docs/Model/CBTargetEntry.md)
- [CBTargetInfo](docs/Model/CBTargetInfo.md)
- [COTDataPoint](docs/Model/COTDataPoint.md)
- [COTFXOverlay](docs/Model/COTFXOverlay.md)
- [COTPaginationInfo](docs/Model/COTPaginationInfo.md)
- [COTProvenance](docs/Model/COTProvenance.md)
- [COTResponse](docs/Model/COTResponse.md)
- [CalendarReleaseRow](docs/Model/CalendarReleaseRow.md)
- [CalendarResponse](docs/Model/CalendarResponse.md)
- [CatalogueCoverage](docs/Model/CatalogueCoverage.md)
- [CatalogueSeriesVariant](docs/Model/CatalogueSeriesVariant.md)
- [CatalogueSupportedOptions](docs/Model/CatalogueSupportedOptions.md)
- [CommoditiesLatestResponse](docs/Model/CommoditiesLatestResponse.md)
- [CommodityCoverage](docs/Model/CommodityCoverage.md)
- [CommodityCoverageSegment](docs/Model/CommodityCoverageSegment.md)
- [CommodityDataPoint](docs/Model/CommodityDataPoint.md)
- [CommodityLatestItem](docs/Model/CommodityLatestItem.md)
- [CommodityMissingWeekdayRange](docs/Model/CommodityMissingWeekdayRange.md)
- [CommodityObservation](docs/Model/CommodityObservation.md)
- [CommodityResponse](docs/Model/CommodityResponse.md)
- [CurveAnalyticsResponse](docs/Model/CurveAnalyticsResponse.md)
- [DataCatalogueItem](docs/Model/DataCatalogueItem.md)
- [DataQuality](docs/Model/DataQuality.md)
- [FactorDataPoint](docs/Model/FactorDataPoint.md)
- [FactorResponse](docs/Model/FactorResponse.md)
- [FinancialCoverage](docs/Model/FinancialCoverage.md)
- [FinancialObservation](docs/Model/FinancialObservation.md)
- [FinancialPagination](docs/Model/FinancialPagination.md)
- [FinancialPriceResponse](docs/Model/FinancialPriceResponse.md)
- [FinancialSource](docs/Model/FinancialSource.md)
- [ForexDataPoint](docs/Model/ForexDataPoint.md)
- [ForexPairMetadata](docs/Model/ForexPairMetadata.md)
- [ForexPointSource](docs/Model/ForexPointSource.md)
- [ForexProvenance](docs/Model/ForexProvenance.md)
- [ForexResponse](docs/Model/ForexResponse.md)
- [FreemiumDelayNotice](docs/Model/FreemiumDelayNotice.md)
- [FreemiumWindow](docs/Model/FreemiumWindow.md)
- [FxIntradayReferenceRatePoint](docs/Model/FxIntradayReferenceRatePoint.md)
- [FxIntradayReferenceRatesResponse](docs/Model/FxIntradayReferenceRatesResponse.md)
- [FxReferencePoint](docs/Model/FxReferencePoint.md)
- [FxReferenceResponse](docs/Model/FxReferenceResponse.md)
- [FxSessionRatePoint](docs/Model/FxSessionRatePoint.md)
- [FxSessionRateResponse](docs/Model/FxSessionRateResponse.md)
- [FxSource](docs/Model/FxSource.md)
- [FxSourceLeg](docs/Model/FxSourceLeg.md)
- [FxSourcePolicy](docs/Model/FxSourcePolicy.md)
- [FxSourceUniverseEntry](docs/Model/FxSourceUniverseEntry.md)
- [FxSourceUniversePair](docs/Model/FxSourceUniversePair.md)
- [FxSourceUniverseResponse](docs/Model/FxSourceUniverseResponse.md)
- [FxSourcesResponse](docs/Model/FxSourcesResponse.md)
- [HTTPValidationError](docs/Model/HTTPValidationError.md)
- [IndicatorPaginationInfo](docs/Model/IndicatorPaginationInfo.md)
- [LatestAnnouncementItem](docs/Model/LatestAnnouncementItem.md)
- [LatestAnnouncementProvenance](docs/Model/LatestAnnouncementProvenance.md)
- [LatestAnnouncementValue](docs/Model/LatestAnnouncementValue.md)
- [LatestAnnouncementsProvenance](docs/Model/LatestAnnouncementsProvenance.md)
- [LatestAnnouncementsResponse](docs/Model/LatestAnnouncementsResponse.md)
- [MarketSession](docs/Model/MarketSession.md)
- [MarketSessionOverlap](docs/Model/MarketSessionOverlap.md)
- [MarketSessionsResponse](docs/Model/MarketSessionsResponse.md)
- [OfficialForwardSourceSupport](docs/Model/OfficialForwardSourceSupport.md)
- [Pagination](docs/Model/Pagination.md)
- [PointInTimeCompleteness](docs/Model/PointInTimeCompleteness.md)
- [PolicyFamilyEntry](docs/Model/PolicyFamilyEntry.md)
- [PredictionItem](docs/Model/PredictionItem.md)
- [PredictionProvenance](docs/Model/PredictionProvenance.md)
- [PredictionsResponse](docs/Model/PredictionsResponse.md)
- [PressRelease](docs/Model/PressRelease.md)
- [PressReleaseRatePath](docs/Model/PressReleaseRatePath.md)
- [PressReleasesResponse](docs/Model/PressReleasesResponse.md)
- [RateDifferentialPoint](docs/Model/RateDifferentialPoint.md)
- [RateDifferentialResponse](docs/Model/RateDifferentialResponse.md)
- [RateDifferentialSources](docs/Model/RateDifferentialSources.md)
- [RatePathMatch](docs/Model/RatePathMatch.md)
- [ReleaseDeliveryAnnouncement](docs/Model/ReleaseDeliveryAnnouncement.md)
- [ReleaseTiming](docs/Model/ReleaseTiming.md)
- [ResearchPanelRequest](docs/Model/ResearchPanelRequest.md)
- [ResearchPanelResponse](docs/Model/ResearchPanelResponse.md)
- [ResearchSeries](docs/Model/ResearchSeries.md)
- [RevisionEntry](docs/Model/RevisionEntry.md)
- [RiskSentimentAliases](docs/Model/RiskSentimentAliases.md)
- [RiskSentimentComponentCoverage](docs/Model/RiskSentimentComponentCoverage.md)
- [RiskSentimentComponentMetadata](docs/Model/RiskSentimentComponentMetadata.md)
- [RiskSentimentPoint](docs/Model/RiskSentimentPoint.md)
- [RiskSentimentResponse](docs/Model/RiskSentimentResponse.md)
- [SelectedSeries](docs/Model/SelectedSeries.md)
- [SeriesFilters](docs/Model/SeriesFilters.md)
- [ServiceStatusResponse](docs/Model/ServiceStatusResponse.md)
- [SourceProvenance](docs/Model/SourceProvenance.md)
- [ValidationError](docs/Model/ValidationError.md)

## Versioning

This client is generated from the FXMacroData OpenAPI specification, so it tracks the API one to one. Report problems at https://github.com/fxmacrodata/fxmacrodata-php/issues.

## Licence

MIT
