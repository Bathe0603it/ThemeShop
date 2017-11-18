<?php
    if(!function_exists('get_action_name')){
        function get_action_name($input = null){
            echo 'hello';
        }
    }

    if(!function_exists('dd')){
        function dd($input = null,$break = null){
            echo '<pre>';
            var_dump($input);
            echo '</pre>';
            if(empty($break))
            exit();
        }

    }

    if(!function_exists('ii')){
        function ii($input = null,$break = null){
            echo 'here<div style="display: none;">';
            echo '<pre>';
            var_dump($input);
            echo '</pre>';
            echo '</div>';
            if(!empty($break))
            exit();
        }

    }
    
    /**
    *
    * get template of fronted
    * @param string
    * @return string url
    *
    **/
    if(!function_exists('public_url')){
        function public_url($input = null){
            return base_url('templates/site/');
        }
    }
    
    /**
    *
    * show url now
    * @param string
    * @return string
    *
    **/
    if(!function_exists('url_now')){
        function url_now($input = null){
            return current_url().$input;
        }
    }
    
    /**
    *
    * check method request
    * @param null
    * @return bool
    *
    **/
    if(!function_exists('is_post')){
        function is_post($input = null){
            if ($_POST) {
                // $_SERVER['REQUEST_METHOD'] == 'POST'
                return true;
            }
            return false;
        }
    }
    
    /**
    *
    * check method request get
    * @param null
    * @return bool
    *
    **/
    if(!function_exists('is_get')){
        function is_get($input = null){
            if ($_GET) {
                // $_SERVER['REQUEST_METHOD'] == 'GET'
                return true;
            }
            return false;
        }
    }

    /**
    *
    * get class running
    * @param null
    * @return text
    *
    **/
    if(!function_exists('getObject')){
        function getObject(){
            $CI = &get_instance();
            return $CI->router->fetch_class();
        }
    }

    /**
    *
    * get method of class running
    * @param null
    * @return text
    *
    **/
    if(!function_exists('getMethod')){
        function getMethod($position = null){
            $CI = &get_instance();
            return $CI->router->fetch_method();
        }
    }

    /**
    *
    * function suppost to function slug helper
    * @param null
    * @return array
    *
    **/
    function charsArray()
    {
        return $charsArray = array(
            'a'    => array(
                            'à', 'á', 'ả', 'ã', 'ạ', 'ă', 'ắ', 'ằ', 'ẳ', 'ẵ',
                            'ặ', 'â', 'ấ', 'ầ', 'ẩ', 'ẫ', 'ậ', 'ä', 'ā', 'ą',
                            'å', 'α', 'ά', 'ἀ', 'ἁ', 'ἂ', 'ἃ', 'ἄ', 'ἅ', 'ἆ',
                            'ἇ', 'ᾀ', 'ᾁ', 'ᾂ', 'ᾃ', 'ᾄ', 'ᾅ', 'ᾆ', 'ᾇ', 'ὰ',
                            'ά', 'ᾰ', 'ᾱ', 'ᾲ', 'ᾳ', 'ᾴ', 'ᾶ', 'ᾷ', 'а', 'أ'),
            'b'    => array('б', 'β', 'Ъ', 'Ь', 'ب'),
            'c'    => array('ç', 'ć', 'č', 'ĉ', 'ċ'),
            'd'    => array('ď', 'ð', 'đ', 'ƌ', 'ȡ', 'ɖ', 'ɗ', 'ᵭ', 'ᶁ', 'ᶑ',
                            'д', 'δ', 'د', 'ض'),
            'e'    => array('é', 'è', 'ẻ', 'ẽ', 'ẹ', 'ê', 'ế', 'ề', 'ể', 'ễ',
                            'ệ', 'ë', 'ē', 'ę', 'ě', 'ĕ', 'ė', 'ε', 'έ', 'ἐ',
                            'ἑ', 'ἒ', 'ἓ', 'ἔ', 'ἕ', 'ὲ', 'έ', 'е', 'ё', 'э',
                            'є', 'ə'),
            'f'    => array('ф', 'φ', 'ف'),
            'g'    => array('ĝ', 'ğ', 'ġ', 'ģ', 'г', 'ґ', 'γ', 'ج'),
            'h'    => array('ĥ', 'ħ', 'η', 'ή', 'ح', 'ه'),
            'i'    => array('í', 'ì', 'ỉ', 'ĩ', 'ị', 'î', 'ï', 'ī', 'ĭ', 'į',
                            'ı', 'ι', 'ί', 'ϊ', 'ΐ', 'ἰ', 'ἱ', 'ἲ', 'ἳ', 'ἴ',
                            'ἵ', 'ἶ', 'ἷ', 'ὶ', 'ί', 'ῐ', 'ῑ', 'ῒ', 'ΐ', 'ῖ',
                            'ῗ', 'і', 'ї', 'и'),
            'j'    => array('ĵ', 'ј', 'Ј'),
            'k'    => array('ķ', 'ĸ', 'к', 'κ', 'Ķ', 'ق', 'ك'),
            'l'    => array('ł', 'ľ', 'ĺ', 'ļ', 'ŀ', 'л', 'λ', 'ل'),
            'm'    => array('м', 'μ', 'م'),
            'n'    => array('ñ', 'ń', 'ň', 'ņ', 'ŉ', 'ŋ', 'ν', 'н', 'ن'),
            'o'    => array('ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ố', 'ồ', 'ổ', 'ỗ',
                            'ộ', 'ơ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ', 'ø', 'ō', 'ő',
                            'ŏ', 'ο', 'ὀ', 'ὁ', 'ὂ', 'ὃ', 'ὄ', 'ὅ', 'ὸ', 'ό',
                            'ö', 'о', 'و', 'θ'),
            'p'    => array('п', 'π'),
            'r'    => array('ŕ', 'ř', 'ŗ', 'р', 'ρ', 'ر'),
            's'    => array('ś', 'š', 'ş', 'с', 'σ', 'ș', 'ς', 'س', 'ص'),
            't'    => array('ť', 'ţ', 'т', 'τ', 'ț', 'ت', 'ط'),
            'u'    => array('ú', 'ù', 'ủ', 'ũ', 'ụ', 'ư', 'ứ', 'ừ', 'ử', 'ữ',
                            'ự', 'ü', 'û', 'ū', 'ů', 'ű', 'ŭ', 'ų', 'µ', 'у'),
            'v'    => array('в'),
            'w'    => array('ŵ', 'ω', 'ώ'),
            'x'    => array('χ'),
            'y'    => array('ý', 'ỳ', 'ỷ', 'ỹ', 'ỵ', 'ÿ', 'ŷ', 'й', 'ы', 'υ',
                            'ϋ', 'ύ', 'ΰ', 'ي'),
            'z'    => array('ź', 'ž', 'ż', 'з', 'ζ', 'ز'),
            'aa'   => array('ع'),
            'ae'   => array('æ'),
            'ch'   => array('ч'),
            'dj'   => array('ђ', 'đ'),
            'dz'   => array('џ'),
            'gh'   => array('غ'),
            'kh'   => array('х', 'خ'),
            'lj'   => array('љ'),
            'nj'   => array('њ'),
            'oe'   => array('œ'),
            'ps'   => array('ψ'),
            'sh'   => array('ш'),
            'shch' => array('щ'),
            'ss'   => array('ß'),
            'th'   => array('þ', 'ث', 'ذ', 'ظ'),
            'ts'   => array('ц'),
            'ya'   => array('я'),
            'yu'   => array('ю'),
            'zh'   => array('ж'),
            '(c)'  => array('©'),
            'A'    => array('Á', 'À', 'Ả', 'Ã', 'Ạ', 'Ă', 'Ắ', 'Ằ', 'Ẳ', 'Ẵ',
                            'Ặ', 'Â', 'Ấ', 'Ầ', 'Ẩ', 'Ẫ', 'Ậ', 'Ä', 'Å', 'Ā',
                            'Ą', 'Α', 'Ά', 'Ἀ', 'Ἁ', 'Ἂ', 'Ἃ', 'Ἄ', 'Ἅ', 'Ἆ',
                            'Ἇ', 'ᾈ', 'ᾉ', 'ᾊ', 'ᾋ', 'ᾌ', 'ᾍ', 'ᾎ', 'ᾏ', 'Ᾰ',
                            'Ᾱ', 'Ὰ', 'Ά', 'ᾼ', 'А'),
            'B'    => array('Б', 'Β'),
            'C'    => array('Ç','Ć', 'Č', 'Ĉ', 'Ċ'),
            'D'    => array('Ď', 'Ð', 'Đ', 'Ɖ', 'Ɗ', 'Ƌ', 'ᴅ', 'ᴆ', 'Д', 'Δ'),
            'E'    => array('É', 'È', 'Ẻ', 'Ẽ', 'Ẹ', 'Ê', 'Ế', 'Ề', 'Ể', 'Ễ',
                            'Ệ', 'Ë', 'Ē', 'Ę', 'Ě', 'Ĕ', 'Ė', 'Ε', 'Έ', 'Ἐ',
                            'Ἑ', 'Ἒ', 'Ἓ', 'Ἔ', 'Ἕ', 'Έ', 'Ὲ', 'Е', 'Ё', 'Э',
                            'Є', 'Ə'),
            'F'    => array('Ф', 'Φ'),
            'G'    => array('Ğ', 'Ġ', 'Ģ', 'Г', 'Ґ', 'Γ'),
            'H'    => array('Η', 'Ή'),
            'I'    => array('Í', 'Ì', 'Ỉ', 'Ĩ', 'Ị', 'Î', 'Ï', 'Ī', 'Ĭ', 'Į',
                            'İ', 'Ι', 'Ί', 'Ϊ', 'Ἰ', 'Ἱ', 'Ἳ', 'Ἴ', 'Ἵ', 'Ἶ',
                            'Ἷ', 'Ῐ', 'Ῑ', 'Ὶ', 'Ί', 'И', 'І', 'Ї'),
            'K'    => array('К', 'Κ'),
            'L'    => array('Ĺ', 'Ł', 'Л', 'Λ', 'Ļ'),
            'M'    => array('М', 'Μ'),
            'N'    => array('Ń', 'Ñ', 'Ň', 'Ņ', 'Ŋ', 'Н', 'Ν'),
            'O'    => array('Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ố', 'Ồ', 'Ổ', 'Ỗ',
                            'Ộ', 'Ơ', 'Ớ', 'Ờ', 'Ở', 'Ỡ', 'Ợ', 'Ö', 'Ø', 'Ō',
                            'Ő', 'Ŏ', 'Ο', 'Ό', 'Ὀ', 'Ὁ', 'Ὂ', 'Ὃ', 'Ὄ', 'Ὅ',
                            'Ὸ', 'Ό', 'О', 'Θ', 'Ө'),
            'P'    => array('П', 'Π'),
            'R'    => array('Ř', 'Ŕ', 'Р', 'Ρ'),
            'S'    => array('Ş', 'Ŝ', 'Ș', 'Š', 'Ś', 'С', 'Σ'),
            'T'    => array('Ť', 'Ţ', 'Ŧ', 'Ț', 'Т', 'Τ'),
            'U'    => array('Ú', 'Ù', 'Ủ', 'Ũ', 'Ụ', 'Ư', 'Ứ', 'Ừ', 'Ử', 'Ữ',
                            'Ự', 'Û', 'Ü', 'Ū', 'Ů', 'Ű', 'Ŭ', 'Ų', 'У'),
            'V'    => array('В'),
            'W'    => array('Ω', 'Ώ'),
            'X'    => array('Χ'),
            'Y'    => array('Ý', 'Ỳ', 'Ỷ', 'Ỹ', 'Ỵ', 'Ÿ', 'Ῠ', 'Ῡ', 'Ὺ', 'Ύ',
                            'Ы', 'Й', 'Υ', 'Ϋ'),
            'Z'    => array('Ź', 'Ž', 'Ż', 'З', 'Ζ'),
            'AE'   => array('Æ'),
            'CH'   => array('Ч'),
            'DJ'   => array('Ђ'),
            'DZ'   => array('Џ'),
            'KH'   => array('Х'),
            'LJ'   => array('Љ'),
            'NJ'   => array('Њ'),
            'PS'   => array('Ψ'),
            'SH'   => array('Ш'),
            'SHCH' => array('Щ'),
            'SS'   => array('ẞ'),
            'TH'   => array('Þ'),
            'TS'   => array('Ц'),
            'YA'   => array('Я'),
            'YU'   => array('Ю'),
            'ZH'   => array('Ж'),
            ' '    => array("\xC2\xA0", "\xE2\x80\x80", "\xE2\x80\x81",
                            "\xE2\x80\x82", "\xE2\x80\x83", "\xE2\x80\x84",
                            "\xE2\x80\x85", "\xE2\x80\x86", "\xE2\x80\x87",
                            "\xE2\x80\x88", "\xE2\x80\x89", "\xE2\x80\x8A",
                            "\xE2\x80\xAF", "\xE2\x81\x9F", "\xE3\x80\x80"),
        );
    }

    /**
    *
    * get slug text input
    * @param text,array
    * @return text
    *
    **/
    if (!function_exists('slug')) {
        function slug($str,$removeUnsupported = null){
            foreach (charsArray() as $key => $value) {
                $str = str_replace($value, $key, $str);
            }

            if ($removeUnsupported) {
                $str = preg_replace('/[^\x20-\x7E]/u', '', $str);
            }

            $separator = '-';
            $title = $str;

            // Convert all dashes/underscores into separator
            $flip = $separator == '-' ? '_' : '-';

            $title = preg_replace('!['.preg_quote($flip).']+!u', $separator, $title);

            // Remove all characters that are not the separator, letters, numbers, or whitespace.
            $title = preg_replace('![^'.preg_quote($separator).'\pL\pN\s]+!u', '', mb_strtolower($title));

            // Replace all separator characters and whitespace by a single separator
            $title = preg_replace('!['.preg_quote($separator).'\s]+!u', $separator, $title);

            return trim($title, $separator);
        }
    }
?>