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

### Array data extraction service

Two service types available:

#### ArrayDataExtractionService

#### ArrayNonEmptyDataExtractionService

As above except validates data to be non empty.

Both service types can be used as:

##### Strict

Data must be of the type specified.

#### Loose

Data is cast to the specified type when extracting.

Example use case: database result where everything is a string.

---

## TODO

- Improve the `getNullable*` methods;
