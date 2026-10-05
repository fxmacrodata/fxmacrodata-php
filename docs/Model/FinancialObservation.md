# FinancialObservation

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**observation_id** | **string** | Stable identity of the source, observation date, instrument and quote dimensions. |
**source_id** | **string** |  |
**date** | **string** | Source observation date; not an inferred publication date. |
**val** | **float** | Official numerical value in unit, retaining source precision. |
**currency** | **string** |  |
**issuer** | **string** | Issuer, official benchmark administrator, or explicitly identified market/curve basket. |
**instrument_id** | **string** |  |
**instrument_name** | **string** |  | [optional]
**source_series_id** | **string** |  | [optional]
**measure** | **string** |  |
**unit** | **string** |  |
**source_url** | **string** |  |
**basis** | **string** |  | [optional]
**curve_type** | **string** |  | [optional]
**tenor** | **string** |  | [optional]
**maturity_years** | **float** |  | [optional]
**maturity_date** | **string** |  | [optional]
**price_side** | **string** |  | [optional]
**price_basis** | **string** |  | [optional]
**price_denominator** | **float** |  | [optional]
**coupon_rate** | **float** |  | [optional]
**quote_type** | **string** |  | [optional]
**yield_convention** | **string** |  | [optional]
**reference_rate** | **string** |  | [optional]
**inflation_index** | **string** |  | [optional]
**compounding** | **string** |  | [optional]
**averaging_period_months** | **float** |  | [optional]
**percentile** | **float** |  | [optional]
**publication_date** | **string** |  | [optional]
**source_publication_date** | **string** |  | [optional]
**source_value_date** | **string** |  | [optional]
**rate_period_start** | **string** |  | [optional]
**rate_period_end** | **string** |  | [optional]
**observation_period_start** | **string** |  | [optional]
**observation_period_end** | **string** |  | [optional]
**observation_status** | **string** |  | [optional]
**announcement_datetime** | **int** | Publication epoch seconds when available. A scheduled hour is explicitly assumed. | [optional]
**publication_time_confirmed** | **bool** |  |
**release_time_assumed** | **bool** |  |
**point_in_time_safe** | **bool** | True only when the source supplied exact publication-time evidence. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
