# Paginator
A simple paginator structure

## Requirements

- PHP 7.1+
- PHPUnit for test purposes

## Installation

Paginator can be installed thanks to composer.

Simply edit your composer.json file and add the following:
```
"repositories": [
    {
        "type":"package",
        "package": {
          "name": "philippe-jung/paginator",
          "version":"master",
          "source": {
              "url": "https://github.com/philippe-jung/paginator.git",
              "type": "git",
              "reference":"master"
            }
        }
    }
],
"require": {
    "philippe-jung/paginator": "dev-master"
}
```

## Implementation

You can have a look at `test/Paginator/Example/GreekAlphabetPaginator.php` for an example of implementation.

Please note that `public function getElementsForPage(int $pageIndex): array;` is the only method that needs to be "clever". This is where you need to slice your data collection or perform a database/service/... call. 

## Running the tests

To run the tests, simply go in the "test" folder and run `phpunit`.

## Adding tests

All you need to do it is add a Test file with a `public function getPaginator(): PaginatorInterface;` method. See `test/Paginator/Example/GreekAlphabetPaginator.php` and `test/Paginator/GreekAlphabetAllTest.php` for an example.
