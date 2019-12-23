<?php

namespace dkhlystov\helpers;

/**
 * Translit helper class
 * Most friendly with Google and Yandex.
 * 
 * Implemented:
 * - Basic Latin (ASCII)
 * - Latin-1 Supplement
 * - Latin Extended-A
 * - Cyrillic
 * - Greek and Coptic
 */
class Translit
{
    /**
     * @var array replace chars
     */
    public static $replace = [
        'a' => 'àáâãäåāăąаα',
        'b' => 'бβ',
        'c' => 'çćĉċč',
        'd' => 'ðďđдδ',
        'e' => 'èéêëēĕėęěеёэε',
        'f' => 'фφ',
        'g' => 'ĝğġģгγ',
        'h' => 'ĥħхη',
        'i' => 'ìíîïĩīĭįıиіїι',
        'j' => 'ĵжј',
        'k' => 'ķĸкκ',
        'l' => 'ĺļľŀłлλ',
        'm' => 'мμ',
        'n' => 'ñńņňŉŋнν',
        'o' => 'òóôõöōŏőоο',
        'p' => 'пπ',
        'r' => 'ŕŗřрρ',
        's' => 'šśŝşſсσ',
        't' => 'ţťŧтτ',
        'u' => 'ùúûüũūŭůűųую',
        'v' => 'в',
        'w' => 'ŵω',
        'x' => 'ξ',
        'y' => 'ýÿŷйыυ',
        'z' => 'źżžзζ',
        '-' => ' .,—‐/+',
    ];

    /**
     * @var array extended replace list
     */
    public static $extended = [
        'æ' => 'ae', 'œ' => 'oe', 'ĳ' => 'ij',
        'ц' => 'ts', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shh', 'я' => 'ya',
        'θ' => 'th', 'χ' => 'ch', 'ψ' => 'ps',
    ];

    /**
     * Tranlit
     * @param string $text text for transliteration
     * @return string
     */
    public static function t($text)
    {
        $text = mb_strtolower($text);

        // Replace
        foreach (self::$replace as $t => $s) {
            $text = preg_replace('/[' . preg_quote($s) . ']/', $t, $text);
        }

        // Extended
        foreach (self::$extended as $s => $t) {
            $text = preg_replace('/[' . preg_quote($s) . ']/', $t, $text);
        }

        // Remove symbols
        $text = preg_replace('/[^\-0-9a-z]+/i', '', $text);

        // Double spaces
        $text = preg_replace('/\-+/', '-', $text);

        // Spaces at begin and end
        $text = preg_replace('/^\-*(.*?)\-*$/', '$1', $text);

        return $text;
    }
}
