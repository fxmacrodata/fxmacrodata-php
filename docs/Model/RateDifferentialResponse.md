# RateDifferentialResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**research** | **array<string,mixed>** |  | [optional]
**base** | **string** |  |
**quote** | **string** |  |
**rate_type** | **string** |  | [optional] [default to 'spot']
**measure_requested** | **string** |  |
**measure_used** | **string** |  |
**base_indicator** | **string** |  | [optional]
**quote_indicator** | **string** |  | [optional]
**curve_family** | **string** |  | [optional]
**start_tenor** | **string** |  | [optional]
**end_tenor** | **string** |  | [optional]
**forward_label** | **string** |  | [optional]
**start_date** | **string** |  |
**end_date** | **string** |  |
**matched_points** | **int** |  |
**unit** | **string** |  |
**latest_spread** | **float** |  | [optional]
**latest_spread_bps** | **float** |  | [optional]
**latest_differential** | **float** |  | [optional]
**latest_differential_bps** | **float** |  | [optional]
**base_latest** | **float** |  | [optional]
**quote_latest** | **float** |  | [optional]
**sources** | [**\FXMacroData\Model\RateDifferentialSources**](RateDifferentialSources.md) |  |
**official_forward_source_support** | [**\FXMacroData\Model\OfficialForwardSourceSupport**](OfficialForwardSourceSupport.md) |  | [optional]
**data_quality** | [**\FXMacroData\Model\DataQuality**](DataQuality.md) |  |
**pagination** | [**\FXMacroData\Model\Pagination**](Pagination.md) |  |
**data** | [**\FXMacroData\Model\RateDifferentialPoint[]**](RateDifferentialPoint.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
