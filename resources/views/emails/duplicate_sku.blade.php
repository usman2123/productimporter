@component('mail::message')
# Duplicate SKU Detected

A product with the same SKU already exists in the database:

**Title:** {{ $product['title'] }}
**SKU:** {{ $product['sku'] }}
**Type:** {{ $product['type'] }}

Please review and take necessary action.

Thanks,
{{ config('app.name') }}
@endcomponent