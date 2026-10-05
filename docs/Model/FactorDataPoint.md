# FactorDataPoint

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**date** | **string** |  |
**val** | **float** |  | [optional]
**score** | **float** |  | [optional]
**level_score** | **float** |  | [optional]
**impulse_score** | **float** |  | [optional]
**rate_repricing_score** | **float** |  | [optional]
**macro_pressure_score** | **float** |  | [optional]
**label** | **string** |  | [optional]
**stance_context** | **string** |  | [optional]
**announcement_datetime** | **int** |  | [optional]
**coverage_ratio** | **float** |  | [optional]
**component_count** | **int** |  | [optional]
**point_in_time_safe** | **bool** | True only when every input observation behind this row carries a publication timestamp captured from its release. An input dated from that series&#39; measured publication lag clears it, because the composite could not be shown to have been knowable at its own announcement_datetime. | [optional]
**release_time_assumed** | **bool** | Present and true when at least one input observation carries a derived publication timestamp. Omitted when every input was captured from its release. | [optional]
**assumed_release_time_inputs** | **int** | Number of input observations behind this row whose publication timestamp was derived. | [optional]
**components** | **array<string,mixed>** |  | [optional]
**source_observations** | **array<string,mixed>** |  | [optional]
**source_endpoints** | **string[]** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
