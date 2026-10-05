# AnnouncementChangeEvent

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**event_id** | **string** |  |
**currency** | **string** |  |
**indicator** | **string** |  |
**records_written** | **int** |  | [optional]
**timestamp** | **float** |  | [optional]
**release_timestamp** | **float** |  | [optional]
**latest_announcement** | [**\FXMacroData\Model\ReleaseDeliveryAnnouncement**](ReleaseDeliveryAnnouncement.md) |  | [optional]
**delivery_mode** | **string** |  | [optional]
**origin_delivery_mode** | **string** |  | [optional]
**source_fresh_at_ns** | **float** |  | [optional]
**stream_ready_at_ns** | **float** |  | [optional]
**server_sent_at_ns** | **float** | Time FXMacroData sent this event, as Unix epoch nanoseconds (UTC). | [optional]
**acknowledgement_endpoint** | **string** | Endpoint for acknowledging receipt of a streamed event. Present only on &#x60;/v1/stream/events&#x60; deliveries; never set on &#x60;/v1/announcements/changes&#x60;. | [optional]
**age_ms** | **float** | Event age in milliseconds when it was sent. Present only on &#x60;/v1/stream/events&#x60; deliveries; never set on &#x60;/v1/announcements/changes&#x60;. | [optional]
**stale_after_ms** | **float** | Age in milliseconds after which a streamed event is considered stale. Present only on &#x60;/v1/stream/events&#x60; deliveries; never set on &#x60;/v1/announcements/changes&#x60;. | [optional]
**stale** | **bool** | True when the event was older than &#x60;stale_after_ms&#x60; when sent. Present only on &#x60;/v1/stream/events&#x60; deliveries; never set on &#x60;/v1/announcements/changes&#x60;. | [optional]
**late_delivery** | **bool** | True when the event was sent after its staleness threshold. Present only on &#x60;/v1/stream/events&#x60; deliveries; never set on &#x60;/v1/announcements/changes&#x60;. | [optional]
**late_events_are_delivered** | **bool** |  | [optional]
**scheduled_release_at_ns** | **float** |  | [optional]
**scheduled_to_server_send_ms** | **float** | Milliseconds from the scheduled release time to the time FXMacroData sent this event. | [optional]
**source_late** | **bool** |  | [optional]
**source_late_by_ms** | **float** |  | [optional]
**source_delay_proven** | **bool** |  | [optional]
**platform_delivery_after_source_ms** | **float** |  | [optional]
**polling_started_at_ns** | **float** |  | [optional]
**polling_started_lag_ms** | **float** |  | [optional]
**polling_started_before_scheduled_release** | **bool** |  | [optional]
**pre_fresh_stale_poll_count** | **float** |  | [optional]
**last_stale_fetch_completed_at_ns** | **float** |  | [optional]
**first_fresh_response_completed_at_ns** | **float** |  | [optional]
**official_source_stale_after_scheduled_release** | **bool** |  | [optional]
**scheduled_to_first_fresh_response_ms** | **float** |  | [optional]
**source_freshness_observation_window_start_at_ns** | **float** |  | [optional]
**source_freshness_observation_window_end_at_ns** | **float** |  | [optional]
**source_freshness_observation_window_ms** | **float** |  | [optional]
**source_freshness_observation_basis** | **string** |  | [optional]
**source_delay_attribution** | **string** |  | [optional]
**fxmd_delivery_attribution** | **string** |  | [optional]
**fxmd_after_source_ms** | **float** |  | [optional]
**fxmd_after_source_slo_met** | **bool** |  | [optional]
**catchup_source** | **string** |  | [optional]
**catchup_delay_ms** | **float** |  | [optional]
**recovery_class** | **string** |  | [optional]
**subsecond_status** | **string** |  | [optional]
**subsecond_operational_status** | **string** |  | [optional]
**subsecond_guarantee_active** | **bool** |  | [optional]
**subsecond_contract_outcome** | **string** |  | [optional]
**subsecond_contract_breached** | **bool** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
