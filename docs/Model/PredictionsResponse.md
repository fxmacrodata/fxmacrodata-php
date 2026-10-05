# PredictionsResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**as_of** | **string** |  | [optional]
**event_compatible_only** | **bool** |  | [optional] [default to false]
**currency** | **string** |  |
**indicator** | **string** |  | [optional]
**filters** | [**\FXMacroData\Model\SeriesFilters**](SeriesFilters.md) |  | [optional]
**selected_series_id** | **string** |  | [optional]
**selected_series** | [**\FXMacroData\Model\SelectedSeries**](SelectedSeries.md) |  | [optional]
**supported_options** | **array<string,string[]>** |  | [optional]
**prediction_type** | **string** |  | [optional]
**prediction_class** | **string** |  | [optional]
**prediction_source** | **string** |  | [optional]
**pre_release_only** | **bool** |  | [optional] [default to true]
**start_date** | **string** |  | [optional]
**end_date** | **string** |  | [optional]
**next_cursor** | **string** | Exclusive &#x60;before_date&#x60; cursor for the next page. Prefer this over deep offset pagination to keep reads bounded. | [optional]
**has_more** | **bool** |  | [optional] [default to false]
**count** | **int** | Number of announcement groups returned in &#x60;&#x60;data&#x60;&#x60;. | [optional] [default to 0]
**prediction_count** | **int** | Total number of per-source predictions across all groups. | [optional] [default to 0]
**data_quality** | [**\FXMacroData\Model\DataQuality**](DataQuality.md) |  |
**availability** | **array<string,mixed>** | Why a filter returned what it returned. &#x60;&#x60;classes_with_sources&#x60;&#x60; and &#x60;&#x60;types_with_sources&#x60;&#x60; list what any caller could ever get for this pair; &#x60;&#x60;reason&#x60;&#x60; explains a requested filter that came back empty. &#x60;&#x60;no_source_for_pair&#x60;&#x60; means no publisher provides it and no plan adds it. | [optional]
**official_forecasts** | **array<string,mixed>[]** | Official forecasts and surveys for this indicator in the publisher&#39;s own period and unit (quarterly averages, annual rates, survey horizons), newest publication first, every vintage. Not merged into &#x60;&#x60;data&#x60;&#x60; because their period basis differs from the monthly announcement; &#x60;&#x60;target_period&#x60;&#x60;, &#x60;&#x60;period_basis&#x60;&#x60; and &#x60;&#x60;unit&#x60;&#x60; say exactly what each number is. Same &#x60;&#x60;prediction_class&#x60;&#x60; vocabulary as &#x60;&#x60;data&#x60;&#x60;; filtered by &#x60;&#x60;prediction_class&#x60;&#x60;, &#x60;&#x60;prediction_source&#x60;&#x60;, &#x60;&#x60;start_date&#x60;&#x60; and &#x60;&#x60;end_date&#x60;&#x60; (on the publication date). | [optional]
**official_forecast_count** | **int** | Number of rows in &#x60;&#x60;official_forecasts&#x60;&#x60;. | [optional] [default to 0]
**official_forecast_calendar** | **array<string,mixed>[]** | Confirmed official forecast publication times for this currency over the next 366 days. These are publisher releases, separate from the indicator&#39;s announcement times. | [optional]
**official_forecasts_truncated** | **bool** | True when more official forecast vintages exist than the &#x60;&#x60;official_limit&#x60;&#x60; returned; narrow &#x60;&#x60;start_date&#x60;&#x60;/&#x60;&#x60;end_date&#x60;&#x60; or &#x60;&#x60;prediction_source&#x60;&#x60; to see the rest. | [optional] [default to false]
**data** | [**\FXMacroData\Model\AnnouncementPredictions[]**](AnnouncementPredictions.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
