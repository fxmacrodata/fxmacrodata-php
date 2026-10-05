# PredictionProvenance

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**value_origin** | **string** | Whether the value is a publisher historical vintage or an FXMacroData model output. |
**capture_mode** | **string** | Whether FXMacroData recorded the value when it was published or later imported it from the publisher&#39;s official archive. |
**archived_in_real_time_by_fxmacrodata** | **bool** | True only when FXMacroData captured the prediction at the time it was generated or published. |
**generated_at_basis** | **string** | The source fact used to construct &#x60;generated_at&#x60;. |
**generated_at_precision** | **string** | Precision of the underlying source timestamp. &#x60;date&#x60; means an official source date was normalized to a documented source-local time. |
**reconstructed_with_later_data** | **bool** | Whether the prediction value was recomputed using later data or a newer model version. |
**vintage_selection** | **string** | Which publisher or model vintages are retained in this feed. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
