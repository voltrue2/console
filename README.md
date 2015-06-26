# Console

It outputs logging text in your browser console.

If you are dealing with PHP-based web applications that are a mess, this maybe a hady tool.

## How To Use

```
require_once('/path/to/console/index.php');

$console = new Console();
$console->log(1, true, null, 'foo');
```

## Methods

#### .log()

Output logging text as `console.log()` in your browser.

#### .warn()

Output logging text as `console.warn()` in your browser.

#### .error()

Output logging text as `console.error()` in your browser.

## Catching Uncaught Exception in PHP

`Console` class catches uncaught exception in PHP and outputs an error log to your browser.
