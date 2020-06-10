# OpenAPI\Client\ModifiersApi

All URIs are relative to *https://demo.phppointofsale.com/index.php/api/v1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**addModifier**](ModifiersApi.md#addModifier) | **POST** /modifiers | Add a new modifier to the store
[**batchModifier**](ModifiersApi.md#batchModifier) | **POST** /modifiers/batch | Bulk create, update, and delete modifiers
[**deleteModifier**](ModifiersApi.md#deleteModifier) | **DELETE** /modifiers/{modifier_id} | Deletes a modifier
[**getModifierByID**](ModifiersApi.md#getModifierByID) | **GET** /modifiers/{modifier_id} | Find modifier by modifier number or ID
[**searchModifiers**](ModifiersApi.md#searchModifiers) | **GET** /modifiers | List modifiers
[**updateModifier**](ModifiersApi.md#updateModifier) | **POST** /modifiers/{modifier_id} | Update a modifier



## addModifier

> \OpenAPI\Client\Model\Modifier addModifier($new_modifier)

Add a new modifier to the store

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new OpenAPI\Client\Api\ModifiersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$new_modifier = new \OpenAPI\Client\Model\NewModifier(); // \OpenAPI\Client\Model\NewModifier | Modifier object that needs to be added to the POS

try {
    $result = $apiInstance->addModifier($new_modifier);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ModifiersApi->addModifier: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **new_modifier** | [**\OpenAPI\Client\Model\NewModifier**](../Model/NewModifier.md)| Modifier object that needs to be added to the POS |

### Return type

[**\OpenAPI\Client\Model\Modifier**](../Model/Modifier.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## batchModifier

> \OpenAPI\Client\Model\BulkModifiersResponse batchModifier($bulk_modifiers)

Bulk create, update, and delete modifiers

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new OpenAPI\Client\Api\ModifiersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$bulk_modifiers = new \OpenAPI\Client\Model\BulkModifiers(); // \OpenAPI\Client\Model\BulkModifiers | Modifier objects that needs to be batched

try {
    $result = $apiInstance->batchModifier($bulk_modifiers);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ModifiersApi->batchModifier: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **bulk_modifiers** | [**\OpenAPI\Client\Model\BulkModifiers**](../Model/BulkModifiers.md)| Modifier objects that needs to be batched |

### Return type

[**\OpenAPI\Client\Model\BulkModifiersResponse**](../Model/BulkModifiersResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## deleteModifier

> \OpenAPI\Client\Model\ModifierResponse deleteModifier($modifier_id)

Deletes a modifier

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new OpenAPI\Client\Api\ModifiersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$modifier_id = 'modifier_id_example'; // string | ID of modifier to return

try {
    $result = $apiInstance->deleteModifier($modifier_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ModifiersApi->deleteModifier: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **modifier_id** | **string**| ID of modifier to return |

### Return type

[**\OpenAPI\Client\Model\ModifierResponse**](../Model/ModifierResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getModifierByID

> \OpenAPI\Client\Model\ModifierResponse getModifierByID($modifier_id)

Find modifier by modifier number or ID

Returns a single modifier

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new OpenAPI\Client\Api\ModifiersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$modifier_id = 'modifier_id_example'; // string | ID of modifier to return

try {
    $result = $apiInstance->getModifierByID($modifier_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ModifiersApi->getModifierByID: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **modifier_id** | **string**| ID of modifier to return |

### Return type

[**\OpenAPI\Client\Model\ModifierResponse**](../Model/ModifierResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## searchModifiers

> \OpenAPI\Client\Model\Modifier[] searchModifiers()

List modifiers

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new OpenAPI\Client\Api\ModifiersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->searchModifiers();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ModifiersApi->searchModifiers: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\Modifier[]**](../Model/Modifier.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## updateModifier

> \OpenAPI\Client\Model\ModifierResponse updateModifier($modifier_id, $new_modifier)

Update a modifier

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new OpenAPI\Client\Api\ModifiersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$modifier_id = 'modifier_id_example'; // string | modifier id/number to update
$new_modifier = new \OpenAPI\Client\Model\NewModifier(); // \OpenAPI\Client\Model\NewModifier | Modifier that needs to be added to the store

try {
    $result = $apiInstance->updateModifier($modifier_id, $new_modifier);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ModifiersApi->updateModifier: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **modifier_id** | **string**| modifier id/number to update |
 **new_modifier** | [**\OpenAPI\Client\Model\NewModifier**](../Model/NewModifier.md)| Modifier that needs to be added to the store |

### Return type

[**\OpenAPI\Client\Model\ModifierResponse**](../Model/ModifierResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)

