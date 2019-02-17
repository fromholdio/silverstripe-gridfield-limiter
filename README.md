# silverstripe-gridfield-limiter

Small module to limit number of records that can be added to a SilverStripe GridField.

Important - this module does not validate the number of records being added against a set limit, or prevent them being added at an ORM/code-level.

Instead, it manipulates the `GridField` UI to prevent a CMS user adding more records once a set limit is reached.

* It hides `GridFieldAddNewButton`, `GridFieldAddExistingAutocompleter` and other `GridFieldComponent`s you define, if the limit is reached
* Optionally, if limit has been reached, a message is also presented to the user notifying them of this 

## Requirements

SilverStripe 4.2+

## Installation

`composer require fromholdio/silverstripe-gridfield-limiter`

## Usage example

XYZ

```php

```
