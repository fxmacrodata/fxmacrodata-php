# ReleaseTiming

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**scheduled_at** | **string** | Official scheduled release time (ISO 8601, UTC). | [optional]
**published_after** | **string** | The official source still showed the previous period after this instant (ISO 8601, UTC), or its &#x60;Last-Modified&#x60; header placed the update after it. Null when no such read was made. | [optional]
**published_by** | **string** | The first read of the official source that showed this period completed at this instant (ISO 8601, UTC), so the release was public by then. Null when the window could not be bounded. | [optional]
**publication_window_basis** | **string** | How the window was bounded: &#x60;poll_bracket&#x60; (a read showing the previous period, then a read showing this one), &#x60;last_modified&#x60; (the source&#39;s &#x60;Last-Modified&#x60; header sets the lower bound), or &#x60;first_new_period_read_only&#x60; (only the upper bound is known). | [optional]
**collected_at** | **string** | When FXMacroData first captured this value from the official source (ISO 8601, UTC). Same instant as &#x60;collected_at_iso&#x60;. | [optional]
**available_at** | **string** | When this value was committed to the FXMacroData store and readable through the API (ISO 8601, UTC, microsecond precision). Null on rows captured before this time was recorded. | [optional]
**pickup_ms_min** | **float** | Milliseconds from &#x60;published_by&#x60; to &#x60;available_at&#x60;: the shortest time the value can have taken to become available after publication. Null when either time is missing or &#x60;available_at&#x60; precedes &#x60;published_by&#x60;. | [optional]
**pickup_ms_max** | **float** | Milliseconds from &#x60;published_after&#x60; to &#x60;available_at&#x60;: the value was available through the API within this long of publication. Null when no read showed the previous period still in place, or when &#x60;available_at&#x60; is missing. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
