# FXMacroData\FXMacroDataApi

FXMacroData REST API

All URIs are relative to https://api.fxmacrodata.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getAnnouncementChanges()**](FXMacroDataApi.md#getAnnouncementChanges) | **GET** /v1/announcements/changes | Poll recent live announcement release changes |
| [**getAnnouncements()**](FXMacroDataApi.md#getAnnouncements) | **GET** /v1/announcements/{currency}/{indicator} | Get macroeconomic indicator data |
| [**getCalendar()**](FXMacroDataApi.md#getCalendar) | **GET** /v1/calendar/{currency} | Get upcoming economic data release dates |
| [**getCommodities()**](FXMacroDataApi.md#getCommodities) | **GET** /v1/commodities/{indicator} | Get commodity indicator data |
| [**getCot()**](FXMacroDataApi.md#getCot) | **GET** /v1/cot/{currency} | Get CFTC Commitment of Traders (COT) data |
| [**getCurves()**](FXMacroDataApi.md#getCurves) | **GET** /v1/curves/{currency} | Get curve analytics by currency |
| [**getDataCatalogue()**](FXMacroDataApi.md#getDataCatalogue) | **GET** /v1/data_catalogue/{currency} | Get Currently Available Macroeconomic Indicators |
| [**getFactor()**](FXMacroDataApi.md#getFactor) | **GET** /v1/factors/{currency}/{factor} | Get a precomputed FX factor for one currency |
| [**getFinancialPrices()**](FXMacroDataApi.md#getFinancialPrices) | **GET** /v1/financial_prices/{currency} | Official financial prices and yield curves |
| [**getForex()**](FXMacroDataApi.md#getForex) | **GET** /v1/forex/{base}/{quote} | Get FX spot rates |
| [**getFxIntradayReferenceRates()**](FXMacroDataApi.md#getFxIntradayReferenceRates) | **GET** /v1/fx/intraday-reference-rates/{base}/{quote} | Get subscriber intraday FX reference rates |
| [**getFxReferenceRates()**](FXMacroDataApi.md#getFxReferenceRates) | **GET** /v1/fx/reference-rates/{base}/{quote} | Get timestamped official FX reference rates |
| [**getFxSessionRates()**](FXMacroDataApi.md#getFxSessionRates) | **GET** /v1/fx/session-rates/{base}/{quote} | Get official FX session-close reference rates |
| [**getFxSourceUniverse()**](FXMacroDataApi.md#getFxSourceUniverse) | **GET** /v1/fx/source-universe | List public FX reference-rate pair universe |
| [**getFxSources()**](FXMacroDataApi.md#getFxSources) | **GET** /v1/fx/sources | List public FX reference-rate sources |
| [**getHealth()**](FXMacroDataApi.md#getHealth) | **GET** /v1/health | Ping the API |
| [**getLatestAnnouncements()**](FXMacroDataApi.md#getLatestAnnouncements) | **GET** /v1/announcements/{currency}/latest | Get latest values for all indicators in a currency |
| [**getLatestCommodities()**](FXMacroDataApi.md#getLatestCommodities) | **GET** /v1/commodities/latest | Get latest values for all commodity indicators |
| [**getMarketSessions()**](FXMacroDataApi.md#getMarketSessions) | **GET** /v1/market_sessions | FX market session timetable |
| [**getPredictionCoverage()**](FXMacroDataApi.md#getPredictionCoverage) | **GET** /v1/predictions/coverage | Which forecast publishers cover which currency (no API key) |
| [**getPredictionCoverageForCurrency()**](FXMacroDataApi.md#getPredictionCoverageForCurrency) | **GET** /v1/predictions/coverage/{currency} | Per-indicator forecast coverage for one currency (no API key) |
| [**getPredictions()**](FXMacroDataApi.md#getPredictions) | **GET** /v1/predictions/{currency}/{indicator} | List predictions for one indicator of a currency |
| [**getPressReleases()**](FXMacroDataApi.md#getPressReleases) | **GET** /v1/press-releases/{currency} | Recent central bank press releases |
| [**getRateDifferentials()**](FXMacroDataApi.md#getRateDifferentials) | **GET** /v1/rate_differentials/{base}/{quote} | Get pair rate differentials |
| [**getRiskSentiment()**](FXMacroDataApi.md#getRiskSentiment) | **GET** /v1/risk_sentiment | Global risk-on / risk-off indicator |
| [**ping()**](FXMacroDataApi.md#ping) | **GET** /v1/ping | Ping the API |
| [**researchPanel()**](FXMacroDataApi.md#researchPanel) | **POST** /v1/research/panel | Build a panel of values known at each decision time |


## `getAnnouncementChanges()`

```php
getAnnouncementChanges($currencies, $indicators, $since, $limit, $payload): \FXMacroData\Model\AnnouncementChangesResponse
```

Poll recent live announcement release changes

Returns recent live announcement release events from the same durable fanout used by the real-time SSE stream. Use `next_cursor` as the `since` value on the next poll. This endpoint is intended for serverless clients that cannot hold a persistent SSE connection.  **Authentication:** USD events are available without an API key. Non-USD currencies require a paid API key supplied via `api_key` or `X-API-Key`.  **Free access is delayed.** Without an API key this feed is held back by 15 minutes: an event is delivered once it is 15 minutes old, and `next_cursor` stops at the delay cutoff so nothing is skipped. The response carries a `freemium_delay` object naming the cutoff, how many events are being withheld, and when the next one becomes available. An Individual or Business API key removes the delay; `/v1/stream/events` pushes the same events in real time.  **Retention:** Events are retained for the configured fanout window, currently exposed in `retention_seconds`. If a client is offline longer than that window, re-bootstrap from `/v1/announcements/{currency}/latest` and continue polling changes.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: APIKeyHeader
$config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new FXMacroData\Api\FXMacroDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$currencies = 'currencies_example'; // string | Optional query parameter. Comma-separated currency codes, `g10`, or `all`. Without a paid API key the result is restricted to USD.
$indicators = 'indicators_example'; // string | Optional query parameter. Optional comma-separated announcement indicator slugs. Allowed values: afe_dollar_index, average_hourly_earnings, average_hourly_earnings_mom, balance_on_goods, balance_on_services, bgcr, breakeven_inflation_rate, broad_dollar_index, broad_money, building_approvals, building_permits, business_confidence, capital_account_balance, cb_assets, commodity_price_energy, commodity_price_ex_energy, commodity_price_index, commodity_prices, consumer_confidence, core_inflation, core_inflation_median, core_inflation_mom, core_inflation_trim, core_pce, core_pce_mom, credit_growth, crude_oil_inventories, current_account_balance, dairy_exports, deposit_rates, durable_goods_orders, effr, eme_dollar_index, employment, exports, financial_account_balance, foreign_reserves, full_time_employment, fx_reserves, gdp, gdp_growth_q4_yoy, gold_reserves, gov_bond_10y, gov_bond_15y, gov_bond_1_5m, gov_bond_1m, gov_bond_1y, gov_bond_20y, gov_bond_25y, gov_bond_2m, gov_bond_2y, gov_bond_30y, gov_bond_3m, gov_bond_3y, gov_bond_40y, gov_bond_4m, gov_bond_4y, gov_bond_5y, gov_bond_6m, gov_bond_6y, gov_bond_7y, gov_bond_8y, gov_bond_9y, government_debt, house_price_index, house_prices, household_credit, household_spending, housing_starts, imports, inflation, inflation_linked_bond, inflation_mom, initial_jobless_claims, international_assets, international_liabilities, job_openings, m1, m2, m3, nairu, natural_gas_storage, net_foreign_asset_position, non_farm_payrolls, non_farm_payrolls_change, obfr, part_time_employment, participation_rate, pce, pce_mom, policy_rate, policy_rate_midpoint, policy_rate_mlf, policy_rate_mro, policy_rate_target_lower, ppi, primary_income_balance, real_yield_20y, real_yield_30y, real_yield_5y, real_yield_7y, retail_sales, retail_sales_control_group, retail_sales_ex_autos, retail_sales_ex_autos_and_gas, risk_free_rate, secondary_income_balance, sight_deposits, snb_balance_sheet, sofr_average_180d, sofr_average_30d, sofr_average_90d, sofr_index, terms_of_trade, tgcr, trade_balance, trade_weighted_index, trimmed_mean_inflation, unemployment, wage_price_index, wages.
$since = 'since_example'; // string | Optional query parameter. Cursor returned as `next_cursor` by the previous response. ISO 8601 timestamps and Unix epoch seconds are also accepted.
$limit = 100; // int | Optional query parameter. Maximum number of matching change events to return.
$payload = 'payload_example'; // string | Optional query parameter. Use `compact` for trigger payloads or `full` for row fields. Allowed values: compact, full.

try {
    $result = $apiInstance->getAnnouncementChanges($currencies, $indicators, $since, $limit, $payload);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FXMacroDataApi->getAnnouncementChanges: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **currencies** | **string**| Optional query parameter. Comma-separated currency codes, &#x60;g10&#x60;, or &#x60;all&#x60;. Without a paid API key the result is restricted to USD. | [optional] |
| **indicators** | **string**| Optional query parameter. Optional comma-separated announcement indicator slugs. Allowed values: afe_dollar_index, average_hourly_earnings, average_hourly_earnings_mom, balance_on_goods, balance_on_services, bgcr, breakeven_inflation_rate, broad_dollar_index, broad_money, building_approvals, building_permits, business_confidence, capital_account_balance, cb_assets, commodity_price_energy, commodity_price_ex_energy, commodity_price_index, commodity_prices, consumer_confidence, core_inflation, core_inflation_median, core_inflation_mom, core_inflation_trim, core_pce, core_pce_mom, credit_growth, crude_oil_inventories, current_account_balance, dairy_exports, deposit_rates, durable_goods_orders, effr, eme_dollar_index, employment, exports, financial_account_balance, foreign_reserves, full_time_employment, fx_reserves, gdp, gdp_growth_q4_yoy, gold_reserves, gov_bond_10y, gov_bond_15y, gov_bond_1_5m, gov_bond_1m, gov_bond_1y, gov_bond_20y, gov_bond_25y, gov_bond_2m, gov_bond_2y, gov_bond_30y, gov_bond_3m, gov_bond_3y, gov_bond_40y, gov_bond_4m, gov_bond_4y, gov_bond_5y, gov_bond_6m, gov_bond_6y, gov_bond_7y, gov_bond_8y, gov_bond_9y, government_debt, house_price_index, house_prices, household_credit, household_spending, housing_starts, imports, inflation, inflation_linked_bond, inflation_mom, initial_jobless_claims, international_assets, international_liabilities, job_openings, m1, m2, m3, nairu, natural_gas_storage, net_foreign_asset_position, non_farm_payrolls, non_farm_payrolls_change, obfr, part_time_employment, participation_rate, pce, pce_mom, policy_rate, policy_rate_midpoint, policy_rate_mlf, policy_rate_mro, policy_rate_target_lower, ppi, primary_income_balance, real_yield_20y, real_yield_30y, real_yield_5y, real_yield_7y, retail_sales, retail_sales_control_group, retail_sales_ex_autos, retail_sales_ex_autos_and_gas, risk_free_rate, secondary_income_balance, sight_deposits, snb_balance_sheet, sofr_average_180d, sofr_average_30d, sofr_average_90d, sofr_index, terms_of_trade, tgcr, trade_balance, trade_weighted_index, trimmed_mean_inflation, unemployment, wage_price_index, wages. | [optional] |
| **since** | **string**| Optional query parameter. Cursor returned as &#x60;next_cursor&#x60; by the previous response. ISO 8601 timestamps and Unix epoch seconds are also accepted. | [optional] |
| **limit** | **int**| Optional query parameter. Maximum number of matching change events to return. | [optional] [default to 100] |
| **payload** | **string**| Optional query parameter. Use &#x60;compact&#x60; for trigger payloads or &#x60;full&#x60; for row fields. Allowed values: compact, full. | [optional] |

### Return type

[**\FXMacroData\Model\AnnouncementChangesResponse**](../Model/AnnouncementChangesResponse.md)

### Authorization

[APIKeyHeader](../../README.md#APIKeyHeader)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAnnouncements()`

```php
getAnnouncements($currency, $indicator, $start_date, $end_date, $series_mode, $limit, $offset, $page, $seasonality, $frequency, $annualization, $period_aggregation, $revisions, $basis, $official_only, $as_of, $availability, $dataset_version, $value_mode): \FXMacroData\Model\AnnouncementResponse
```

Get macroeconomic indicator data

Fetches historical data for a given macroeconomic indicator of a currency.  **Authentication & limits:** - USD data is publicly accessible without an API key, but anonymous callers are limited to the most recent 90 days. Requests for an earlier `start_date` are clamped to that 90-day window, and the response then carries a `freemium_window` object naming the cutoff so a shortened history is distinguishable from a short series. - Anonymous USD data is also delayed by 15 minutes. A release is served once it is 15 minutes old; until then it is withheld, and `latest_available_date` reports the newest observation the caller can actually read. Every anonymous response carries a `freemium_delay` object naming the cutoff, the number of withheld releases and when the next one becomes available. An API key removes the delay. - All other currencies require an Individual or Business API key supplied via `?api_key=<key>` or the `X-API-Key` header. - Authenticated callers (any valid API key) receive the full requested history for every supported currency, including USD.  **Path Parameters:** - `currency`: The 3-letter currency code (USD, AUD, EUR, GBP, CHF). - `indicator`: The indicator name (e.g., inflation, unemployment).  **Query Parameters:** - `start_date`: Optional. Start date in YYYY-MM-DD format. When omitted by authenticated callers, the endpoint pages through the full available history. Anonymous USD requests are capped to the freemium window. - `end_date`: Optional. End date in YYYY-MM-DD format. Defaults to today.  - `limit`: Optional page size. Defaults to 20. - `page`: Optional one-based page number. When provided, it takes precedence over `offset`. - `offset`: Optional zero-based row offset for offset-based pagination.  - `series_mode`: Optional. `raw` (default) selects the direct underlying indicator series; `canonical` applies configured remaps. - `value_mode`: `normalized` (default) returns presentation-ready values. `source` requires `series_mode=raw` and returns values and revision values as published by the source, without normalization, derived changes, companion fills or carry-forward. Use source mode for historical research. The response declares `value_mode` and `value_metadata.source_unit`; an unknown source unit is null.  **Empty windows:** - A valid series with no observations inside the requested window returns `200` with `data: []`, `requested_window_has_data: false`, and a `no_data` object carrying `error_code`, `latest_available_date`, `recommended_start_date` and `available_observation_count`. This is a successful query, not an error, and should not be retried; widen the window instead. - Anonymous USD callers see this whenever a quarterly or annual series' latest observation predates the 90-day freemium window; `no_data.freemium_clamped` marks that case. - `404` on this endpoint means the currency or indicator slug is not published. Use `/v1/data_catalogue/{currency}` to list valid slugs.  **Response fields:** - `remap`: Metadata about the canonical remap rule application (`applied`, `rule_id`, segments, and transform mode). - `has_official_forecast`: Whether the relevant central bank or statistics agency publishes a preliminary, flash, or advance estimate of this indicator before the main/final data release. - `earliest_available_date` / `latest_available_date`: The full coverage span available in the response window before any pagination is applied. - `pagination`: Page metadata for the returned `data[]` slice (`limit`, `offset`, `returned_count`, `total_count`, `has_more`, `next_offset`). - `data[].announcement_id`: Stable identifier for this unique announcement, in the form `{currency}_{indicator}_{date}` (lowercase, e.g. `usd_inflation_2026-01-31`). Use this to join predictions from `/v1/predictions/{currency}/{indicator}` and revision history back to the underlying observation. - `data[].announcement_datetime`: Release timestamp as Unix epoch seconds (UTC). - `data[].announcement_datetime_local`: ISO 8601 release time with offset, rendered in the source agency's local timezone (e.g. USD → America/New_York, AUD → Australia/Sydney). - `data[].official_planned_release_datetime`: Official planned release timestamp from the publisher's release calendar, as Unix epoch seconds (UTC). Present when the release was captured against a pre-announced official release time. - `data[].official_actual_release_datetime`: Official release timestamp on the source row, as Unix epoch seconds (UTC). This is normally the same as `announcement_datetime` unless the source exposes a separate publication timestamp. - `data[].collected_at_ns` / `data[].collected_at_iso`: Exact time FXMacroData first captured this row from the official source. - `data[].release_timing`: On rows captured at release time, the three times for that release: `scheduled_at` (official schedule), the government publication window `published_after` / `published_by` bounded by reads of the official source (null when it could not be bounded; not a publisher-supplied timestamp), and `collected_at` (when FXMacroData captured the value). Rows that record it also carry `available_at` (when the value was readable through the API) with `pickup_ms_min` / `pickup_ms_max`, the milliseconds from the publication window to `available_at`; these are null when not recorded. - `data[].ingestion_latency_ms`: Milliseconds from the official planned release timestamp to collection time when a planned timestamp is known; otherwise from the official actual release timestamp. - `source_series_name`: The actual underlying source series used for this standardized indicator. - `value_name`: The actual series name used for the returned `val`. For `policy_rate`, this is the canonical policy-series label chosen by the platform (for example, ECB Deposit Facility Rate or Federal Funds Target Range Upper Bound). - `source_local_name`: Official local-language series label when available. - `is_proxy`: True when the standardized indicator is populated using a documented proxy rather than a directly named national headline series. - `proxy_note`: Short explanation of the proxy choice when `is_proxy=true`. - `policy_role`: For `policy_rate`, the role of the canonical rate inside its official rate family (for example `primary` or `target_upper`). - `policy_structure`: For `policy_rate`, the policy-regime structure such as `single_primary`, `target_range`, `primary_plus_corridor`, or `non_rate_regime`. - `comparison_compatible`: For `policy_rate`, whether the returned `val` can be honestly used in cross-country policy-rate comparisons. - `policy_family`: Optional top-level metadata listing sibling policy-rate indicators in the same official family. - `data[].predicted_value` *(deprecated — use `/v1/predictions/{currency}/{indicator}` instead)*: Market or professional-forecaster expectation for this indicator reading, in the same units as `val`. Present only where a prediction source is available. - `data[].prediction_type` *(deprecated — use `/v1/predictions/{currency}/{indicator}` instead)*: Legacy per-source category. See `prediction_class` on `/v1/predictions` for the consolidated axis: `market_consensus` covers both compiled consensus and forecaster surveys, and `market_prediction` is market-implied, not a survey. - `data[].prediction_source` *(deprecated — use `/v1/predictions/{currency}/{indicator}` instead)*: Stable identifier for the prediction source (e.g. `ecb_spf` for the ECB Survey of Professional Forecasters). Null when `predicted_value` is absent.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: APIKeyHeader
$config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new FXMacroData\Api\FXMacroDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$currency = AUD; // string | Required path parameter. Allowed values: AUD, BRL, CAD, CHF, CNH, CNY, DKK, EUR, GBP, HUF, ILS, JPY, KRW, MYR, NGN, NOK, NZD, PEN, SEK, THB, TWD, USD.
$indicator = afe_dollar_index; // string | Required path parameter. Allowed values: afe_dollar_index, average_hourly_earnings, average_hourly_earnings_mom, balance_on_goods, balance_on_services, bgcr, breakeven_inflation_rate, broad_dollar_index, broad_money, building_approvals, building_permits, business_confidence, capital_account_balance, cb_assets, commodity_price_energy, commodity_price_ex_energy, commodity_price_index, commodity_prices, consumer_confidence, core_inflation, core_inflation_median, core_inflation_mom, core_inflation_trim, core_pce, core_pce_mom, credit_growth, crude_oil_inventories, current_account_balance, dairy_exports, deposit_rates, durable_goods_orders, effr, eme_dollar_index, employment, exports, financial_account_balance, foreign_reserves, full_time_employment, fx_reserves, gdp, gdp_growth_q4_yoy, gold_reserves, gov_bond_10y, gov_bond_15y, gov_bond_1_5m, gov_bond_1m, gov_bond_1y, gov_bond_20y, gov_bond_25y, gov_bond_2m, gov_bond_2y, gov_bond_30y, gov_bond_3m, gov_bond_3y, gov_bond_40y, gov_bond_4m, gov_bond_4y, gov_bond_5y, gov_bond_6m, gov_bond_6y, gov_bond_7y, gov_bond_8y, gov_bond_9y, government_debt, house_price_index, house_prices, household_credit, household_spending, housing_starts, imports, inflation, inflation_linked_bond, inflation_mom, initial_jobless_claims, international_assets, international_liabilities, job_openings, m1, m2, m3, nairu, natural_gas_storage, net_foreign_asset_position, non_farm_payrolls, non_farm_payrolls_change, obfr, part_time_employment, participation_rate, pce, pce_mom, policy_rate, policy_rate_midpoint, policy_rate_mlf, policy_rate_mro, policy_rate_target_lower, ppi, primary_income_balance, real_yield_20y, real_yield_30y, real_yield_5y, real_yield_7y, retail_sales, retail_sales_control_group, retail_sales_ex_autos, retail_sales_ex_autos_and_gas, risk_free_rate, secondary_income_balance, sight_deposits, snb_balance_sheet, sofr_average_180d, sofr_average_30d, sofr_average_90d, sofr_index, terms_of_trade, tgcr, trade_balance, trade_weighted_index, trimmed_mean_inflation, unemployment, wage_price_index, wages.
$start_date = 'start_date_example'; // string | Optional query parameter. Start date YYYY-MM-DD
$end_date = 'end_date_example'; // string | Optional query parameter. End date YYYY-MM-DD
$series_mode = 'raw'; // string | Optional query parameter. Optional series rendering mode. `canonical` applies configured remap rules (for continuity across methodology transitions). `raw` returns the direct indicator series without remapping.
$limit = 20; // int | Optional query parameter. Maximum number of rows to return in `data[]`. Rows are ordered most-recent-first, so `limit=10` returns the 10 most recent observations within the requested window. Use together with `offset` to page through long histories. Defaults to 20. Maximum 100.
$offset = 0; // int | Optional query parameter. Number of rows to skip from the start of `data[]` (after most-recent-first ordering). Use with `limit` for pagination. Defaults to 0.
$page = 56; // int | Optional query parameter. One-based page number for callers that prefer page-based pagination. When supplied, `offset` is derived as `(page - 1) * limit`.
$seasonality = 'seasonality_example'; // string | Optional query parameter. Optional seasonal adjustment selector. Supported public values are `sa` and `nsa`; check `supported_options.seasonality` in the response/catalogue for values available on this endpoint. Allowed values: sa, nsa.
$frequency = 'frequency_example'; // string | Optional query parameter. Optional returned change basis. Supported public values are `level`, `yoy`, `qoq`, and `mom`; check `supported_options.frequency` for values available on this endpoint. Allowed values: level, yoy, qoq, mom.
$annualization = 'annualization_example'; // string | Optional query parameter. Optional annualization selector. Supported public values are `not_annualized` and `saar`; check `supported_options.annualization` for values available on this endpoint. Allowed values: not_annualized, saar.
$period_aggregation = 'period_aggregation_example'; // string | Optional query parameter. Optional period-aggregation selector. Supported public values are `monthly` and `quarterly_average`; check `supported_options.period_aggregation` for values available on this endpoint. Allowed values: monthly, quarterly_average.
$revisions = 'revisions_example'; // string | Optional query parameter. Optional revision view. Supported public values are `latest`, `first`, `final`, and `all`; unsupported views return `unsupported_series_option` with supported values. Allowed values: latest, first, final, all.
$basis = 'basis_example'; // string | Optional query parameter. Optional real/nominal selector. Supported public values are `real` and `nominal`; only endpoints with known basis metadata accept it. Allowed values: real, nominal.
$official_only = true; // bool | Optional query parameter. When true, return only official-source rows and remove explicit fallback observations. Prohibited private aggregator rows are always removed regardless of this setting.
$as_of = 'as_of_example'; // string | Optional query parameter.
$availability = 'public'; // string | Optional query parameter.
$dataset_version = 'dataset_version_example'; // string | Optional query parameter.
$value_mode = 'normalized'; // string | Optional query parameter.

try {
    $result = $apiInstance->getAnnouncements($currency, $indicator, $start_date, $end_date, $series_mode, $limit, $offset, $page, $seasonality, $frequency, $annualization, $period_aggregation, $revisions, $basis, $official_only, $as_of, $availability, $dataset_version, $value_mode);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FXMacroDataApi->getAnnouncements: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **currency** | **string**| Required path parameter. Allowed values: AUD, BRL, CAD, CHF, CNH, CNY, DKK, EUR, GBP, HUF, ILS, JPY, KRW, MYR, NGN, NOK, NZD, PEN, SEK, THB, TWD, USD. | |
| **indicator** | **string**| Required path parameter. Allowed values: afe_dollar_index, average_hourly_earnings, average_hourly_earnings_mom, balance_on_goods, balance_on_services, bgcr, breakeven_inflation_rate, broad_dollar_index, broad_money, building_approvals, building_permits, business_confidence, capital_account_balance, cb_assets, commodity_price_energy, commodity_price_ex_energy, commodity_price_index, commodity_prices, consumer_confidence, core_inflation, core_inflation_median, core_inflation_mom, core_inflation_trim, core_pce, core_pce_mom, credit_growth, crude_oil_inventories, current_account_balance, dairy_exports, deposit_rates, durable_goods_orders, effr, eme_dollar_index, employment, exports, financial_account_balance, foreign_reserves, full_time_employment, fx_reserves, gdp, gdp_growth_q4_yoy, gold_reserves, gov_bond_10y, gov_bond_15y, gov_bond_1_5m, gov_bond_1m, gov_bond_1y, gov_bond_20y, gov_bond_25y, gov_bond_2m, gov_bond_2y, gov_bond_30y, gov_bond_3m, gov_bond_3y, gov_bond_40y, gov_bond_4m, gov_bond_4y, gov_bond_5y, gov_bond_6m, gov_bond_6y, gov_bond_7y, gov_bond_8y, gov_bond_9y, government_debt, house_price_index, house_prices, household_credit, household_spending, housing_starts, imports, inflation, inflation_linked_bond, inflation_mom, initial_jobless_claims, international_assets, international_liabilities, job_openings, m1, m2, m3, nairu, natural_gas_storage, net_foreign_asset_position, non_farm_payrolls, non_farm_payrolls_change, obfr, part_time_employment, participation_rate, pce, pce_mom, policy_rate, policy_rate_midpoint, policy_rate_mlf, policy_rate_mro, policy_rate_target_lower, ppi, primary_income_balance, real_yield_20y, real_yield_30y, real_yield_5y, real_yield_7y, retail_sales, retail_sales_control_group, retail_sales_ex_autos, retail_sales_ex_autos_and_gas, risk_free_rate, secondary_income_balance, sight_deposits, snb_balance_sheet, sofr_average_180d, sofr_average_30d, sofr_average_90d, sofr_index, terms_of_trade, tgcr, trade_balance, trade_weighted_index, trimmed_mean_inflation, unemployment, wage_price_index, wages. | |
| **start_date** | **string**| Optional query parameter. Start date YYYY-MM-DD | [optional] |
| **end_date** | **string**| Optional query parameter. End date YYYY-MM-DD | [optional] |
| **series_mode** | **string**| Optional query parameter. Optional series rendering mode. &#x60;canonical&#x60; applies configured remap rules (for continuity across methodology transitions). &#x60;raw&#x60; returns the direct indicator series without remapping. | [optional] [default to &#39;raw&#39;] |
| **limit** | **int**| Optional query parameter. Maximum number of rows to return in &#x60;data[]&#x60;. Rows are ordered most-recent-first, so &#x60;limit&#x3D;10&#x60; returns the 10 most recent observations within the requested window. Use together with &#x60;offset&#x60; to page through long histories. Defaults to 20. Maximum 100. | [optional] [default to 20] |
| **offset** | **int**| Optional query parameter. Number of rows to skip from the start of &#x60;data[]&#x60; (after most-recent-first ordering). Use with &#x60;limit&#x60; for pagination. Defaults to 0. | [optional] [default to 0] |
| **page** | **int**| Optional query parameter. One-based page number for callers that prefer page-based pagination. When supplied, &#x60;offset&#x60; is derived as &#x60;(page - 1) * limit&#x60;. | [optional] |
| **seasonality** | **string**| Optional query parameter. Optional seasonal adjustment selector. Supported public values are &#x60;sa&#x60; and &#x60;nsa&#x60;; check &#x60;supported_options.seasonality&#x60; in the response/catalogue for values available on this endpoint. Allowed values: sa, nsa. | [optional] |
| **frequency** | **string**| Optional query parameter. Optional returned change basis. Supported public values are &#x60;level&#x60;, &#x60;yoy&#x60;, &#x60;qoq&#x60;, and &#x60;mom&#x60;; check &#x60;supported_options.frequency&#x60; for values available on this endpoint. Allowed values: level, yoy, qoq, mom. | [optional] |
| **annualization** | **string**| Optional query parameter. Optional annualization selector. Supported public values are &#x60;not_annualized&#x60; and &#x60;saar&#x60;; check &#x60;supported_options.annualization&#x60; for values available on this endpoint. Allowed values: not_annualized, saar. | [optional] |
| **period_aggregation** | **string**| Optional query parameter. Optional period-aggregation selector. Supported public values are &#x60;monthly&#x60; and &#x60;quarterly_average&#x60;; check &#x60;supported_options.period_aggregation&#x60; for values available on this endpoint. Allowed values: monthly, quarterly_average. | [optional] |
| **revisions** | **string**| Optional query parameter. Optional revision view. Supported public values are &#x60;latest&#x60;, &#x60;first&#x60;, &#x60;final&#x60;, and &#x60;all&#x60;; unsupported views return &#x60;unsupported_series_option&#x60; with supported values. Allowed values: latest, first, final, all. | [optional] |
| **basis** | **string**| Optional query parameter. Optional real/nominal selector. Supported public values are &#x60;real&#x60; and &#x60;nominal&#x60;; only endpoints with known basis metadata accept it. Allowed values: real, nominal. | [optional] |
| **official_only** | **bool**| Optional query parameter. When true, return only official-source rows and remove explicit fallback observations. Prohibited private aggregator rows are always removed regardless of this setting. | [optional] [default to true] |
| **as_of** | **string**| Optional query parameter. | [optional] |
| **availability** | **string**| Optional query parameter. | [optional] [default to &#39;public&#39;] |
| **dataset_version** | **string**| Optional query parameter. | [optional] |
| **value_mode** | **string**| Optional query parameter. | [optional] [default to &#39;normalized&#39;] |

### Return type

[**\FXMacroData\Model\AnnouncementResponse**](../Model/AnnouncementResponse.md)

### Authorization

[APIKeyHeader](../../README.md#APIKeyHeader)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCalendar()`

```php
getCalendar($currency, $indicator, $start_date, $end_date, $timezone): \FXMacroData\Model\CalendarResponse
```

Get upcoming economic data release dates

Returns upcoming economic data release dates for a given currency.  Announcement rows keep the `release` slug mapping to `/v1/announcements/{currency}/{indicator}`, while other domains such as COT may also include additive fields like `domain`, `endpoint_family`, and `endpoint_path`. Each row also includes a deterministic `calendar_event_id` for joins across calendar exports.  **Path Parameters:** - `currency`: The 3-letter currency code (e.g., USD).  **Query Parameters:** - `indicator`: Optional. Filter to a specific indicator (e.g., gdp, inflation, unemployment, non_farm_payrolls).  - `start_date`: Optional inclusive lower bound, YYYY-MM-DD. - `end_date`: Optional inclusive upper bound, YYYY-MM-DD.  Past releases are retained for a bounded window. When `start_date` is given, `history_start_date` reports the oldest retained release and `history_truncated` is true if the requested window starts before it. Released values and their announcement times for older periods are available from `/v1/announcements/{currency}/{indicator}`.  **Returns:** List of release rows sorted by announcement time ascending (nearest scheduled release first). Core fields remain `announcement_datetime` and `release`; additive routing metadata may also be present.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: APIKeyHeader
$config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new FXMacroData\Api\FXMacroDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$currency = AUD; // string | Required path parameter. Allowed values: AUD, BRL, CAD, CHF, CNH, CNY, COMM, DKK, EUR, GBP, HUF, ILS, JPY, KRW, MYR, NGN, NOK, NZD, PEN, SEK, THB, TWD, USD.
$indicator = afe_dollar_index; // string | Optional query parameter. Filter by indicator name (e.g., gdp, inflation, unemployment) Allowed values: afe_dollar_index, average_hourly_earnings, average_hourly_earnings_mom, balance_on_goods, balance_on_services, bgcr, breakeven_inflation_rate, broad_dollar_index, broad_money, building_approvals, building_permits, business_confidence, capital_account_balance, cb_assets, commodity_price_energy, commodity_price_ex_energy, commodity_price_index, commodity_prices, consumer_confidence, core_inflation, core_inflation_median, core_inflation_mom, core_inflation_trim, core_pce, core_pce_mom, credit_growth, crude_oil_inventories, current_account_balance, dairy_exports, deposit_rates, durable_goods_orders, effr, eme_dollar_index, employment, exports, financial_account_balance, foreign_reserves, full_time_employment, fx_reserves, gdp, gdp_growth_q4_yoy, gold_reserves, gov_bond_10y, gov_bond_15y, gov_bond_1_5m, gov_bond_1m, gov_bond_1y, gov_bond_20y, gov_bond_25y, gov_bond_2m, gov_bond_2y, gov_bond_30y, gov_bond_3m, gov_bond_3y, gov_bond_40y, gov_bond_4m, gov_bond_4y, gov_bond_5y, gov_bond_6m, gov_bond_6y, gov_bond_7y, gov_bond_8y, gov_bond_9y, government_debt, house_price_index, house_prices, household_credit, household_spending, housing_starts, imports, inflation, inflation_linked_bond, inflation_mom, initial_jobless_claims, international_assets, international_liabilities, job_openings, m1, m2, m3, nairu, natural_gas_storage, net_foreign_asset_position, non_farm_payrolls, non_farm_payrolls_change, obfr, part_time_employment, participation_rate, pce, pce_mom, policy_rate, policy_rate_midpoint, policy_rate_mlf, policy_rate_mro, policy_rate_target_lower, ppi, primary_income_balance, real_yield_20y, real_yield_30y, real_yield_5y, real_yield_7y, retail_sales, retail_sales_control_group, retail_sales_ex_autos, retail_sales_ex_autos_and_gas, risk_free_rate, secondary_income_balance, sight_deposits, snb_balance_sheet, sofr_average_180d, sofr_average_30d, sofr_average_90d, sofr_index, terms_of_trade, tgcr, trade_balance, trade_weighted_index, trimmed_mean_inflation, unemployment, wage_price_index, wages.
$start_date = 'start_date_example'; // string | Optional query parameter. Optional inclusive lower bound in YYYY-MM-DD format.
$end_date = 'end_date_example'; // string | Optional query parameter. Optional inclusive upper bound in YYYY-MM-DD format.
$timezone = 'timezone_example'; // string | Optional query parameter. Optional IANA timezone for an additional converted timestamp field, for example America/Sao_Paulo.

try {
    $result = $apiInstance->getCalendar($currency, $indicator, $start_date, $end_date, $timezone);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FXMacroDataApi->getCalendar: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **currency** | **string**| Required path parameter. Allowed values: AUD, BRL, CAD, CHF, CNH, CNY, COMM, DKK, EUR, GBP, HUF, ILS, JPY, KRW, MYR, NGN, NOK, NZD, PEN, SEK, THB, TWD, USD. | |
| **indicator** | **string**| Optional query parameter. Filter by indicator name (e.g., gdp, inflation, unemployment) Allowed values: afe_dollar_index, average_hourly_earnings, average_hourly_earnings_mom, balance_on_goods, balance_on_services, bgcr, breakeven_inflation_rate, broad_dollar_index, broad_money, building_approvals, building_permits, business_confidence, capital_account_balance, cb_assets, commodity_price_energy, commodity_price_ex_energy, commodity_price_index, commodity_prices, consumer_confidence, core_inflation, core_inflation_median, core_inflation_mom, core_inflation_trim, core_pce, core_pce_mom, credit_growth, crude_oil_inventories, current_account_balance, dairy_exports, deposit_rates, durable_goods_orders, effr, eme_dollar_index, employment, exports, financial_account_balance, foreign_reserves, full_time_employment, fx_reserves, gdp, gdp_growth_q4_yoy, gold_reserves, gov_bond_10y, gov_bond_15y, gov_bond_1_5m, gov_bond_1m, gov_bond_1y, gov_bond_20y, gov_bond_25y, gov_bond_2m, gov_bond_2y, gov_bond_30y, gov_bond_3m, gov_bond_3y, gov_bond_40y, gov_bond_4m, gov_bond_4y, gov_bond_5y, gov_bond_6m, gov_bond_6y, gov_bond_7y, gov_bond_8y, gov_bond_9y, government_debt, house_price_index, house_prices, household_credit, household_spending, housing_starts, imports, inflation, inflation_linked_bond, inflation_mom, initial_jobless_claims, international_assets, international_liabilities, job_openings, m1, m2, m3, nairu, natural_gas_storage, net_foreign_asset_position, non_farm_payrolls, non_farm_payrolls_change, obfr, part_time_employment, participation_rate, pce, pce_mom, policy_rate, policy_rate_midpoint, policy_rate_mlf, policy_rate_mro, policy_rate_target_lower, ppi, primary_income_balance, real_yield_20y, real_yield_30y, real_yield_5y, real_yield_7y, retail_sales, retail_sales_control_group, retail_sales_ex_autos, retail_sales_ex_autos_and_gas, risk_free_rate, secondary_income_balance, sight_deposits, snb_balance_sheet, sofr_average_180d, sofr_average_30d, sofr_average_90d, sofr_index, terms_of_trade, tgcr, trade_balance, trade_weighted_index, trimmed_mean_inflation, unemployment, wage_price_index, wages. | [optional] |
| **start_date** | **string**| Optional query parameter. Optional inclusive lower bound in YYYY-MM-DD format. | [optional] |
| **end_date** | **string**| Optional query parameter. Optional inclusive upper bound in YYYY-MM-DD format. | [optional] |
| **timezone** | **string**| Optional query parameter. Optional IANA timezone for an additional converted timestamp field, for example America/Sao_Paulo. | [optional] |

### Return type

[**\FXMacroData\Model\CalendarResponse**](../Model/CalendarResponse.md)

### Authorization

[APIKeyHeader](../../README.md#APIKeyHeader)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCommodities()`

```php
getCommodities($indicator, $start_date, $end_date, $limit, $offset, $page): \FXMacroData\Model\CommodityResponse
```

Get commodity indicator data

Returns commodity and energy price observations with source provenance.  **Supported indicators:** `crude_oil_inventories`, `gold`, `natural_gas`, `natural_gas_storage`, `oil_brent`, `oil_wti`, `platinum`, `silver`.  The supported-indicator list above is the complete list of indicators this endpoint serves.  **Precious metals** — sourced from The Royal Mint public chart API (https://www.royalmint.com/).  - **Gold**, **silver**, **platinum**: Royal Mint chart reference prices, USD/troy oz. Sampling provenance is provided per observation. These are not verified LBMA auction fixings or executable quotes. Historical coverage can be sparse; see the returned weekday-label coverage. Chart labels do not establish publication times.  **Energy** — sourced from the U.S. Energy Information Administration (https://api.eia.gov/v2/).  - **WTI crude oil** (`oil_wti`): Cushing, OK spot price, USD/barrel. - **Brent crude oil** (`oil_brent`): Europe spot price, USD/barrel. - **Natural gas** (`natural_gas`): Henry Hub spot price, USD/MMBtu.  **Query Parameters:** - `start_date`: Earliest date to include (YYYY-MM-DD). Defaults to 365 days ago. - `end_date`: Latest date to include (YYYY-MM-DD). Defaults to today.  **Authentication:** A professional API key is required. Supply it via `?api_key=<key>` or the `X-API-Key` header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: APIKeyHeader
$config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new FXMacroData\Api\FXMacroDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$indicator = crude_oil_inventories; // string | Required path parameter. Commodity indicator slug Allowed values: crude_oil_inventories, gold, natural_gas, natural_gas_storage, oil_brent, oil_wti, platinum, silver.
$start_date = 'start_date_example'; // string | Optional query parameter. Start date YYYY-MM-DD
$end_date = 'end_date_example'; // string | Optional query parameter. End date YYYY-MM-DD
$limit = 20; // int | Optional query parameter. Maximum rows to return. Defaults to 20. Maximum 100.
$offset = 0; // int | Optional query parameter. Number of rows to skip after most-recent-first ordering.
$page = 56; // int | Optional query parameter. One-based page number. When supplied, it takes precedence over offset.

try {
    $result = $apiInstance->getCommodities($indicator, $start_date, $end_date, $limit, $offset, $page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FXMacroDataApi->getCommodities: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **indicator** | **string**| Required path parameter. Commodity indicator slug Allowed values: crude_oil_inventories, gold, natural_gas, natural_gas_storage, oil_brent, oil_wti, platinum, silver. | |
| **start_date** | **string**| Optional query parameter. Start date YYYY-MM-DD | [optional] |
| **end_date** | **string**| Optional query parameter. End date YYYY-MM-DD | [optional] |
| **limit** | **int**| Optional query parameter. Maximum rows to return. Defaults to 20. Maximum 100. | [optional] [default to 20] |
| **offset** | **int**| Optional query parameter. Number of rows to skip after most-recent-first ordering. | [optional] [default to 0] |
| **page** | **int**| Optional query parameter. One-based page number. When supplied, it takes precedence over offset. | [optional] |

### Return type

[**\FXMacroData\Model\CommodityResponse**](../Model/CommodityResponse.md)

### Authorization

[APIKeyHeader](../../README.md#APIKeyHeader)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCot()`

```php
getCot($currency, $start_date, $end_date, $limit, $offset, $page): \FXMacroData\Model\COTResponse
```

Get CFTC Commitment of Traders (COT) data

Returns weekly CFTC Legacy Futures-Only COT report data for the specified currency's FX futures contract.  **Supported currencies:** AUD, CAD, CHF, EUR, GBP, JPY, MXN, NZD, USD, XAU  **Path Parameters:** - `currency`: 3-letter currency code (e.g., EUR, GBP, JPY).  **Query Parameters:** - `start_date`: Optional. Start date YYYY-MM-DD. Defaults to 52 weeks ago. - `end_date`: Optional. End date YYYY-MM-DD. Defaults to today.  **Authentication:** USD data is publicly available, but anonymous callers are limited to the most recent 90 days; an earlier `start_date` is clamped automatically. All other currencies require a professional API key supplied via `?api_key=<key>` or the `X-API-Key` header. Authenticated callers (any valid key) receive the full requested history for every currency.  **Data source:** CFTC public API — https://publicreporting.cftc.gov/resource/6dca-aqww.json

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: APIKeyHeader
$config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new FXMacroData\Api\FXMacroDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$currency = AUD; // string | Required path parameter. Allowed values: AUD, CAD, CHF, EUR, GBP, JPY, MXN, NZD, USD, XAU.
$start_date = 'start_date_example'; // string | Optional query parameter. Start date YYYY-MM-DD
$end_date = 'end_date_example'; // string | Optional query parameter. End date YYYY-MM-DD
$limit = 20; // int | Optional query parameter. Maximum rows to return. Defaults to 20. Maximum 100.
$offset = 0; // int | Optional query parameter. Number of rows to skip after most-recent-first ordering.
$page = 56; // int | Optional query parameter. One-based page number. When supplied, it takes precedence over offset.

try {
    $result = $apiInstance->getCot($currency, $start_date, $end_date, $limit, $offset, $page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FXMacroDataApi->getCot: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **currency** | **string**| Required path parameter. Allowed values: AUD, CAD, CHF, EUR, GBP, JPY, MXN, NZD, USD, XAU. | |
| **start_date** | **string**| Optional query parameter. Start date YYYY-MM-DD | [optional] |
| **end_date** | **string**| Optional query parameter. End date YYYY-MM-DD | [optional] |
| **limit** | **int**| Optional query parameter. Maximum rows to return. Defaults to 20. Maximum 100. | [optional] [default to 20] |
| **offset** | **int**| Optional query parameter. Number of rows to skip after most-recent-first ordering. | [optional] [default to 0] |
| **page** | **int**| Optional query parameter. One-based page number. When supplied, it takes precedence over offset. | [optional] |

### Return type

[**\FXMacroData\Model\COTResponse**](../Model/COTResponse.md)

### Authorization

[APIKeyHeader](../../README.md#APIKeyHeader)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCurves()`

```php
getCurves($currency, $curve_family, $metric, $view, $method, $date, $as_of, $availability, $max_staleness_days, $require_common_date): \FXMacroData\Model\CurveAnalyticsResponse
```

Get curve analytics by currency

Returns a currency-level curve view from official-source government bond tenor nodes. Use `view=nodes` for raw node snapshots, `view=slopes` for curve-slope and inversion analytics, or `view=forwards` for derived forward-rate segments.  **Curve Families:** - Supported values: `government_nominal`.  **Metrics:** - Supported values: `spot`.  **Views:** - Supported values: `nodes`, `slopes`, `forwards`.  **Authentication:** - Requires an Individual or Business API key via `?api_key=<key>` or `X-API-Key`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: APIKeyHeader
$config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new FXMacroData\Api\FXMacroDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$currency = AUD; // string | Required path parameter. Currency code Allowed values: AUD, CAD, CHF, CNH, CNY, DKK, EUR, GBP, ILS, JPY, KRW, MYR, NOK, NZD, PEN, SEK, THB, USD.
$curve_family = government_nominal; // string | Optional query parameter. Official curve family to return. Allowed values: government_nominal.
$metric = spot; // string | Optional query parameter. Curve metric to return. Allowed values: spot.
$view = nodes; // string | Optional query parameter. Curve view to return: nodes, slopes, or forwards. Allowed values: nodes, slopes, forwards.
$method = derived_from_spot_nodes; // string | Optional query parameter. Forward derivation method used when view=forwards. Allowed values: derived_from_spot_nodes.
$date = 'date_example'; // string | Optional query parameter. Optional target date YYYY-MM-DD. The endpoint returns the latest available node per maturity up to this date, using a recent lookback window.
$as_of = 'as_of_example'; // string | Optional query parameter. Explicit UTC information cutoff for verified vintage replay; date means start of day.
$availability = 'public'; // string | Optional query parameter. Source-public or captured-value availability clock.
$max_staleness_days = 56; // int | Optional query parameter. Maximum reference-date age; defaults to 7 with as_of, otherwise 60.
$require_common_date = True; // bool | Optional query parameter. Require all populated curve nodes to share a reference date; defaults true with as_of.

try {
    $result = $apiInstance->getCurves($currency, $curve_family, $metric, $view, $method, $date, $as_of, $availability, $max_staleness_days, $require_common_date);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FXMacroDataApi->getCurves: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **currency** | **string**| Required path parameter. Currency code Allowed values: AUD, CAD, CHF, CNH, CNY, DKK, EUR, GBP, ILS, JPY, KRW, MYR, NOK, NZD, PEN, SEK, THB, USD. | |
| **curve_family** | **string**| Optional query parameter. Official curve family to return. Allowed values: government_nominal. | [optional] [default to &#39;government_nominal&#39;] |
| **metric** | **string**| Optional query parameter. Curve metric to return. Allowed values: spot. | [optional] [default to &#39;spot&#39;] |
| **view** | **string**| Optional query parameter. Curve view to return: nodes, slopes, or forwards. Allowed values: nodes, slopes, forwards. | [optional] [default to &#39;nodes&#39;] |
| **method** | **string**| Optional query parameter. Forward derivation method used when view&#x3D;forwards. Allowed values: derived_from_spot_nodes. | [optional] [default to &#39;derived_from_spot_nodes&#39;] |
| **date** | **string**| Optional query parameter. Optional target date YYYY-MM-DD. The endpoint returns the latest available node per maturity up to this date, using a recent lookback window. | [optional] |
| **as_of** | **string**| Optional query parameter. Explicit UTC information cutoff for verified vintage replay; date means start of day. | [optional] |
| **availability** | **string**| Optional query parameter. Source-public or captured-value availability clock. | [optional] [default to &#39;public&#39;] |
| **max_staleness_days** | **int**| Optional query parameter. Maximum reference-date age; defaults to 7 with as_of, otherwise 60. | [optional] |
| **require_common_date** | **bool**| Optional query parameter. Require all populated curve nodes to share a reference date; defaults true with as_of. | [optional] |

### Return type

[**\FXMacroData\Model\CurveAnalyticsResponse**](../Model/CurveAnalyticsResponse.md)

### Authorization

[APIKeyHeader](../../README.md#APIKeyHeader)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDataCatalogue()`

```php
getDataCatalogue($currency, $include_capabilities, $include_coverage, $indicator): array<string,\FXMacroData\Model\DataCatalogueItem>
```

Get Currently Available Macroeconomic Indicators

Returns the currently available macroeconomic indicators for a specific currency.      Availability reflects the data currently served, so temporarily     unavailable series are excluded until data is available again. The     catalogue is refreshed on a regular schedule.      This endpoint also replaces the deprecated `/v1/capabilities` and     `/v1/coverage_matrix` endpoints. Coverage is included directly on each     catalogue entry. To also include the legacy top-level coverage list, call it     with `include_coverage=true`. To include capability metadata, call it with     `include_capabilities=true`.      Each entry includes:     * **name**: The full descriptive name of the metric.     * **unit**: The unit of measurement (e.g., %YoY, Billions of USD).     * **frequency**: How often the data is updated (Daily, Monthly, Quarterly).     * **source** / **source_url**: The publisher or source family for the series, when available.     * **source_series_id** / **source_series_name**: The upstream source identifier and exact source-series label, when available.     * **seasonal_adjustment**: Seasonal basis (`SA`, `NSA`, `UNKNOWN`, or `NOT_APPLICABLE`).     * **price_basis**: GDP/level price basis (`REAL`, `NOMINAL`, or `UNKNOWN`) when applicable.     * **aliases** / **related_indicators**: Optional flat discovery metadata for common alternative names and adjacent indicators.     * **standardization_note**: Optional note explaining sign, unit, scope, or cross-currency comparability choices.     * **has_official_forecast**: Whether the relevant central bank or statistics agency publishes a preliminary, flash, or advance estimate of this indicator before the main/final data release.     * **coverage**: Earliest/latest available dates, row count, recency status, and coverage quality for that indicator.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: APIKeyHeader
$config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new FXMacroData\Api\FXMacroDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$currency = AUD; // string | Required path parameter. The 3-letter currency code (e.g., USD, AUD, EUR, GBP, CHF) Allowed values: AUD, BRL, CAD, CHF, CNH, CNY, DKK, EUR, GBP, HUF, ILS, JPY, KRW, MYR, NGN, NOK, NZD, PEN, SEK, THB, TWD, USD.
$include_capabilities = false; // bool | Optional query parameter. Include currency-scoped endpoint/auth metadata that replaces the deprecated /v1/capabilities response.
$include_coverage = false; // bool | Optional query parameter. Also include the legacy currency-scoped coverage list that replaces the deprecated /v1/coverage_matrix response. Per-indicator coverage is included in catalogue entries by default.
$indicator = 'indicator_example'; // string | Optional query parameter. Optional indicator filter when include_coverage=true. Allowed values: afe_dollar_index, average_hourly_earnings, average_hourly_earnings_mom, balance_on_goods, balance_on_services, bgcr, breakeven_inflation_rate, broad_dollar_index, broad_money, building_approvals, building_permits, business_confidence, capital_account_balance, cb_assets, commodity_price_energy, commodity_price_ex_energy, commodity_price_index, commodity_prices, consumer_confidence, core_inflation, core_inflation_median, core_inflation_mom, core_inflation_trim, core_pce, core_pce_mom, credit_growth, crude_oil_inventories, current_account_balance, dairy_exports, deposit_rates, durable_goods_orders, effr, eme_dollar_index, employment, exports, financial_account_balance, foreign_reserves, full_time_employment, fx_reserves, gdp, gdp_growth_q4_yoy, gold_reserves, gov_bond_10y, gov_bond_15y, gov_bond_1_5m, gov_bond_1m, gov_bond_1y, gov_bond_20y, gov_bond_25y, gov_bond_2m, gov_bond_2y, gov_bond_30y, gov_bond_3m, gov_bond_3y, gov_bond_40y, gov_bond_4m, gov_bond_4y, gov_bond_5y, gov_bond_6m, gov_bond_6y, gov_bond_7y, gov_bond_8y, gov_bond_9y, government_debt, house_price_index, house_prices, household_credit, household_spending, housing_starts, imports, inflation, inflation_linked_bond, inflation_mom, initial_jobless_claims, international_assets, international_liabilities, job_openings, m1, m2, m3, nairu, natural_gas_storage, net_foreign_asset_position, non_farm_payrolls, non_farm_payrolls_change, obfr, part_time_employment, participation_rate, pce, pce_mom, policy_rate, policy_rate_midpoint, policy_rate_mlf, policy_rate_mro, policy_rate_target_lower, ppi, primary_income_balance, real_yield_20y, real_yield_30y, real_yield_5y, real_yield_7y, retail_sales, retail_sales_control_group, retail_sales_ex_autos, retail_sales_ex_autos_and_gas, risk_free_rate, secondary_income_balance, sight_deposits, snb_balance_sheet, sofr_average_180d, sofr_average_30d, sofr_average_90d, sofr_index, terms_of_trade, tgcr, trade_balance, trade_weighted_index, trimmed_mean_inflation, unemployment, wage_price_index, wages.

try {
    $result = $apiInstance->getDataCatalogue($currency, $include_capabilities, $include_coverage, $indicator);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FXMacroDataApi->getDataCatalogue: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **currency** | **string**| Required path parameter. The 3-letter currency code (e.g., USD, AUD, EUR, GBP, CHF) Allowed values: AUD, BRL, CAD, CHF, CNH, CNY, DKK, EUR, GBP, HUF, ILS, JPY, KRW, MYR, NGN, NOK, NZD, PEN, SEK, THB, TWD, USD. | |
| **include_capabilities** | **bool**| Optional query parameter. Include currency-scoped endpoint/auth metadata that replaces the deprecated /v1/capabilities response. | [optional] [default to false] |
| **include_coverage** | **bool**| Optional query parameter. Also include the legacy currency-scoped coverage list that replaces the deprecated /v1/coverage_matrix response. Per-indicator coverage is included in catalogue entries by default. | [optional] [default to false] |
| **indicator** | **string**| Optional query parameter. Optional indicator filter when include_coverage&#x3D;true. Allowed values: afe_dollar_index, average_hourly_earnings, average_hourly_earnings_mom, balance_on_goods, balance_on_services, bgcr, breakeven_inflation_rate, broad_dollar_index, broad_money, building_approvals, building_permits, business_confidence, capital_account_balance, cb_assets, commodity_price_energy, commodity_price_ex_energy, commodity_price_index, commodity_prices, consumer_confidence, core_inflation, core_inflation_median, core_inflation_mom, core_inflation_trim, core_pce, core_pce_mom, credit_growth, crude_oil_inventories, current_account_balance, dairy_exports, deposit_rates, durable_goods_orders, effr, eme_dollar_index, employment, exports, financial_account_balance, foreign_reserves, full_time_employment, fx_reserves, gdp, gdp_growth_q4_yoy, gold_reserves, gov_bond_10y, gov_bond_15y, gov_bond_1_5m, gov_bond_1m, gov_bond_1y, gov_bond_20y, gov_bond_25y, gov_bond_2m, gov_bond_2y, gov_bond_30y, gov_bond_3m, gov_bond_3y, gov_bond_40y, gov_bond_4m, gov_bond_4y, gov_bond_5y, gov_bond_6m, gov_bond_6y, gov_bond_7y, gov_bond_8y, gov_bond_9y, government_debt, house_price_index, house_prices, household_credit, household_spending, housing_starts, imports, inflation, inflation_linked_bond, inflation_mom, initial_jobless_claims, international_assets, international_liabilities, job_openings, m1, m2, m3, nairu, natural_gas_storage, net_foreign_asset_position, non_farm_payrolls, non_farm_payrolls_change, obfr, part_time_employment, participation_rate, pce, pce_mom, policy_rate, policy_rate_midpoint, policy_rate_mlf, policy_rate_mro, policy_rate_target_lower, ppi, primary_income_balance, real_yield_20y, real_yield_30y, real_yield_5y, real_yield_7y, retail_sales, retail_sales_control_group, retail_sales_ex_autos, retail_sales_ex_autos_and_gas, risk_free_rate, secondary_income_balance, sight_deposits, snb_balance_sheet, sofr_average_180d, sofr_average_30d, sofr_average_90d, sofr_index, terms_of_trade, tgcr, trade_balance, trade_weighted_index, trimmed_mean_inflation, unemployment, wage_price_index, wages. | [optional] |

### Return type

[**array<string,\FXMacroData\Model\DataCatalogueItem>**](../Model/DataCatalogueItem.md)

### Authorization

[APIKeyHeader](../../README.md#APIKeyHeader)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getFactor()`

```php
getFactor($currency, $factor, $start_date, $end_date, $include_components, $include_sources, $limit, $offset): \FXMacroData\Model\FactorResponse
```

Get a precomputed FX factor for one currency

Returns a factor series for one explicit currency and one explicit factor. Factor values are precomputed snapshots; component macro indicators are not recalculated per request.  **Path Parameters:** - `currency`: Three-letter currency code, for example `EUR` or `USD`. - `factor`: Factor slug. Currently supported: `monetary_stance`.  **Query Parameters:** - `start_date` / `end_date`: Optional date window. With no dates, the latest snapshot is returned. - `include_components`: Include component scores and input values. - `include_sources`: Include FXMacroData source endpoint URLs.  Use `/v1/data_catalogue/{currency}?include_capabilities=true` for factor discovery metadata.  **Authentication:** USD factor data is public without an API key. Anonymous no-key Python clients are governed by the existing 100 requests/day per-IP fair-use limit when the anonymous USD guard is enabled. Other currencies require an Individual or Business API key supplied via `?api_key=<key>` or `X-API-Key`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: APIKeyHeader
$config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new FXMacroData\Api\FXMacroDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$currency = AUD; // string | Required path parameter. Allowed values: AUD, CAD, CHF, EUR, GBP, JPY, NZD, USD.
$factor = monetary_stance; // string | Required path parameter. Factor slug, for example monetary_stance. Allowed values: monetary_stance.
$start_date = 'start_date_example'; // string | Optional query parameter. Inclusive start date YYYY-MM-DD. With no dates, returns latest only.
$end_date = 'end_date_example'; // string | Optional query parameter. Inclusive end date YYYY-MM-DD. Defaults to today when start_date is supplied.
$include_components = false; // bool | Optional query parameter. Include component scores and source observations.
$include_sources = false; // bool | Optional query parameter. Include FXMacroData source endpoint URLs.
$limit = 20; // int | Optional query parameter. Maximum rows to return. Defaults to 20. Maximum 100.
$offset = 0; // int | Optional query parameter. Number of rows to skip after most-recent-first ordering.

try {
    $result = $apiInstance->getFactor($currency, $factor, $start_date, $end_date, $include_components, $include_sources, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FXMacroDataApi->getFactor: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **currency** | **string**| Required path parameter. Allowed values: AUD, CAD, CHF, EUR, GBP, JPY, NZD, USD. | |
| **factor** | **string**| Required path parameter. Factor slug, for example monetary_stance. Allowed values: monetary_stance. | |
| **start_date** | **string**| Optional query parameter. Inclusive start date YYYY-MM-DD. With no dates, returns latest only. | [optional] |
| **end_date** | **string**| Optional query parameter. Inclusive end date YYYY-MM-DD. Defaults to today when start_date is supplied. | [optional] |
| **include_components** | **bool**| Optional query parameter. Include component scores and source observations. | [optional] [default to false] |
| **include_sources** | **bool**| Optional query parameter. Include FXMacroData source endpoint URLs. | [optional] [default to false] |
| **limit** | **int**| Optional query parameter. Maximum rows to return. Defaults to 20. Maximum 100. | [optional] [default to 20] |
| **offset** | **int**| Optional query parameter. Number of rows to skip after most-recent-first ordering. | [optional] [default to 0] |

### Return type

[**\FXMacroData\Model\FactorResponse**](../Model/FactorResponse.md)

### Authorization

[APIKeyHeader](../../README.md#APIKeyHeader)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getFinancialPrices()`

```php
getFinancialPrices($currency, $source, $start_date, $end_date, $measure, $instrument_id, $issuer, $limit, $offset): \FXMacroData\Model\FinancialPriceResponse
```

Official financial prices and yield curves

Official government and central-bank observations. Filter by source, issuer, instrument or measure. Separate nominal, real, par, zero, security quotes and auction observations by their dimensions. Source attribution and licence conditions accompany the data. Empty coverage means no observations are available yet.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: APIKeyHeader
$config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new FXMacroData\Api\FXMacroDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$currency = 'currency_example'; // string | Required path parameter.
$source = 'source_example'; // string | Optional query parameter.
$start_date = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Optional query parameter.
$end_date = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Optional query parameter.
$measure = 'measure_example'; // string | Optional query parameter.
$instrument_id = 'instrument_id_example'; // string | Optional query parameter.
$issuer = 'issuer_example'; // string | Optional query parameter.
$limit = 100; // int | Optional query parameter.
$offset = 0; // int | Optional query parameter.

try {
    $result = $apiInstance->getFinancialPrices($currency, $source, $start_date, $end_date, $measure, $instrument_id, $issuer, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FXMacroDataApi->getFinancialPrices: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **currency** | **string**| Required path parameter. | |
| **source** | **string**| Optional query parameter. | [optional] |
| **start_date** | **\DateTime**| Optional query parameter. | [optional] |
| **end_date** | **\DateTime**| Optional query parameter. | [optional] |
| **measure** | **string**| Optional query parameter. | [optional] |
| **instrument_id** | **string**| Optional query parameter. | [optional] |
| **issuer** | **string**| Optional query parameter. | [optional] |
| **limit** | **int**| Optional query parameter. | [optional] [default to 100] |
| **offset** | **int**| Optional query parameter. | [optional] [default to 0] |

### Return type

[**\FXMacroData\Model\FinancialPriceResponse**](../Model/FinancialPriceResponse.md)

### Authorization

[APIKeyHeader](../../README.md#APIKeyHeader)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getForex()`

```php
getForex($base, $quote, $start_date, $end_date, $limit, $offset, $page, $indicators, $dataset_version): \FXMacroData\Model\ForexResponse
```

Get FX spot rates

Fetches daily FX spot rates between two currencies using official central-bank reference rates.  **Path Parameters:** - `base`: Base currency code (e.g., AUD, USD). - `quote`: Quote currency code (e.g., USD, EUR).  **Query Parameters:** - `start_date`: Optional. Start date YYYY-MM-DD. Defaults to 365 days ago. - `end_date`: Optional. End date YYYY-MM-DD. Defaults to today.  - `indicators`: Optional. Comma-separated list of technical indicators to compute from the spot-rate series and include in the response. Pass `all` to include every supported indicator. Supported values: `adx_14`, `atr_14`, `bollinger_bands`, `cci_20`, `donchian_20`, `ema_12`, `ema_20`, `ema_200`, `ema_26`, `ema_50`, `macd`, `macd_histogram`, `macd_signal`, `rsi_14`, `sma_20`, `sma_200`, `sma_50`, `stochastic_14_3`, `williams_r_14`, `all`.  **Daily reference OHLC:** - On qualifying dates, `data[]` also includes `open`, `high`, `low`, and `close` built from timestamped eligible reference observations. These are `reference_observation_ohlc` bars, not executable-market candles. Rows without at least four observations omit the OHLC fields.  **FX source and derivation metadata:** - FX values are official reference rates collected by FXMacroData. USD-quoted pairs are the base series; inverse and cross pairs are derived from those legs when the publisher does not provide the requested pair directly. - Responses include `pair_metadata` and row-level `data[].source` with `direct_available`, `inverse_available`, `is_derived`, `derived_from_inverse`, `derived_from_cross`, `derived_from_source_legs`, `derivation_method`, `anchor_currency`, `source_pair`, `source_legs`, and `pair_consistency_check`. - Upstream FX source priority is BIS XRU daily USD exchange rates where available, then official national-bank daily sources, explicitly labelled EUR/CAD-derived daily crosses, official USD pegs, BIS monthly averages expanded to business days, IMF IFS monthly rates, and World Bank annual rates. Lower-frequency expansions are labelled with `source_frequency` and `derivation_method`; they are not presented as true daily fixings. - `data[].observation_datetime` is the UTC midnight timestamp for the FX reference date. It is an observation-date marker, not a publication timestamp. - XAU/USD and USD/XAU use the Royal Mint gold chart reference. Chart labels are preserved where available; no publication timestamp or LBMA auction fixing is asserted. Weekday-label coverage is included.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: APIKeyHeader
$config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new FXMacroData\Api\FXMacroDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$base = AUD; // string | Required path parameter. Base currency code Allowed values: AUD, BRL, CAD, CHF, CNH, CNY, DKK, EUR, GBP, HUF, ILS, JPY, KRW, MYR, NGN, NOK, NZD, PEN, SEK, THB, TWD, USD.
$quote = AUD; // string | Required path parameter. Quote currency code Allowed values: AUD, BRL, CAD, CHF, CNH, CNY, DKK, EUR, GBP, HUF, ILS, JPY, KRW, MYR, NGN, NOK, NZD, PEN, SEK, THB, TWD, USD.
$start_date = 'start_date_example'; // string | Optional query parameter. Start date YYYY-MM-DD
$end_date = 'end_date_example'; // string | Optional query parameter. End date YYYY-MM-DD
$limit = 20; // int | Optional query parameter. Maximum rows to return. Defaults to 20. Maximum 100.
$offset = 0; // int | Optional query parameter. Number of rows to skip after most-recent-first ordering.
$page = 56; // int | Optional query parameter. One-based page number. When supplied, it takes precedence over offset.
$indicators = 'indicators_example'; // string | Optional query parameter. Comma-separated technical indicators to compute (e.g. sma_20,rsi_14,macd,bollinger_bands). Use 'all' to request every supported indicator.
$dataset_version = 'dataset_version_example'; // string | Optional query parameter. Pin the content version returned by the first page; changed history returns 409.

try {
    $result = $apiInstance->getForex($base, $quote, $start_date, $end_date, $limit, $offset, $page, $indicators, $dataset_version);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FXMacroDataApi->getForex: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base** | **string**| Required path parameter. Base currency code Allowed values: AUD, BRL, CAD, CHF, CNH, CNY, DKK, EUR, GBP, HUF, ILS, JPY, KRW, MYR, NGN, NOK, NZD, PEN, SEK, THB, TWD, USD. | |
| **quote** | **string**| Required path parameter. Quote currency code Allowed values: AUD, BRL, CAD, CHF, CNH, CNY, DKK, EUR, GBP, HUF, ILS, JPY, KRW, MYR, NGN, NOK, NZD, PEN, SEK, THB, TWD, USD. | |
| **start_date** | **string**| Optional query parameter. Start date YYYY-MM-DD | [optional] |
| **end_date** | **string**| Optional query parameter. End date YYYY-MM-DD | [optional] |
| **limit** | **int**| Optional query parameter. Maximum rows to return. Defaults to 20. Maximum 100. | [optional] [default to 20] |
| **offset** | **int**| Optional query parameter. Number of rows to skip after most-recent-first ordering. | [optional] [default to 0] |
| **page** | **int**| Optional query parameter. One-based page number. When supplied, it takes precedence over offset. | [optional] |
| **indicators** | **string**| Optional query parameter. Comma-separated technical indicators to compute (e.g. sma_20,rsi_14,macd,bollinger_bands). Use &#39;all&#39; to request every supported indicator. | [optional] |
| **dataset_version** | **string**| Optional query parameter. Pin the content version returned by the first page; changed history returns 409. | [optional] |

### Return type

[**\FXMacroData\Model\ForexResponse**](../Model/ForexResponse.md)

### Authorization

[APIKeyHeader](../../README.md#APIKeyHeader)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getFxIntradayReferenceRates()`

```php
getFxIntradayReferenceRates($base, $quote, $start_time, $end_time): \FXMacroData\Model\FxIntradayReferenceRatesResponse
```

Get subscriber intraday FX reference rates

Return subscriber-only timestamped intraday FX reference rates.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: APIKeyHeader
$config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new FXMacroData\Api\FXMacroDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$base = 'base_example'; // string | Required path parameter. Base currency code
$quote = 'quote_example'; // string | Required path parameter. Quote currency code
$start_time = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Optional query parameter. Inclusive RFC 3339 timestamp. Defaults to 24 hours before end_time.
$end_time = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Optional query parameter. Inclusive RFC 3339 source timestamp. Defaults to the current time.

try {
    $result = $apiInstance->getFxIntradayReferenceRates($base, $quote, $start_time, $end_time);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FXMacroDataApi->getFxIntradayReferenceRates: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base** | **string**| Required path parameter. Base currency code | |
| **quote** | **string**| Required path parameter. Quote currency code | |
| **start_time** | **\DateTime**| Optional query parameter. Inclusive RFC 3339 timestamp. Defaults to 24 hours before end_time. | [optional] |
| **end_time** | **\DateTime**| Optional query parameter. Inclusive RFC 3339 source timestamp. Defaults to the current time. | [optional] |

### Return type

[**\FXMacroData\Model\FxIntradayReferenceRatesResponse**](../Model/FxIntradayReferenceRatesResponse.md)

### Authorization

[APIKeyHeader](../../README.md#APIKeyHeader)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getFxReferenceRates()`

```php
getFxReferenceRates($base, $quote, $date, $start_date, $end_date, $source, $timestamp_type, $native_only, $include_source_legs, $order, $limit, $offset, $page, $dataset_version): \FXMacroData\Model\FxReferenceResponse
```

Get timestamped official FX reference rates

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: APIKeyHeader
$config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new FXMacroData\Api\FXMacroDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$base = 'base_example'; // string | Required path parameter. Base currency code
$quote = 'quote_example'; // string | Required path parameter. Quote currency code
$date = 'date_example'; // string | Optional query parameter. Single reference date YYYY-MM-DD. Overrides start_date/end_date.
$start_date = 'start_date_example'; // string | Optional query parameter. Start reference date YYYY-MM-DD.
$end_date = 'end_date_example'; // string | Optional query parameter. End reference date YYYY-MM-DD.
$source = 'source_example'; // string | Optional query parameter. Optional source id filter, for example ecb_eurofxref_daily.
$timestamp_type = 'timestamp_type_example'; // string | Optional query parameter. Optional timestamp type filter, for example fixing or published.
$native_only = false; // bool | Optional query parameter. Return only rows published directly for the requested pair, excluding inverse and cross-derived rows.
$include_source_legs = true; // bool | Optional query parameter. Include derivation source legs when a rate is inverted or crossed.
$order = 'timestamp_asc'; // string | Optional query parameter. Result ordering.
$limit = 100; // int | Optional query parameter. Maximum rows to return. Maximum 100.
$offset = 0; // int | Optional query parameter. Number of rows to skip.
$page = 56; // int | Optional query parameter. One-based page number.
$dataset_version = 'dataset_version_example'; // string | Optional query parameter. Pin first-page content version; changed history returns 409.

try {
    $result = $apiInstance->getFxReferenceRates($base, $quote, $date, $start_date, $end_date, $source, $timestamp_type, $native_only, $include_source_legs, $order, $limit, $offset, $page, $dataset_version);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FXMacroDataApi->getFxReferenceRates: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base** | **string**| Required path parameter. Base currency code | |
| **quote** | **string**| Required path parameter. Quote currency code | |
| **date** | **string**| Optional query parameter. Single reference date YYYY-MM-DD. Overrides start_date/end_date. | [optional] |
| **start_date** | **string**| Optional query parameter. Start reference date YYYY-MM-DD. | [optional] |
| **end_date** | **string**| Optional query parameter. End reference date YYYY-MM-DD. | [optional] |
| **source** | **string**| Optional query parameter. Optional source id filter, for example ecb_eurofxref_daily. | [optional] |
| **timestamp_type** | **string**| Optional query parameter. Optional timestamp type filter, for example fixing or published. | [optional] |
| **native_only** | **bool**| Optional query parameter. Return only rows published directly for the requested pair, excluding inverse and cross-derived rows. | [optional] [default to false] |
| **include_source_legs** | **bool**| Optional query parameter. Include derivation source legs when a rate is inverted or crossed. | [optional] [default to true] |
| **order** | **string**| Optional query parameter. Result ordering. | [optional] [default to &#39;timestamp_asc&#39;] |
| **limit** | **int**| Optional query parameter. Maximum rows to return. Maximum 100. | [optional] [default to 100] |
| **offset** | **int**| Optional query parameter. Number of rows to skip. | [optional] [default to 0] |
| **page** | **int**| Optional query parameter. One-based page number. | [optional] |
| **dataset_version** | **string**| Optional query parameter. Pin first-page content version; changed history returns 409. | [optional] |

### Return type

[**\FXMacroData\Model\FxReferenceResponse**](../Model/FxReferenceResponse.md)

### Authorization

[APIKeyHeader](../../README.md#APIKeyHeader)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getFxSessionRates()`

```php
getFxSessionRates($base, $quote, $session, $date, $start_date, $end_date, $order, $limit, $offset, $page, $dataset_version): \FXMacroData\Model\FxSessionRateResponse
```

Get official FX session-close reference rates

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: APIKeyHeader
$config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new FXMacroData\Api\FXMacroDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$base = 'base_example'; // string | Required path parameter. Base currency code
$quote = 'quote_example'; // string | Required path parameter. Quote currency code
$session = 'session_example'; // string | Required query parameter. Session name: sydney, tokyo, london, or new_york.
$date = 'date_example'; // string | Optional query parameter. Single reference date YYYY-MM-DD. Overrides start_date/end_date.
$start_date = 'start_date_example'; // string | Optional query parameter. Start reference date YYYY-MM-DD.
$end_date = 'end_date_example'; // string | Optional query parameter. End reference date YYYY-MM-DD.
$order = 'date_asc'; // string | Optional query parameter. Result ordering.
$limit = 100; // int | Optional query parameter. Maximum rows to return. Maximum 100.
$offset = 0; // int | Optional query parameter. Number of rows to skip.
$page = 56; // int | Optional query parameter. One-based page number.
$dataset_version = 'dataset_version_example'; // string | Optional query parameter. Pin first-page content version; changed history returns 409.

try {
    $result = $apiInstance->getFxSessionRates($base, $quote, $session, $date, $start_date, $end_date, $order, $limit, $offset, $page, $dataset_version);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FXMacroDataApi->getFxSessionRates: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base** | **string**| Required path parameter. Base currency code | |
| **quote** | **string**| Required path parameter. Quote currency code | |
| **session** | **string**| Required query parameter. Session name: sydney, tokyo, london, or new_york. | |
| **date** | **string**| Optional query parameter. Single reference date YYYY-MM-DD. Overrides start_date/end_date. | [optional] |
| **start_date** | **string**| Optional query parameter. Start reference date YYYY-MM-DD. | [optional] |
| **end_date** | **string**| Optional query parameter. End reference date YYYY-MM-DD. | [optional] |
| **order** | **string**| Optional query parameter. Result ordering. | [optional] [default to &#39;date_asc&#39;] |
| **limit** | **int**| Optional query parameter. Maximum rows to return. Maximum 100. | [optional] [default to 100] |
| **offset** | **int**| Optional query parameter. Number of rows to skip. | [optional] [default to 0] |
| **page** | **int**| Optional query parameter. One-based page number. | [optional] |
| **dataset_version** | **string**| Optional query parameter. Pin first-page content version; changed history returns 409. | [optional] |

### Return type

[**\FXMacroData\Model\FxSessionRateResponse**](../Model/FxSessionRateResponse.md)

### Authorization

[APIKeyHeader](../../README.md#APIKeyHeader)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getFxSourceUniverse()`

```php
getFxSourceUniverse($currency, $source): \FXMacroData\Model\FxSourceUniverseResponse
```

List public FX reference-rate pair universe

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: APIKeyHeader
$config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new FXMacroData\Api\FXMacroDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$currency = 'currency_example'; // string | Optional query parameter. Optional currency filter, for example USD.
$source = 'source_example'; // string | Optional query parameter. Optional source id filter, for example ecb_eurofxref_daily.

try {
    $result = $apiInstance->getFxSourceUniverse($currency, $source);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FXMacroDataApi->getFxSourceUniverse: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **currency** | **string**| Optional query parameter. Optional currency filter, for example USD. | [optional] |
| **source** | **string**| Optional query parameter. Optional source id filter, for example ecb_eurofxref_daily. | [optional] |

### Return type

[**\FXMacroData\Model\FxSourceUniverseResponse**](../Model/FxSourceUniverseResponse.md)

### Authorization

[APIKeyHeader](../../README.md#APIKeyHeader)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getFxSources()`

```php
getFxSources(): \FXMacroData\Model\FxSourcesResponse
```

List public FX reference-rate sources

Lists the official FX reference-rate sources and the pairs each one publishes. `native_pairs` documents what the authority publishes; only `served_pairs` are available from the public FX endpoints. Sources with `serves_public_data: false` (an empty `served_pairs`) are listed for provenance only and return no data. Use `/v1/fx/source-universe` for the requestable pair universe.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: APIKeyHeader
$config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new FXMacroData\Api\FXMacroDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getFxSources();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FXMacroDataApi->getFxSources: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\FXMacroData\Model\FxSourcesResponse**](../Model/FxSourcesResponse.md)

### Authorization

[APIKeyHeader](../../README.md#APIKeyHeader)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getHealth()`

```php
getHealth(): \FXMacroData\Model\ServiceStatusResponse
```

Ping the API

Returns a simple OK status to verify the API is running.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: APIKeyHeader
$config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new FXMacroData\Api\FXMacroDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getHealth();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FXMacroDataApi->getHealth: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\FXMacroData\Model\ServiceStatusResponse**](../Model/ServiceStatusResponse.md)

### Authorization

[APIKeyHeader](../../README.md#APIKeyHeader)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getLatestAnnouncements()`

```php
getLatestAnnouncements($currency): \FXMacroData\Model\LatestAnnouncementsResponse
```

Get latest values for all indicators in a currency

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: APIKeyHeader
$config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new FXMacroData\Api\FXMacroDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$currency = AUD; // string | Required path parameter. Allowed values: AUD, BRL, CAD, CHF, CNH, CNY, DKK, EUR, GBP, HUF, ILS, JPY, KRW, MYR, NGN, NOK, NZD, PEN, SEK, THB, TWD, USD.

try {
    $result = $apiInstance->getLatestAnnouncements($currency);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FXMacroDataApi->getLatestAnnouncements: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **currency** | **string**| Required path parameter. Allowed values: AUD, BRL, CAD, CHF, CNH, CNY, DKK, EUR, GBP, HUF, ILS, JPY, KRW, MYR, NGN, NOK, NZD, PEN, SEK, THB, TWD, USD. | |

### Return type

[**\FXMacroData\Model\LatestAnnouncementsResponse**](../Model/LatestAnnouncementsResponse.md)

### Authorization

[APIKeyHeader](../../README.md#APIKeyHeader)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getLatestCommodities()`

```php
getLatestCommodities(): \FXMacroData\Model\CommoditiesLatestResponse
```

Get latest values for all commodity indicators

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: APIKeyHeader
$config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new FXMacroData\Api\FXMacroDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getLatestCommodities();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FXMacroDataApi->getLatestCommodities: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\FXMacroData\Model\CommoditiesLatestResponse**](../Model/CommoditiesLatestResponse.md)

### Authorization

[APIKeyHeader](../../README.md#APIKeyHeader)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getMarketSessions()`

```php
getMarketSessions($at): \FXMacroData\Model\MarketSessionsResponse
```

FX market session timetable

Returns a real-time snapshot of the four major FX trading sessions (Sydney, Tokyo, London, New York) and their overlap windows.  Each session entry shows today's open and close times in UTC, whether the session is currently open, and seconds until it opens or closes.  Overlap windows highlight the highest-liquidity trading periods — in particular the **London / New York** overlap (~13:00–17:00 UTC in winter), which sees the largest volume and tightest spreads on major USD pairs.  **Query Parameters:** - `at`: Optional ISO-8601 UTC timestamp (e.g. `2026-03-05T12:00:00Z`). Defaults to the current server time. Useful for scheduling or back-testing decisions.  **No authentication required.**

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: APIKeyHeader
$config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new FXMacroData\Api\FXMacroDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$at = 'at_example'; // string | Optional query parameter. Optional ISO-8601 UTC timestamp (e.g. 2026-03-05T12:00:00Z)

try {
    $result = $apiInstance->getMarketSessions($at);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FXMacroDataApi->getMarketSessions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **at** | **string**| Optional query parameter. Optional ISO-8601 UTC timestamp (e.g. 2026-03-05T12:00:00Z) | [optional] |

### Return type

[**\FXMacroData\Model\MarketSessionsResponse**](../Model/MarketSessionsResponse.md)

### Authorization

[APIKeyHeader](../../README.md#APIKeyHeader)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPredictionCoverage()`

```php
getPredictionCoverage(): mixed
```

Which forecast publishers cover which currency (no API key)

Free, key-free catalogue of forecast coverage across every served currency: which publishers we carry, what class of forecast each produces, and which currencies carry a genuine consensus source. Returns no forecast values -- those require a plan. Use ``/v1/predictions/coverage/{currency}`` for per-indicator detail.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: APIKeyHeader
$config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new FXMacroData\Api\FXMacroDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getPredictionCoverage();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FXMacroDataApi->getPredictionCoverage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

**mixed**

### Authorization

[APIKeyHeader](../../README.md#APIKeyHeader)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPredictionCoverageForCurrency()`

```php
getPredictionCoverageForCurrency($currency): mixed
```

Per-indicator forecast coverage for one currency (no API key)

Free, key-free per-indicator catalogue for one currency: the publishers covering each indicator, the ``prediction_class`` each produces, whether any of them is a genuine consensus, and the verified archive depth where it has been confirmed. Returns no forecast values -- those require a plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: APIKeyHeader
$config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new FXMacroData\Api\FXMacroDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$currency = 'currency_example'; // string | Required path parameter.

try {
    $result = $apiInstance->getPredictionCoverageForCurrency($currency);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FXMacroDataApi->getPredictionCoverageForCurrency: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **currency** | **string**| Required path parameter. | |

### Return type

**mixed**

### Authorization

[APIKeyHeader](../../README.md#APIKeyHeader)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPredictions()`

```php
getPredictions($currency, $indicator, $prediction_class, $prediction_type, $prediction_source, $official_limit, $pre_release_only, $seasonality, $frequency, $annualization, $period_aggregation, $basis, $start_date, $end_date, $limit, $offset, $page, $before_date, $as_of, $event_compatible_only): \FXMacroData\Model\PredictionsResponse
```

List predictions for one indicator of a currency

Returns every available prediction for the requested ``currency``/``indicator`` pair. Each row is stamped with its original ``generated_at`` and full source provenance (real archived vintage vs FXMacroData's own live-generated forecast, never reconstructed with later data). Per-source archive start dates and market-consensus coverage vary by indicator: see https://fxmacrodata.com/documentation/point-in-time-backtesting for the exact earliest date per source and indicator before assuming multi-year depth exists for every series.  **Authentication:** this endpoint requires an API key on every currency, including USD. Anonymous callers receive 401 `api_key_required`. A 14-day free trial at https://fxmacrodata.com/subscribe opens the full history on all 18 currencies.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: APIKeyHeader
$config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new FXMacroData\Api\FXMacroDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$currency = AUD; // string | Required path parameter. Allowed values: AUD, BRL, CAD, CHF, CNH, CNY, DKK, EUR, GBP, HUF, ILS, JPY, KRW, MYR, NGN, NOK, NZD, PEN, SEK, THB, TWD, USD.
$indicator = afe_dollar_index; // string | Required path parameter. Indicator slug Allowed values: afe_dollar_index, average_hourly_earnings, average_hourly_earnings_mom, balance_on_goods, balance_on_services, bgcr, breakeven_inflation_rate, broad_dollar_index, broad_money, building_approvals, building_permits, business_confidence, capital_account_balance, cb_assets, commodity_price_energy, commodity_price_ex_energy, commodity_price_index, commodity_prices, consumer_confidence, core_inflation, core_inflation_median, core_inflation_mom, core_inflation_trim, core_pce, core_pce_mom, credit_growth, crude_oil_inventories, current_account_balance, dairy_exports, deposit_rates, durable_goods_orders, effr, eme_dollar_index, employment, exports, financial_account_balance, foreign_reserves, full_time_employment, fx_reserves, gdp, gdp_growth_q4_yoy, gold_reserves, gov_bond_10y, gov_bond_15y, gov_bond_1_5m, gov_bond_1m, gov_bond_1y, gov_bond_20y, gov_bond_25y, gov_bond_2m, gov_bond_2y, gov_bond_30y, gov_bond_3m, gov_bond_3y, gov_bond_40y, gov_bond_4m, gov_bond_4y, gov_bond_5y, gov_bond_6m, gov_bond_6y, gov_bond_7y, gov_bond_8y, gov_bond_9y, government_debt, house_price_index, house_prices, household_credit, household_spending, housing_starts, imports, inflation, inflation_linked_bond, inflation_mom, initial_jobless_claims, international_assets, international_liabilities, job_openings, m1, m2, m3, nairu, natural_gas_storage, net_foreign_asset_position, non_farm_payrolls, non_farm_payrolls_change, obfr, part_time_employment, participation_rate, pce, pce_mom, policy_rate, policy_rate_midpoint, policy_rate_mlf, policy_rate_mro, policy_rate_target_lower, ppi, primary_income_balance, real_yield_20y, real_yield_30y, real_yield_5y, real_yield_7y, retail_sales, retail_sales_control_group, retail_sales_ex_autos, retail_sales_ex_autos_and_gas, risk_free_rate, secondary_income_balance, sight_deposits, snb_balance_sheet, sofr_average_180d, sofr_average_30d, sofr_average_90d, sofr_index, terms_of_trade, tgcr, trade_balance, trade_weighted_index, trimmed_mean_inflation, unemployment, wage_price_index, wages.
$prediction_class = 'prediction_class_example'; // string | Optional query parameter. Filter by how the forecast was produced. Prefer this over `prediction_type`: one class can span several legacy types, which is how `forecaster_survey` returns both the ECB and Philadelphia Fed Surveys of Professional Forecasters.
$prediction_type = 'prediction_type_example'; // string | Optional query parameter. Optional legacy prediction-type filter, retained unchanged for existing clients. Superseded by `prediction_class`.
$prediction_source = 'prediction_source_example'; // string | Optional query parameter. Optional source identifier filter.
$official_limit = 500; // int | Optional query parameter. Maximum rows in ``official_forecasts`` (native-period official forecasts and surveys). 0 omits them.
$pre_release_only = true; // bool | Optional query parameter. Return only forecasts with `generated_at` strictly before the linked `announcement_datetime` (default: true). FXMacroData only publishes forecasts generated before the announcement, so this flag is informational: setting it to false does not return additional rows.
$seasonality = 'seasonality_example'; // string | Optional query parameter. Optional seasonal adjustment selector, matching /v1/announcements. Allowed values: sa, nsa.
$frequency = 'frequency_example'; // string | Optional query parameter. Optional returned change basis selector, matching /v1/announcements. Allowed values: level, yoy, qoq, mom.
$annualization = 'annualization_example'; // string | Optional query parameter. Optional annualization selector, matching /v1/announcements. Allowed values: not_annualized, saar.
$period_aggregation = 'period_aggregation_example'; // string | Optional query parameter. Optional period aggregation selector, matching /v1/announcements. Allowed values: monthly, quarterly_average.
$basis = 'basis_example'; // string | Optional query parameter. Optional real/nominal selector, matching /v1/announcements. Allowed values: real, nominal.
$start_date = 'start_date_example'; // string | Optional query parameter. Start date YYYY-MM-DD (period date). Defaults to 180 days before today when omitted.
$end_date = 'end_date_example'; // string | Optional query parameter. End date YYYY-MM-DD (period date). Defaults to 90 days ahead when omitted.
$limit = 20; // int | Optional query parameter. Maximum number of prediction groups to return in `data[]`. Use with `offset` to page through long histories. Defaults to 20. Maximum 100.
$offset = 0; // int | Optional query parameter. Number of prediction groups to skip from the start of `data[]`. Use with `limit` for pagination. Defaults to 0.
$page = 56; // int | Optional query parameter. One-based page number. When supplied, it takes precedence over offset.
$before_date = 'before_date_example'; // string | Optional query parameter. Return groups strictly before this YYYY-MM-DD period date. Use the previous response's `next_cursor` for bounded pagination.
$as_of = 'as_of_example'; // string | Optional query parameter.
$event_compatible_only = false; // bool | Optional query parameter.

try {
    $result = $apiInstance->getPredictions($currency, $indicator, $prediction_class, $prediction_type, $prediction_source, $official_limit, $pre_release_only, $seasonality, $frequency, $annualization, $period_aggregation, $basis, $start_date, $end_date, $limit, $offset, $page, $before_date, $as_of, $event_compatible_only);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FXMacroDataApi->getPredictions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **currency** | **string**| Required path parameter. Allowed values: AUD, BRL, CAD, CHF, CNH, CNY, DKK, EUR, GBP, HUF, ILS, JPY, KRW, MYR, NGN, NOK, NZD, PEN, SEK, THB, TWD, USD. | |
| **indicator** | **string**| Required path parameter. Indicator slug Allowed values: afe_dollar_index, average_hourly_earnings, average_hourly_earnings_mom, balance_on_goods, balance_on_services, bgcr, breakeven_inflation_rate, broad_dollar_index, broad_money, building_approvals, building_permits, business_confidence, capital_account_balance, cb_assets, commodity_price_energy, commodity_price_ex_energy, commodity_price_index, commodity_prices, consumer_confidence, core_inflation, core_inflation_median, core_inflation_mom, core_inflation_trim, core_pce, core_pce_mom, credit_growth, crude_oil_inventories, current_account_balance, dairy_exports, deposit_rates, durable_goods_orders, effr, eme_dollar_index, employment, exports, financial_account_balance, foreign_reserves, full_time_employment, fx_reserves, gdp, gdp_growth_q4_yoy, gold_reserves, gov_bond_10y, gov_bond_15y, gov_bond_1_5m, gov_bond_1m, gov_bond_1y, gov_bond_20y, gov_bond_25y, gov_bond_2m, gov_bond_2y, gov_bond_30y, gov_bond_3m, gov_bond_3y, gov_bond_40y, gov_bond_4m, gov_bond_4y, gov_bond_5y, gov_bond_6m, gov_bond_6y, gov_bond_7y, gov_bond_8y, gov_bond_9y, government_debt, house_price_index, house_prices, household_credit, household_spending, housing_starts, imports, inflation, inflation_linked_bond, inflation_mom, initial_jobless_claims, international_assets, international_liabilities, job_openings, m1, m2, m3, nairu, natural_gas_storage, net_foreign_asset_position, non_farm_payrolls, non_farm_payrolls_change, obfr, part_time_employment, participation_rate, pce, pce_mom, policy_rate, policy_rate_midpoint, policy_rate_mlf, policy_rate_mro, policy_rate_target_lower, ppi, primary_income_balance, real_yield_20y, real_yield_30y, real_yield_5y, real_yield_7y, retail_sales, retail_sales_control_group, retail_sales_ex_autos, retail_sales_ex_autos_and_gas, risk_free_rate, secondary_income_balance, sight_deposits, snb_balance_sheet, sofr_average_180d, sofr_average_30d, sofr_average_90d, sofr_index, terms_of_trade, tgcr, trade_balance, trade_weighted_index, trimmed_mean_inflation, unemployment, wage_price_index, wages. | |
| **prediction_class** | **string**| Optional query parameter. Filter by how the forecast was produced. Prefer this over &#x60;prediction_type&#x60;: one class can span several legacy types, which is how &#x60;forecaster_survey&#x60; returns both the ECB and Philadelphia Fed Surveys of Professional Forecasters. | [optional] |
| **prediction_type** | **string**| Optional query parameter. Optional legacy prediction-type filter, retained unchanged for existing clients. Superseded by &#x60;prediction_class&#x60;. | [optional] |
| **prediction_source** | **string**| Optional query parameter. Optional source identifier filter. | [optional] |
| **official_limit** | **int**| Optional query parameter. Maximum rows in &#x60;&#x60;official_forecasts&#x60;&#x60; (native-period official forecasts and surveys). 0 omits them. | [optional] [default to 500] |
| **pre_release_only** | **bool**| Optional query parameter. Return only forecasts with &#x60;generated_at&#x60; strictly before the linked &#x60;announcement_datetime&#x60; (default: true). FXMacroData only publishes forecasts generated before the announcement, so this flag is informational: setting it to false does not return additional rows. | [optional] [default to true] |
| **seasonality** | **string**| Optional query parameter. Optional seasonal adjustment selector, matching /v1/announcements. Allowed values: sa, nsa. | [optional] |
| **frequency** | **string**| Optional query parameter. Optional returned change basis selector, matching /v1/announcements. Allowed values: level, yoy, qoq, mom. | [optional] |
| **annualization** | **string**| Optional query parameter. Optional annualization selector, matching /v1/announcements. Allowed values: not_annualized, saar. | [optional] |
| **period_aggregation** | **string**| Optional query parameter. Optional period aggregation selector, matching /v1/announcements. Allowed values: monthly, quarterly_average. | [optional] |
| **basis** | **string**| Optional query parameter. Optional real/nominal selector, matching /v1/announcements. Allowed values: real, nominal. | [optional] |
| **start_date** | **string**| Optional query parameter. Start date YYYY-MM-DD (period date). Defaults to 180 days before today when omitted. | [optional] |
| **end_date** | **string**| Optional query parameter. End date YYYY-MM-DD (period date). Defaults to 90 days ahead when omitted. | [optional] |
| **limit** | **int**| Optional query parameter. Maximum number of prediction groups to return in &#x60;data[]&#x60;. Use with &#x60;offset&#x60; to page through long histories. Defaults to 20. Maximum 100. | [optional] [default to 20] |
| **offset** | **int**| Optional query parameter. Number of prediction groups to skip from the start of &#x60;data[]&#x60;. Use with &#x60;limit&#x60; for pagination. Defaults to 0. | [optional] [default to 0] |
| **page** | **int**| Optional query parameter. One-based page number. When supplied, it takes precedence over offset. | [optional] |
| **before_date** | **string**| Optional query parameter. Return groups strictly before this YYYY-MM-DD period date. Use the previous response&#39;s &#x60;next_cursor&#x60; for bounded pagination. | [optional] |
| **as_of** | **string**| Optional query parameter. | [optional] |
| **event_compatible_only** | **bool**| Optional query parameter. | [optional] [default to false] |

### Return type

[**\FXMacroData\Model\PredictionsResponse**](../Model/PredictionsResponse.md)

### Authorization

[APIKeyHeader](../../README.md#APIKeyHeader)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPressReleases()`

```php
getPressReleases($currency, $limit, $offset): \FXMacroData\Model\PressReleasesResponse
```

Recent central bank press releases

Returns recent press releases from official central bank websites for the requested currency.  **Supported currencies:** AUD, BRL, CAD, CHF, CNY, CZK, DKK, EUR, GBP, HKD, ILS, INR, JPY, KRW, MXN, NGN, NOK, NZD, PEN, PLN, SEK, SGD, THB, USD, ZAR  **Path Parameters:** - `currency`: 3-letter ISO currency code (e.g., USD, EUR, GBP).  **Query Parameters:** - `limit`: Maximum number of press releases to return per page (1–50, default 20). - `offset`: Zero-based pagination offset (default: 0).  **Authentication:** USD press releases are publicly available without an API key. All other currencies require a professional API key supplied via `?api_key=<key>` or the `X-API-Key` header.  **Data sources:** Official central bank RSS feeds and websites only.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: APIKeyHeader
$config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new FXMacroData\Api\FXMacroDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$currency = AUD; // string | Required path parameter. Allowed values: AUD, BRL, CAD, CHF, CZK, DKK, EUR, GBP, HKD, ILS, INR, JPY, NGN, NOK, NZD, PEN, PLN, SEK, USD, ZAR.
$limit = 20; // int | Optional query parameter. Maximum number of press releases to return
$offset = 0; // int | Optional query parameter. Zero-based offset into the full press-release feed before pagination.

try {
    $result = $apiInstance->getPressReleases($currency, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FXMacroDataApi->getPressReleases: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **currency** | **string**| Required path parameter. Allowed values: AUD, BRL, CAD, CHF, CZK, DKK, EUR, GBP, HKD, ILS, INR, JPY, NGN, NOK, NZD, PEN, PLN, SEK, USD, ZAR. | |
| **limit** | **int**| Optional query parameter. Maximum number of press releases to return | [optional] [default to 20] |
| **offset** | **int**| Optional query parameter. Zero-based offset into the full press-release feed before pagination. | [optional] [default to 0] |

### Return type

[**\FXMacroData\Model\PressReleasesResponse**](../Model/PressReleasesResponse.md)

### Authorization

[APIKeyHeader](../../README.md#APIKeyHeader)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRateDifferentials()`

```php
getRateDifferentials($base, $quote, $measure, $rate_type, $curve_family, $start_tenor_years, $end_tenor_years, $start_date, $end_date, $limit, $offset, $as_of, $availability): \FXMacroData\Model\RateDifferentialResponse
```

Get pair rate differentials

Returns a historical differential between the base and quote currency using a shared rate measure. The endpoint aligns the two legs by date intersection and reports the spread in both percentage points and basis points.  **Measures:** - Supported values: `auto`, `risk_free_rate`, `gov_bond_2y`, `gov_bond_10y`, `policy_rate`. - `auto` prefers `risk_free_rate`, then `gov_bond_2y`, then `policy_rate`.  **Rate Types:** - Supported values: `spot`, `forward`. - `spot` compares the selected shared rate measure. - `forward` derives each leg from government bond curve nodes, then aligns dates.  **Authentication:** - Requires an Individual or Business API key via `?api_key=<key>` or `X-API-Key`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: APIKeyHeader
$config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new FXMacroData\Api\FXMacroDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$base = AUD; // string | Required path parameter. Base currency code Allowed values: AUD, BRL, CAD, CHF, CNH, CNY, DKK, EUR, GBP, HUF, ILS, JPY, KRW, MYR, NGN, NOK, NZD, PEN, SEK, THB, TWD, USD.
$quote = AUD; // string | Required path parameter. Quote currency code Allowed values: AUD, BRL, CAD, CHF, CNH, CNY, DKK, EUR, GBP, HUF, ILS, JPY, KRW, MYR, NGN, NOK, NZD, PEN, SEK, THB, TWD, USD.
$measure = auto; // string | Optional query parameter. Shared rate measure to compare across the pair. Allowed values: auto, risk_free_rate, gov_bond_2y, gov_bond_10y, policy_rate.
$rate_type = spot; // string | Optional query parameter. Differential type: spot for shared rate measures, forward for derived curve segments. Allowed values: spot, forward.
$curve_family = government_nominal; // string | Optional query parameter. Curve family used when rate_type=forward. Allowed values: government_nominal.
$start_tenor_years = 2.0; // float | Optional query parameter. Start tenor in years when rate_type=forward.
$end_tenor_years = 5.0; // float | Optional query parameter. End tenor in years when rate_type=forward.
$start_date = 'start_date_example'; // string | Optional query parameter. Inclusive start date YYYY-MM-DD. Defaults to 365 days ago.
$end_date = 'end_date_example'; // string | Optional query parameter. Inclusive end date YYYY-MM-DD. Defaults to today.
$limit = 20; // int | Optional query parameter. Maximum rows to return. Defaults to 20. Maximum 100.
$offset = 0; // int | Optional query parameter. Number of rows to skip after most-recent-first ordering.
$as_of = 'as_of_example'; // string | Optional query parameter. Explicit UTC information cutoff for verified vintage replay; date means start of day.
$availability = 'public'; // string | Optional query parameter. Source-public or captured-value availability clock.

try {
    $result = $apiInstance->getRateDifferentials($base, $quote, $measure, $rate_type, $curve_family, $start_tenor_years, $end_tenor_years, $start_date, $end_date, $limit, $offset, $as_of, $availability);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FXMacroDataApi->getRateDifferentials: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base** | **string**| Required path parameter. Base currency code Allowed values: AUD, BRL, CAD, CHF, CNH, CNY, DKK, EUR, GBP, HUF, ILS, JPY, KRW, MYR, NGN, NOK, NZD, PEN, SEK, THB, TWD, USD. | |
| **quote** | **string**| Required path parameter. Quote currency code Allowed values: AUD, BRL, CAD, CHF, CNH, CNY, DKK, EUR, GBP, HUF, ILS, JPY, KRW, MYR, NGN, NOK, NZD, PEN, SEK, THB, TWD, USD. | |
| **measure** | **string**| Optional query parameter. Shared rate measure to compare across the pair. Allowed values: auto, risk_free_rate, gov_bond_2y, gov_bond_10y, policy_rate. | [optional] [default to &#39;auto&#39;] |
| **rate_type** | **string**| Optional query parameter. Differential type: spot for shared rate measures, forward for derived curve segments. Allowed values: spot, forward. | [optional] [default to &#39;spot&#39;] |
| **curve_family** | **string**| Optional query parameter. Curve family used when rate_type&#x3D;forward. Allowed values: government_nominal. | [optional] [default to &#39;government_nominal&#39;] |
| **start_tenor_years** | **float**| Optional query parameter. Start tenor in years when rate_type&#x3D;forward. | [optional] [default to 2.0] |
| **end_tenor_years** | **float**| Optional query parameter. End tenor in years when rate_type&#x3D;forward. | [optional] [default to 5.0] |
| **start_date** | **string**| Optional query parameter. Inclusive start date YYYY-MM-DD. Defaults to 365 days ago. | [optional] |
| **end_date** | **string**| Optional query parameter. Inclusive end date YYYY-MM-DD. Defaults to today. | [optional] |
| **limit** | **int**| Optional query parameter. Maximum rows to return. Defaults to 20. Maximum 100. | [optional] [default to 20] |
| **offset** | **int**| Optional query parameter. Number of rows to skip after most-recent-first ordering. | [optional] [default to 0] |
| **as_of** | **string**| Optional query parameter. Explicit UTC information cutoff for verified vintage replay; date means start of day. | [optional] |
| **availability** | **string**| Optional query parameter. Source-public or captured-value availability clock. | [optional] [default to &#39;public&#39;] |

### Return type

[**\FXMacroData\Model\RateDifferentialResponse**](../Model/RateDifferentialResponse.md)

### Authorization

[APIKeyHeader](../../README.md#APIKeyHeader)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRiskSentiment()`

```php
getRiskSentiment($start_date, $end_date, $limit, $offset): \FXMacroData\Model\RiskSentimentResponse
```

Global risk-on / risk-off indicator

Returns a composite daily risk-sentiment score indicating whether global financial conditions favour risk-on currencies (AUD, NZD, CAD) or risk-off safe havens (JPY, CHF, USD).  The score is derived from four publicly available sources: - **OFR FSI** (U.S. Treasury Office of Financial Research Financial Stress Index) — primary stress gauge, *inverted* - **Gold** (The Royal Mint spot reference chart observations) — safe-haven demand proxy, *inverted* - **AUD/USD** (Frankfurter API) — risk-sensitive currency pair - **USD/JPY** (Frankfurter API) — safe-haven flow proxy  Each component is normalised to a 252-day rolling z-score, weighted, and compressed through tanh to produce a final score in **[-1.0, +1.0]**.  **Weights:** OFR FSI 40%, Gold 20%, AUD/USD 20%, USD/JPY 20%.  **Query Parameters:** - `start_date`: Start date YYYY-MM-DD (default: 365 days ago). - `end_date`: End date YYYY-MM-DD (default: today).  **Each data record contains:** - `date`: Observation date (YYYY-MM-DD). - `val`: Composite score -1.0 (extreme risk-off) ... +1.0 (extreme risk-on). - `regime`: `risk_on` (>= 0.25) | `neutral` | `risk_off` (<= -0.25). - `components.ofr_fsi`: Normalised (inverted) OFR FSI contribution. - `components.gold`: Normalised (inverted) gold price contribution. - `components.aud_usd`: Normalised AUD/USD contribution. - `components.usd_jpy`: Normalised USD/JPY contribution.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: APIKeyHeader
$config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new FXMacroData\Api\FXMacroDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$start_date = 'start_date_example'; // string | Optional query parameter. Start date YYYY-MM-DD
$end_date = 'end_date_example'; // string | Optional query parameter. End date YYYY-MM-DD
$limit = 20; // int | Optional query parameter. Maximum rows to return. Defaults to 20. Maximum 100.
$offset = 0; // int | Optional query parameter. Number of rows to skip after most-recent-first ordering.

try {
    $result = $apiInstance->getRiskSentiment($start_date, $end_date, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FXMacroDataApi->getRiskSentiment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **start_date** | **string**| Optional query parameter. Start date YYYY-MM-DD | [optional] |
| **end_date** | **string**| Optional query parameter. End date YYYY-MM-DD | [optional] |
| **limit** | **int**| Optional query parameter. Maximum rows to return. Defaults to 20. Maximum 100. | [optional] [default to 20] |
| **offset** | **int**| Optional query parameter. Number of rows to skip after most-recent-first ordering. | [optional] [default to 0] |

### Return type

[**\FXMacroData\Model\RiskSentimentResponse**](../Model/RiskSentimentResponse.md)

### Authorization

[APIKeyHeader](../../README.md#APIKeyHeader)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `ping()`

```php
ping(): \FXMacroData\Model\ServiceStatusResponse
```

Ping the API

Returns a simple OK status to verify the API is running.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: APIKeyHeader
$config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new FXMacroData\Api\FXMacroDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->ping();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FXMacroDataApi->ping: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\FXMacroData\Model\ServiceStatusResponse**](../Model/ServiceStatusResponse.md)

### Authorization

[APIKeyHeader](../../README.md#APIKeyHeader)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `researchPanel()`

```php
researchPanel($research_panel_request): \FXMacroData\Model\ResearchPanelResponse
```

Build a panel of values known at each decision time

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: APIKeyHeader
$config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = FXMacroData\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new FXMacroData\Api\FXMacroDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$research_panel_request = new \FXMacroData\Model\ResearchPanelRequest(); // \FXMacroData\Model\ResearchPanelRequest

try {
    $result = $apiInstance->researchPanel($research_panel_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FXMacroDataApi->researchPanel: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **research_panel_request** | [**\FXMacroData\Model\ResearchPanelRequest**](../Model/ResearchPanelRequest.md)|  | |

### Return type

[**\FXMacroData\Model\ResearchPanelResponse**](../Model/ResearchPanelResponse.md)

### Authorization

[APIKeyHeader](../../README.md#APIKeyHeader)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
