var translit = {
    replace: {
        'a': 'àáâãäåāăąаα',
        'b': 'бβ',
        'c': 'çćĉċč',
        'd': 'ðďđдδ',
        'e': 'èéêëēĕėęěеёэε',
        'f': 'фφ',
        'g': 'ĝğġģгγ',
        'h': 'ĥħхη',
        'i': 'ìíîïĩīĭįıиіїι',
        'j': 'ĵжј',
        'k': 'ķĸкκ',
        'l': 'ĺļľŀłлλ',
        'm': 'мμ',
        'n': 'ñńņňŉŋнν',
        'o': 'òóôõöōŏőоο',
        'p': 'пπ',
        'r': 'ŕŗřрρ',
        's': 'šśŝşſсσ',
        't': 'ţťŧтτ',
        'u': 'ùúûüũūŭůűųую',
        'v': 'в',
        'w': 'ŵω',
        'x': 'ξ',
        'y': 'ýÿŷйыυ',
        'z': 'źżžзζ',
        '-': ' .,—‐/+'
    },
    extended: {
        'æ': 'ae', 'œ': 'oe', 'ĳ': 'ij',
        'ц': 'ts', 'ч': 'ch', 'ш': 'sh', 'щ': 'shh', 'я': 'ya',
        'θ': 'th', 'χ': 'ch', 'ψ': 'ps'
    },
    t: function(str) {
        str = str.toLowerCase();
        for (var s in this.replace) {
            str = str.replace(new RegExp('[' + this.preg_quote(this.replace[s]) + ']', 'g'), s);
        }
        for (var s in this.extended) {
            str = str.replace(new RegExp('[' + this.preg_quote(s) + ']', 'g'), this.extended[s]);
        }
        return str.replace(/[^\-0-9a-z]/ig, '').replace(/\-+/g, '-').replace(/^\-*(.*?)\-*$/, '$1');
    },
    preg_quote: function(str, delimiter) {
        return (str + '')
            .replace(new RegExp('[.\\\\+*?\\[\\^\\]$(){}=!<>|:\\' + (delimiter || '') + '-]', 'g'), '\\$&');
    }
}
