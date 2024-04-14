# webservco/data

A PHP component/library for data handling.

---

## Data transfer

### Interfaces

#### `DataTransferInterface`.

### Objects

#### Key / Value objects

##### `StringString`

---

## Data extraction

### Scalar data extraction service
### Array data extraction service

Note: for multidimensional arrays, array key can also be a special formatted string using `/` as separator.

Example: "foo/bar/baz".

Two service types available:

#### DataExtractionService

#### NonEmptyDataExtractionService

As above except validates data to be non-empty.

Both service types can be used as:

##### Strict

Data must be of the type specified.

#### Loose

Data is cast to the specified type when extracting.

Example use case: database result where everything is a string.

---

## Development

### Run code validation

```shell
composer check:phpcs && composer check:phpstan && composer check:phpmd && composer check:psalm && composer check:phan
```

### Run unit tests

```shell
composer test:dox
```
