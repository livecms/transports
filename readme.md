## Welcome to Transport ##

The idea is how to transport your code (HTML and Javascript) from your business logic (Model - Controller) into View.

Like a global variable, when can set and access it from anywhere in our code.

Currently we provide HTMLTransport and JavascriptTransport.
For HTML Transport, you can give it the name each time you set (inserting) the code into it, just like a variable.
For Javascript, you can not insert identical script, just to make sure you don't duplicate your javascript code.

## How to use ##

Install via composer :

``` shell
    composer require livecms/transports
```

HTML :

``` php

require vendor/autoload.php;

$htmlTransport = new LiveCMS\Transport\HtmlTransport;

// Set new transport with name 'form'
$html = '<div class="input"><input type="text" name="name" /></div>';
$htmlTransport->set($html, 'form');

// Set new transport with name 'message'
$html = '<div class="message">Hello, Admin</div>';
$htmlTransport->set($html, 'message');

// Append code to 'form'
$html = '<div class="input"><input type="email" name="email" /></div>';
$htmlTransport->append($html, 'form');

// Show content of 'form'
echo $htmlTransport->get('form');

/**
Result :
<div class="input"><input type="text" name="name" /></div>
<div class="input"><input type="email" name="email" /></div>
*/

// Delete content of 'form'
$htmlTransport->flush('form');
echo $htmlTransport->get('form');

/**
Result :
*/

// Use method pull() to get content and delete it.
echo $htmlTransport->pull('form');

// Delete all content
$htmlTransport->flushAll();
echo $htmlTransport->get('message');

/**
Result :
*/

```

Javascript :

``` php

require vendor/autoload.php;

$jsTransport = new LiveCMS\Transport\JavascriptTransport;

// Set new javascript code
$js = <<<JS
    $(':input').first().addClass('focus');
JS;
$jsTransport->set($js);

// Adding another javascript code
$js = <<<JS
    $('.message').text('Hi, bro. Whats up?');
JS;
$jsTransport->append($js);

// Adding another javascript code that same with previous, the code will not be saved.
$js = <<<JS
    $(':input').first().addClass('focus');
JS;
$jsTransport->set($js);

// Show content
echo $jsTransport->get();

/**
Result :
    $(':input').first().addClass('focus');
    $('.message').text('Hi, bro. Whats up?');
*/

// Delete content
$jsTransport->flush();
echo $jsTransport->get();

/**
Result :
*/
```

## LICENSE ##
MIT

## CONTRIBUTING ##
Fork this repo and make a pull request

## ISSUE AND DISCUSSION ##
Please create new issue or see the closed issues too.
