# CommodityCoverage

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**scope** | **string** |  |
**requested_start** | **string** |  | [optional]
**requested_end** | **string** |  | [optional]
**available_start** | **string** |  | [optional]
**available_end** | **string** |  | [optional]
**input_row_count** | **int** |  |
**row_count** | **int** |  |
**distinct_date_count** | **int** |  |
**duplicate_date_row_count** | **int** |  |
**excluded_weekend_row_count** | **int** |  |
**invalid_date_row_count** | **int** |  |
**expected_weekday_label_count** | **int** |  |
**missing_weekday_label_count** | **int** |  |
**largest_missing_weekday_run** | **int** |  |
**largest_calendar_gap_days** | **int** |  |
**missing_weekday_ranges** | [**\FXMacroData\Model\CommodityMissingWeekdayRange[]**](CommodityMissingWeekdayRange.md) |  |
**longest_continuous_weekday_segment** | [**\FXMacroData\Model\CommodityCoverageSegment**](CommodityCoverageSegment.md) |  |
**latest_continuous_weekday_segment** | [**\FXMacroData\Model\CommodityCoverageSegment**](CommodityCoverageSegment.md) |  |
**sparse_history** | **bool** |  |
**coverage_basis** | **string** |  |
**continuous_coverage_verified** | **bool** |  | [optional] [default to false]
**reference_only** | **bool** |  | [optional] [default to true]
**executable_quotes** | **bool** |  | [optional] [default to false]
**provenance_version** | **int** |  |
**repaired_excluded_weekend_row_count** | **int** |  | [optional] [default to 0]
**repaired_invalid_date_row_count** | **int** |  | [optional] [default to 0]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
