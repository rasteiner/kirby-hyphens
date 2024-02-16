<?php

namespace rasteiner\KirbyHyphens;

use Kirby\Cms\App as Kirby;
use Kirby\Content\Field;
use Vanderlee\Syllable\Hyphen\Soft;
use Vanderlee\Syllable\Syllable;

if(file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

Kirby::plugin('rasteiner/kirby-hyphens', [
    'options' => [
        // Minimum word length to hyphenate, set to 0 to hyphenate all words
        'minWordLength' => 5,

        // Hyphenation of HTML content
        'html' => true,

        // Language to use for hyphenation, see https://hyphenation.org/#languages for available languages
        'language' => null,

        // Map Kirby language codes to TeX dictionary names
        'languageMap' => [
            'en' => 'en-gb'
        ],

        // Hyphenation character to use
        'hyphen' => new Soft,

        // Enable cache for compiled hyphenation patterns
        'cache' => true,
    ],
    'fieldMethods' => [
        'hyphenate' => function(Field $field, ?int $minWordLength=null, ?bool $html=null, ?string $language=null, ?string $hyphen=null) {
            /**
             * @var array<string, Syllable> $hyphenator
             */
            static $hyphenator = [];
            
            $language ??= option('rasteiner.kirby-hyphens.language', kirby()->multilang() ? kirby()->language()->code() : 'en');

            $minWordLength ??= option('rasteiner.kirby-hyphens.minWordLength');
            $html ??= option('rasteiner.kirby-hyphens.html');
            $hyphen ??= option('rasteiner.kirby-hyphens.hyphen');

            if(isset($hyphenator[$language])) {
                $syllable = $hyphenator[$language];
            } else {
                $map = option('rasteiner.kirby-hyphens.languageMap');

                $syllable = $hyphenator[$language] = new Syllable($map[$language] ?? $language);
                $syllable->setCache(new CacheAdapter(kirby()->cache('rasteiner.kirby-hyphens')));
            }
            
            $syllable->setHyphen($hyphen);
            $syllable->setMinWordLength($minWordLength);

            $field->value = $html ? $syllable->hyphenateHtmlText($field->value) : $syllable->hyphenateText($field->value);
            return $field;
        }
    ]
]);