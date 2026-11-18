# webservco/data

A PHP component/library. Please see [webservco/sandbox](https://webservco.github.io/sandbox/) for an example project using these types of components.

Data transfer objects, and services that pull typed values, lists and maps out of mixed data such as request bodies, sessions and database rows.

- Related: `webservco/dependency-container` (`getDataExtractionContainer()`), `webservco/database`, `webservco/form`, `webservco/session` (all use it)

---

## Installation

```shell
composer require webservco/data
```

---

## Usage

```php
use WebServCo\Data\Container\Extraction\DataExtractionContainer;

// true: array keys can be paths like "user/address/city".
// \WebServCo\Data\Contract\Extraction\DataExtractionContainerInterface
$dataExtractionContainer = new DataExtractionContainer(true);

$data = ['user' => ['id' => '42', 'name' => 'Ana']];

// Loose: casts the string "42" to int.
$userId = $dataExtractionContainer->getLooseArrayDataExtractionService()->getInt($data, 'user/id');

// Strict and non-empty: must already be a string, and not ''.
$name = $dataExtractionContainer->getStrictArrayNonEmptyDataExtractionService()
    ->getNonEmptyString($data, 'user/name');

// Missing key: null.
$age = $dataExtractionContainer->getStrictArrayDataExtractionService()->getNullableInt($data, 'user/age');
```

There is also a scalar version of each service for a single value, for example `getLooseDataExtractionService()->getInt($value)`.

### Lists and maps

```php
// Strict: every item must already have its type. getLooseCollectionDataExtractionService() casts it.
// With the array storage setting of the container: here, keys can be paths.
// \WebServCo\Data\Contract\Extraction\CollectionDataExtractionServiceInterface
$collectionDataExtractionService = $dataExtractionContainer->getStrictCollectionDataExtractionService();

$data = ['user' => ['groupIds' => [3, 7], 'settings' => ['theme' => 'dark']]];

// list<int>: [3, 7]
$groupIds = $collectionDataExtractionService->getIntList($data, 'user/groupIds');

// array<string,string>: ['theme' => 'dark']
$settings = $collectionDataExtractionService->getStringMap($data, 'user/settings');

// Missing key, with a default: [].
$roles = $collectionDataExtractionService->getStringList($data, 'user/roles', []);

// The array as it is, for example a list of rows to read one by one.
$user = $collectionDataExtractionService->getArray($data, 'user');
```

`public/index.php` is a small demo page.

---

## Contracts

| Interface | Implementation | Purpose |
| --- | --- | --- |
| `Contract\Extraction\DataExtractionContainerInterface` | `Container\Extraction\DataExtractionContainer` | Gives access to all eight extraction services, the array storage service and the two collection services. |
| `Contract\Extraction\DataExtractionContainerFactoryInterface` | `Factory\Extraction\DataExtractionContainerFactory` | Creates the container. |
| `Contract\Extraction\Strict\Strict*Interface` | `Service\Extraction\Strict\Strict*Service` | The value must already have the requested type. |
| `Contract\Extraction\Loose\Loose*Interface` | `Service\Extraction\Loose\Loose*Service` | The value is cast to the requested type. |
| `Contract\Extraction\CollectionDataExtractionServiceInterface` | `Service\Extraction\CollectionDataExtractionService` | Typed lists and maps: `getArray`, `getIntList`, `getStringList`, `getStringMap`. |
| `Contract\Extraction\ArrayStorageServiceInterface` | `Service\Extraction\ArrayStorageService` | Reads nested values by a `/` separated path. |
| `Contract\Transfer\DataTransferInterface` | `DataTransferObject\KeyValue\StringString`, `StringFloat` | Marker interface for DTOs, plus two key/value DTOs. |

Each extraction family has scalar, non-empty scalar, array and non-empty array variants. Namespaces are relative to `WebServCo\Data\`.

---

## Notes

Use loose extraction for data that arrives as strings even when it means something else, like database results or route parts. Use strict extraction when a wrong type is a bug.

Array getters accept a default value as the third argument. Without a default, a missing key throws an `OutOfBoundsException`. Nullable getters return `null` for a missing key, and the int, float and bool ones also treat `''` as `null`. A value of the wrong type throws an `UnexpectedValueException`, and so does an empty value in a non-empty service.

The collection service works the same way for a missing key, a `null` value and a default. Its items get their type from the scalar service it is given, so the loose one casts `'3'` to `3`. Outside the container it is created with an array storage service (or `null`) and a scalar service: `new CollectionDataExtractionService($arrayStorageService, new StrictDataExtractionService())`. A list must be a list (keys `0`, `1`, ...), and a map must have string keys: PHP turns a numeric key such as `"1"` into an int, so such a map is refused. An item of the wrong type throws an `UnexpectedValueException` that names the key and the item, with the exception of the scalar service as its previous one.

---

## Development

```shell
# Start project.
ddev start
# Install dependencies.
ddev c u
# Run all validations.
ddev c c
# Run unit tests.
ddev c test:dox
```

---

## License

[MIT](LICENSE.md)
