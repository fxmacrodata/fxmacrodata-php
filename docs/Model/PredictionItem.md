# PredictionItem

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**predicted_value** | **float** |  |
**event_compatible** | **bool** |  | [optional] [default to false]
**event_compatibility_reason** | **string** |  | [optional]
**source_url** | **string** |  | [optional]
**target_period** | **string** |  | [optional]
**period_basis** | **string** |  | [optional]
**unit** | **string** |  | [optional]
**statistic** | **string** |  | [optional]
**publication_date** | **string** |  | [optional]
**publication_datetime** | **string** |  | [optional]
**publication_precision** | **string** |  | [optional]
**forecast_observation_id** | **string** |  | [optional]
**seasonal_adjustment** | **string** |  | [optional]
**geography** | **string** |  | [optional]
**announcement_mapping_verified** | **bool** |  | [optional] [default to false]
**prediction_class** | **string** | How the forecast was produced, and the field to filter on. One of &#x60;&#x60;compiled_consensus&#x60;&#x60; (a publisher&#39;s compilation of independent forecasters), &#x60;&#x60;forecaster_survey&#x60;&#x60; (an official survey of forecasters or market participants), &#x60;&#x60;market_implied&#x60;&#x60; (derived from traded prices), &#x60;&#x60;model_nowcast&#x60;&#x60; (a published statistical model), &#x60;&#x60;central_bank_projection&#x60;&#x60; (the central bank&#39;s own projection), &#x60;&#x60;institutional_projection&#x60;&#x60; (IMF, OECD), or &#x60;&#x60;fxmacrodata&#x60;&#x60; (an FXMacroData estimate, never a market consensus). | [optional]
**prediction_class_label** | **string** | Human-readable name for &#x60;&#x60;prediction_class&#x60;&#x60;, for display. Filter on &#x60;&#x60;prediction_class&#x60;&#x60;, not on this. | [optional]
**prediction_type** | **string** | Original per-source category, retained unchanged for backward compatibility: &#x60;&#x60;market_consensus&#x60;&#x60;, &#x60;&#x60;market_prediction&#x60;&#x60;, &#x60;&#x60;model_nowcast&#x60;&#x60;, &#x60;&#x60;survey&#x60;&#x60;, &#x60;&#x60;central_bank_forecast&#x60;&#x60;, &#x60;&#x60;central_bank_projection&#x60;&#x60;, &#x60;&#x60;imf_weo&#x60;&#x60;, &#x60;&#x60;oecd_eo&#x60;&#x60; or &#x60;&#x60;fxmacrodata&#x60;&#x60;. These slugs split identical instruments (the ECB and Philadelphia Fed Surveys of Professional Forecasters landed in different values) and two of them name a publisher rather than a category. Prefer &#x60;&#x60;prediction_class&#x60;&#x60;. | [optional]
**prediction_source** | **string** | Stable source identifier slug (e.g. &#x60;&#x60;philly_fed_spf&#x60;&#x60;, &#x60;&#x60;cleveland_fed_nowcast&#x60;&#x60;, &#x60;&#x60;fomc_sep&#x60;&#x60;, &#x60;&#x60;atlanta_fed_gdpnow&#x60;&#x60;, &#x60;&#x60;ny_fed_sme&#x60;&#x60;, &#x60;&#x60;ecb_spf&#x60;&#x60;, &#x60;&#x60;imf_weo&#x60;&#x60;, &#x60;&#x60;rbnz_mps&#x60;&#x60;, &#x60;&#x60;fxmacrodata_blended&#x60;&#x60;). Use this value when filtering via the &#x60;&#x60;prediction_source&#x60;&#x60; query parameter. | [optional]
**prediction_source_label** | **string** | Human-readable name for &#x60;&#x60;prediction_source&#x60;&#x60; (e.g. \&quot;RBA Statement on Monetary Policy (Table J1)\&quot;, \&quot;Philadelphia Fed Survey of Professional Forecasters\&quot;, \&quot;IMF World Economic Outlook\&quot;). Suitable for display in UI surfaces; use &#x60;&#x60;prediction_source&#x60;&#x60; for filtering and joins. | [optional]
**generated_at** | **int** | Unix epoch seconds (UTC) for the prediction&#39;s known-at marker. Inspect &#x60;provenance.generated_at_basis&#x60; and &#x60;provenance.generated_at_precision&#x60;: publisher archives may provide a date that FXMacroData normalizes to a documented source-local publication time rather than an original intraday timestamp. | [optional]
**provenance** | [**\FXMacroData\Model\PredictionProvenance**](PredictionProvenance.md) | Documented origin, capture, timestamp, reconstruction, and vintage semantics for this source. Omitted for sources whose provenance is not yet documented. | [optional]
**is_pre_release** | **bool** | Whether &#x60;generated_at&#x60; is strictly earlier than the linked &#x60;announcement_datetime&#x60;. Null when the source did not provide a generation timestamp. | [optional]
**confidence** | **float** | Confidence score in &#x60;&#x60;[0.0, 1.0]&#x60;&#x60; indicating how strong this prediction is. &#x60;&#x60;1.0&#x60;&#x60; is maximally confident, &#x60;&#x60;0.0&#x60;&#x60; is no confidence. When the source did not record an explicit value, a per-source default is returned (central-bank publications and official surveys score higher than the FXMacroData blended forecast). Use this to weight or filter predictions in client applications. | [optional]
**prediction_reason** | **string** | Short human-readable explanation of how this prediction was derived. Currently populated for FXMacroData-generated predictions (&#x60;&#x60;prediction_source&#x3D;fxmacrodata_blended&#x60;&#x60;); it summarises the persistence anchor, momentum/trend extrapolation, cross-indicator pressure, and any external forecast that was blended in. Other prediction sources may omit this field. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
