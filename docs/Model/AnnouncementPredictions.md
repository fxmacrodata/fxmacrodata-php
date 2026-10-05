# AnnouncementPredictions

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**announcement_id** | **string** | Stable identifier of the announcement these predictions target, in the form &#x60;&#x60;{currency}_{indicator}_{date}&#x60;&#x60;. |
**observation_id** | **string** | Variant-safe identifier for the selected series observation. Use this with &#x60;selected_series_id&#x60; when query selectors choose a non-default series. | [optional]
**selected_series_id** | **string** | Stable identifier of the selected announcement series. | [optional]
**currency** | **string** |  |
**indicator** | **string** |  |
**date** | **string** | Reference period date of the forecast, &#x60;&#x60;YYYY-MM-DD&#x60;&#x60;. |
**announcement_datetime** | **int** | Release timestamp of the forecasted announcement, Unix epoch seconds (UTC). |
**announcement_datetime_local** | **string** | ISO 8601 release time with timezone offset, rendered in the currency&#39;s market timezone. | [optional]
**announcement_timing** | **string** | Whether the forecasted announcement is still upcoming (&#x60;future&#x60;) or already released (&#x60;past&#x60;). | [optional]
**predictions** | [**\FXMacroData\Model\PredictionItem[]**](PredictionItem.md) | List of forecasts for this announcement, one entry per prediction source.  Sorted by &#x60;&#x60;prediction_source&#x60;&#x60; for deterministic output. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
