# FxSource

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** |  | [optional]
**name** | **string** |  | [optional]
**authority_type** | **string** |  | [optional]
**country_or_area** | **string** |  | [optional]
**url** | **string** |  | [optional]
**attribution_text** | **string** |  | [optional]
**tier** | **string** |  | [optional]
**is_official** | **bool** |  | [optional]
**is_aggregator** | **bool** |  | [optional]
**default_timezone** | **string** |  | [optional]
**publication_frequency** | **string** |  | [optional]
**native_pairs** | **string[]** | Every pair the authority publishes, as documentation of the source. Not a list of requestable pairs; see served_pairs. | [optional]
**native_pair_count** | **int** |  | [optional]
**served_pairs** | **string[]** | The pairs from this source that the public FX endpoints serve. Only these pairs can be requested; a pair listed in native_pairs but not here returns no rows. | [optional]
**served_pair_count** | **int** |  | [optional]
**serves_public_data** | **bool** | True when at least one pair from this source is served by the public FX endpoints (served_pair_count &gt; 0). False means the source is listed for provenance only and no data from it can be requested. | [optional]
**coverage_note** | **string** |  | [optional]
**source_universe_endpoint** | **string** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
