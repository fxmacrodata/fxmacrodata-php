# DataQuality

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**source_freshness** | **string** |  | [optional]
**source_monitoring_complete** | **bool** |  | [optional]
**known_source_gap** | **bool** |  | [optional]
**source_checked_at** | **int** |  | [optional]
**source_check_expires_at** | **int** |  | [optional]
**latest_published_period** | **string** |  | [optional]
**source_permission_status** | **string** |  | [optional]
**commodity_coverage** | [**\FXMacroData\Model\CommodityCoverage**](CommodityCoverage.md) |  | [optional]
**stored_history_coverage** | [**\FXMacroData\Model\CommodityCoverage**](CommodityCoverage.md) |  | [optional]
**point_in_time_basis** | **string** |  | [optional]
**is_official** | **bool** |  |
**is_proxy** | **bool** |  |
**is_fallback** | **bool** |  |
**is_stale** | **bool** |  |
**has_announcement_datetime** | **bool** |  |
**point_in_time_safe** | **bool** | Whether the returned values have verified availability and vintage evidence; estimated release times do not qualify. |
**unverified_vintage_count** | **int** |  | [optional] [default to 0]
**unknown_publication_time_count** | **int** |  | [optional] [default to 0]
**latest_available_date** | **string** |  | [optional]
**last_updated** | **string** |  | [optional]
**data_lag_days** | **int** |  | [optional]
**source_name** | **string** |  | [optional]
**source_type** | **string** |  |
**is_derived** | **bool** |  | [optional] [default to false]
**row_count** | **int** |  | [optional] [default to 0]
**announcement_datetime_count** | **int** |  | [optional] [default to 0]
**missing_announcement_datetime_count** | **int** |  | [optional] [default to 0]
**has_assumed_release_times** | **bool** | True when at least one row in the quality scope carries a publication timestamp derived from the publication lag measured on that series&#39; own confirmed releases, because no official release calendar reaches the period. | [optional] [default to false]
**assumed_release_time_count** | **int** | Number of rows in the quality scope whose publication timestamp was derived rather than captured. Compare against row_count to size the derived portion of the requested window. | [optional] [default to 0]
**bounded_release_time_count** | **int** | Legacy rows carrying an upper-bound estimate flag; this does not certify replay safety. | [optional] [default to 0]
**unbounded_release_time_count** | **int** | Assumed timestamps without proven availability bounds. | [optional] [default to 0]
**quality_scope** | **string** |  | [optional] [default to 'full_result']
**stale_after_days** | **int** |  | [optional]
**requested_window_has_data** | **bool** |  | [optional]
**requested_window_latest_date** | **string** |  | [optional]
**requested_window_includes_latest_available** | **bool** |  | [optional]
**page_includes_latest_available** | **bool** |  | [optional]
**returned_latest_available_before_window** | **bool** |  | [optional]
**staleness_days** | **int** |  | [optional]
**reason** | **string** |  | [optional]
**datetime_field** | **string** |  | [optional]
**datetime_precision** | **string** |  | [optional]
**datetime_semantics** | **string** |  | [optional]
**source_legs** | **array<string,mixed>[]** |  | [optional]
**historical_point_in_time** | [**\FXMacroData\Model\PointInTimeCompleteness**](PointInTimeCompleteness.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
