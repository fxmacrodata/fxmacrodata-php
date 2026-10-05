# COTResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**currency** | **string** |  |
**instrument** | **string** |  |
**source** | **string** |  |
**source_url** | **string** |  |
**provenance** | [**\FXMacroData\Model\COTProvenance**](COTProvenance.md) |  |
**fx_overlay** | [**\FXMacroData\Model\COTFXOverlay**](COTFXOverlay.md) |  |
**start_date** | **string** |  |
**end_date** | **string** |  |
**latest_available_date** | **string** |  | [optional]
**latest_available_announcement_datetime** | **int** |  | [optional]
**expected_next_release** | **string** |  | [optional]
**expected_next_release_epoch** | **int** |  | [optional]
**last_sync_status** | **string** |  |
**last_sync_datetime** | **string** |  | [optional]
**data_lag_days** | **int** |  | [optional]
**next_expected_cftc_report_date** | **string** |  | [optional]
**next_expected_cftc_release_date** | **string** |  | [optional]
**expected_next_release_holiday_adjusted** | **bool** |  | [optional]
**expected_next_release_source** | **string** |  | [optional]
**expected_next_release_source_url** | **string** |  | [optional]
**expected_next_release_schedule_storage** | **string** |  | [optional]
**expected_next_release_schedule_last_updated** | **string** |  | [optional]
**requested_window_has_data** | **bool** |  | [optional]
**requested_window_latest_date** | **string** |  | [optional]
**requested_window_includes_latest_available** | **bool** |  | [optional]
**page_includes_latest_available** | **bool** |  | [optional]
**last_updated** | **string** |  | [optional]
**data_quality** | [**\FXMacroData\Model\DataQuality**](DataQuality.md) |  |
**pagination** | [**\FXMacroData\Model\COTPaginationInfo**](COTPaginationInfo.md) |  |
**data** | [**\FXMacroData\Model\COTDataPoint[]**](COTDataPoint.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
