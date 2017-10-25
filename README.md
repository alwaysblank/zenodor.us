**zenodor.us 🔩**

# Core

Zenodorus is a collection of simple PHP tools built with "do only one thing" 
Linux philosophy. I built this primarily for my own personal use, but you're 
free to use it as well!

## Packages

- [zenodorus/strings](https://github.com/alwaysblank/zenodorus-strings) - Do things with strings!
- [zenodorus/arrays](https://github.com/alwaysblank/zenodorus-arrays) - (Don't) spend days on arrays!
- ???

## Usage

```bash
$ composer require zenodorus/strings
```

```php
$new_string = Zenodorus\Strings::clean("clean me up", "_");
echo $new_string;
// 'clean_me_up'
```

See the packages themselves for more details about their methods.
