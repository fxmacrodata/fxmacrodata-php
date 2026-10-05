# PressRelease

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**url** | **string** |  | [optional]
**date** | **string** |  | [optional]
**title** | **string** |  | [optional]
**topics** | **string[]** |  | [optional]
**summary** | **string** |  | [optional]
**category** | **string** |  | [optional]
**rate_path** | [**\FXMacroData\Model\PressReleaseRatePath**](PressReleaseRatePath.md) |  | [optional]
**relevance** | **float** |  | [optional]
**sentiment** | **float** |  | [optional]
**ai_summary** | **string** | Model-generated one-to-two sentence FX/macro takeaway. Not an official statement. | [optional]
**ai_stance** | **string** | Model-assessed stance: &#x60;hawkish&#x60;, &#x60;dovish&#x60; or &#x60;neutral&#x60;. | [optional]
**ai_stance_score** | **float** | Model-assessed stance in [-1, 1]; positive is hawkish. | [optional]
**ai_next_meeting_action** | **string** | Model-assessed next policy action: &#x60;hike&#x60;, &#x60;cut&#x60; or &#x60;hold&#x60;. | [optional]
**ai_next_meeting_probability** | **float** | Model-assessed probability in [0, 1] of &#x60;ai_next_meeting_action&#x60; at the next meeting. | [optional]
**ai_rationale** | **string** | Model-generated one-sentence justification for the stance. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
