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

## Detail

* Add `GridFieldLimiter` to your `GridFieldConfig`, and define a target fragment (defaults to `before`) 
* It will create two new target fragments, `limiter-before-left` and `limiter-before-right` (`before` comes from the defined target fragment)
* You can now fill these two fragments with grid field components, like a `GridFieldAddNewButton` on the left and a `GridFieldAddExistingAutocompleter` on the right, which will all be hidden (via css) from the CMS user once the grid field reaches its row limit
* If enabled, a message will be displayed to the user telling them to remove an item before they add a new one

Per the note above, this does not in anyway validate the number of objects in a relationship or prevent an object being added - it's just a cheeky way to implement a limit for CMS users managing a grid field.

## Usage example

XYZ

```php

```
