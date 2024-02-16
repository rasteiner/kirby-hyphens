# Kirby 3 / 4 Hyphens Plugin

This is a plugin for Kirby 3 and 4 that provides automatic hyphenation for your text content. It uses the [Vanderlee PHP Syllable library](https://github.com/vanderlee/phpSyllable) to perform hyphenation.

## Installation

### Download
Download and copy this repository to /site/plugins/kirby-hyphens.

### Git submodule
```
git submodule add https://github.com/rasteiner/kirby-hyphens.git site/plugins/kirby-hyphens
```

### Composer
```
composer require rasteiner/kirby-hyphens
```

## Usage

The plugin provides a `hyphenate` field method that you can use in your templates:

```html+php
<?php /* all the arguments are optional */ ?>
<h1 class="text-4xl">
    <?= $page->title()->html()->hyphenate(
        minWordLength: 5,
        html: true,
        language: 'en',
        hyphen: '&shy;',
    ); ?>
</h1>
```

## Configuration

You can configure the same parameters, and more, in your config file `site/config/config.php`:

```php
<?php 

// these are default values:
return [
    // Set to 0 to hyphenate all words
    // default: 5
    'rasteiner.kirby-hyphens.minWordLength' => 5, 

    // Should the text be treated as HTML?
    // default: true
    'rasteiner.kirby-hyphens.html' => true, 

    // Language to use for hyphenation,
    // see https://hyphenation.org/#languages for available languages.
    // Set to null to use the current Kirby language in multi-language setups.
    // for multi-language setups, see the language-map config option below.
    // default: null
    'rasteiner.kirby-hyphens.language' => null, 

    // For multi-language setups: 
    // Map Kirby language codes to TeX hyphenation dictionary codes, since they don't always match.
    // see https://hyphenation.org/#languages for available codes.
    // default: [ 'en' => 'en-gb' ]
    'rasteiner.kirby-hyphens.language-map' => [ 'de' => 'de-ch-1901' ],

    // hyphenation character to insert into the text
    // default is the soft hyphen character (&shy; in HTML)
    'rasteiner.kirby-hyphens.hyphen' => '-',

    // enable cache for compiled hyphenation patterns
    // default is true
    'rasteiner.kirby-hyphens.cache' => true,
];
```

## License

This plugin is open-sourced software licensed under the MIT license.
