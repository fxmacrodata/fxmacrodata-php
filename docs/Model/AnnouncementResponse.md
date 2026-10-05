# AnnouncementResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**currency** | **string** |  |
**indicator** | **string** |  |
**name** | **string** |  | [optional]
**value_name** | **string** |  | [optional]
**source** | **string** |  | [optional]
**source_url** | **string** |  | [optional]
**source_series_id** | **string** |  | [optional]
**source_series_name** | **string** |  | [optional]
**source_local_name** | **string** |  | [optional]
**seasonal_adjustment** | **string** |  | [optional]
**price_basis** | **string** |  | [optional]
**is_proxy** | **bool** |  | [optional] [default to false]
**proxy_note** | **string** |  | [optional]
**provenance** | [**\FXMacroData\Model\AnnouncementProvenance**](AnnouncementProvenance.md) |  | [optional]
**policy_role** | **string** |  | [optional]
**policy_structure** | **string** |  | [optional]
**comparison_compatible** | **bool** |  | [optional]
**policy_family** | [**\FXMacroData\Model\PolicyFamilyEntry[]**](PolicyFamilyEntry.md) |  | [optional]
**has_official_forecast** | **bool** |  |
**requested_start_date** | **string** |  | [optional]
**requested_end_date** | **string** |  | [optional]
**requested_window_has_data** | **bool** |  | [optional]
**page_includes_latest_available** | **bool** |  | [optional]
**start_date** | **string** |  |
**end_date** | **string** |  |
**earliest_available_date** | **string** |  | [optional]
**latest_available_date** | **string** |  | [optional]
**cb_target** | [**\FXMacroData\Model\CBTargetInfo**](CBTargetInfo.md) |  | [optional]
**remap** | [**\FXMacroData\Model\AnnouncementRemap**](AnnouncementRemap.md) |  | [optional]
**filters** | [**\FXMacroData\Model\SeriesFilters**](SeriesFilters.md) |  | [optional]
**selected_series_id** | **string** |  | [optional]
**selected_series** | [**\FXMacroData\Model\SelectedSeries**](SelectedSeries.md) |  | [optional]
**supported_options** | **array<string,string[]>** |  | [optional]
**data_quality** | [**\FXMacroData\Model\DataQuality**](DataQuality.md) |  |
**replay** | **array<string,mixed>** |  | [optional]
**dataset_version** | **string** |  | [optional]
**value_mode** | **string** |  | [optional] [default to 'normalized']
**value_metadata** | **array<string,mixed>** |  | [optional]
**pagination** | [**\FXMacroData\Model\IndicatorPaginationInfo**](IndicatorPaginationInfo.md) |  |
**freemium_window** | [**\FXMacroData\Model\FreemiumWindow**](FreemiumWindow.md) |  | [optional]
**freemium_delay** | [**\FXMacroData\Model\FreemiumDelayNotice**](FreemiumDelayNotice.md) |  | [optional]
**no_data** | **array<string,mixed>** |  | [optional]
**data** | [**\FXMacroData\Model\AnnouncementDataPoint[]**](AnnouncementDataPoint.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
