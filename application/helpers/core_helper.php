<?php defined('BASEPATH') or exit('No direct script access allowed');




if (!function_exists('pre')) {
    function pre($val)
    {
        echo "<pre>";
        print_r($val);
        echo "</pre>";
    }
}

if (!function_exists('prex')) {
    function prex($val)
    {
        echo "<pre>";
        print_r($val);
        echo "</pre>";
        exit;
    }
}

if (!function_exists('pre_dump')) {
    function pre_dump($val)
    {
        echo "<pre>";
        print_r(var_dump($val));
        echo "</pre>";
    }
}

if (!function_exists('prex_dump')) {
    function prex_dump($val)
    {
        echo "<pre>";
        print_r(var_dump($val));
        echo "</pre>";
        exit;
    }
}

if (!function_exists('getIpAddress')) {
    function getIpAddress()
    {
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)
            && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') > 0) {
                $addr = explode(",", $_SERVER['HTTP_X_FORWARDED_FOR']);
                return trim($addr[0]);
            } else {
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }
}

if (!function_exists('url_seo')) {
    function url_seo($str, $options = array())
    {
        $str      = mb_convert_encoding((string) $str, 'UTF-8', mb_list_encodings());
        $defaults = array('delimiter' => '-', 'limit' => null, 'lowercase' => true, 'transliterate' => true);
        $options  = array_merge($defaults, $options);
        $dmr      = $defaults["delimiter"];
        $char_map = array(
            // Latin
            'À' => 'A', 'Á'  => 'A', ' '  => $dmr, 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
            'È' => 'E', 'É'  => 'E', 'Ê'  => 'E', 'Ë'  => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï'  => 'I',
            'Ð' => 'D', 'Ñ'  => 'N', 'Ò'  => 'O', 'Ó'  => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő'  => 'O',
            'Ø' => 'O', 'Ù'  => 'U', 'Ú'  => 'U', 'Û'  => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ'  => 'TH',
            'ß' => 'ss',
            'à' => 'a', 'á'  => 'a', 'â'  => 'a', 'ã'  => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
            'è' => 'e', 'é'  => 'e', 'ê'  => 'e', 'ë'  => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï'  => 'i',
            'ð' => 'd', 'ñ'  => 'n', 'ò'  => 'o', 'ó'  => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő'  => 'o',
            'ø' => 'o', 'ù'  => 'u', 'ú'  => 'u', 'û'  => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ'  => 'th',
            'ÿ' => 'y',
            // Latin symbols
            '©' => '(c)',
            // Greek
            'Α' => 'A', 'Β'  => 'B', 'Γ'  => 'G', 'Δ'  => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ'  => '8',
            'Ι' => 'I', 'Κ'  => 'K', 'Λ'  => 'L', 'Μ'  => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π'  => 'P',
            'Ρ' => 'R', 'Σ'  => 'S', 'Τ'  => 'T', 'Υ'  => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
            'Ά' => 'A', 'Έ'  => 'E', 'Ί'  => 'I', 'Ό'  => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ'  => 'I',
            'Ϋ' => 'Y',
            'α' => 'a', 'β'  => 'b', 'γ'  => 'g', 'δ'  => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ'  => '8',
            'ι' => 'i', 'κ'  => 'k', 'λ'  => 'l', 'μ'  => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π'  => 'p',
            'ρ' => 'r', 'σ'  => 's', 'τ'  => 't', 'υ'  => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
            'ά' => 'a', 'έ'  => 'e', 'ί'  => 'i', 'ό'  => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς'  => 's',
            'ϊ' => 'i', 'ΰ'  => 'y', 'ϋ'  => 'y', 'ΐ'  => 'i',
            // Turkish
            'Ş' => 'S', 'İ'  => 'I', 'Ç'  => 'C', 'Ü'  => 'U', 'Ö' => 'O', 'Ğ' => 'G',
            'ş' => 's', 'ı'  => 'i', 'ç'  => 'c', 'ü'  => 'u', 'ö' => 'o', 'ğ' => 'g',
            // Russian
            'А' => 'A', 'Б'  => 'B', 'В'  => 'V', 'Г'  => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
            'З' => 'Z', 'И'  => 'I', 'Й'  => 'J', 'К'  => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О'  => 'O',
            'П' => 'P', 'Р'  => 'R', 'С'  => 'S', 'Т'  => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц'  => 'C',
            'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы'  => 'Y', 'Ь' => '', 'Э'  => 'E', 'Ю'  => 'Yu',
            'Я' => 'Ya',
            'а' => 'a', 'б'  => 'b', 'в'  => 'v', 'г'  => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
            'з' => 'z', 'и'  => 'i', 'й'  => 'j', 'к'  => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о'  => 'o',
            'п' => 'p', 'р'  => 'r', 'с'  => 's', 'т'  => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц'  => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы'  => 'y', 'ь' => '', 'э'  => 'e', 'ю'  => 'yu',
            'я' => 'ya',
            // Ukrainian
            'Є' => 'Ye', 'І' => 'I', 'Ї'  => 'Yi', 'Ґ' => 'G',
            'є' => 'ye', 'і' => 'i', 'ї'  => 'yi', 'ґ' => 'g',
            // Czech
            'Č' => 'C', 'Ď'  => 'D', 'Ě'  => 'E', 'Ň'  => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů'  => 'U',
            'Ž' => 'Z',
            'č' => 'c', 'ď'  => 'd', 'ě'  => 'e', 'ň'  => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů'  => 'u',
            'ž' => 'z',
            // Polish
            'Ą' => 'A', 'Ć'  => 'C', 'Ę'  => 'e', 'Ł'  => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź'  => 'Z',
            'Ż' => 'Z',
            'ą' => 'a', 'ć'  => 'c', 'ę'  => 'e', 'ł'  => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź'  => 'z',
            'ż' => 'z',
            // Latvian
            'Ā' => 'A', 'Č'  => 'C', 'Ē'  => 'E', 'Ģ'  => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ'  => 'N',
            'Š' => 'S', 'Ū'  => 'u', 'Ž'  => 'Z',
            'ā' => 'a', 'č'  => 'c', 'ē'  => 'e', 'ģ'  => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ'  => 'n',
            'š' => 's', 'ū'  => 'u', 'ž'  => 'z',
        );
        if ($options['transliterate']) {
            $str = str_replace(array_keys($char_map), $char_map, $str);
        }
        $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
        $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
        $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
        $str = trim($str, $options['delimiter']);
        return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
    }

    if (!function_exists('clear')) {
        function clear($val)
        {
            $search  = array('<table>', '</table>');
            $replace = array('', '');
            return str_replace($search, $replace, $val);
        }
    }

    if (!function_exists('create_pagination_config')) {
        function create_pagination_config($data)
        {

            $config                       = [];
            $config['base_url']           = $data->url;
            $config['total_rows']         = $data->total_rows;
            $config['per_page']           = $data->per_page;
            $config['use_page_numbers']   = true;
            $config['page_query_string']  = false;
            $config['reuse_query_string'] = true;
            $config['first_link']         = 'İlk';
            $config['last_link']          = 'Son';
            $config['first_tag_open']     = '<li class="page-item" aria-current="page"><span class="page-link">';
            $config['first_tag_close']    = '</span></li>';
            $config['last_tag_open']      = '<li class="page-item" aria-current="page"><span class="page-link">';
            $config['last_tag_close']     = '</span></li>';
            $config['next_tag_open']      = '<li class="page-item" aria-current="page"><span class="page-link">';
            $config['next_tag_close']     = '</span></li>';
            $config['prev_tag_open']      = '<li class="page-item" aria-current="page"><span class="page-link">';
            $config['prev_tag_close']     = '</span></li>';
            $config['cur_tag_open']       = '<li class="page-item active" aria-current="page"><span class="page-link">';
            $config['cur_tag_close']      = '</span></li>';
            $config['num_tag_open']       = '<li class="page-item" aria-current="page"><span class="page-link">';
            $config['num_tag_close']      = '</span></li>';
            $config['full_tag_open']      = '<div class="pagination"><nav aria-label="..."><ul class="pagination pagination pagination-md">';
            $config['full_tag_close']     = '</ul></nav></div>';
            return $config;
        }
    }
}

if (!function_exists('webp_support')) {
    function webp_support($image)
    {
        if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) == true ) {
            $checkimage = $image.'.webp';
            // webp is supported!
        }
        if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) == false ) {
            $checkimage = $image;
        }
        return $checkimage;
    }
}


if (!function_exists('create_front_pagination_config')) {
    function create_front_pagination_config($data)
    {
        $config                       = [];
        $config['base_url']           = $data->url;
        $config['total_rows']         = $data->total_rows;
        $config['per_page']           = $data->per_page;
        $config['use_page_numbers']   = true;
        $config['page_query_string']  = true;
        $config['reuse_query_string'] = true;
        $config['first_link']         = 'İlk';
        $config['last_link']          = 'Son';
        $config['next_link'] = '<i class="fas fa-angle-double-right"></i>';
        $config['prev_link'] ='<i class="fas fa-angle-double-left"></i>';
        $config['first_tag_open']     = ' <li class="page-item">';
        $config['first_tag_close']    = '</li>';
        $config['last_tag_open']      = ' <li class="page-item">';
        $config['last_tag_close']     = '</li>';
        $config['next_tag_open']      = '<li class="page-item next">';
        $config['next_tag_close']     = ' </li>';
        $config['prev_tag_open']      = '<li class="page-item prev">';
        $config['prev_tag_close']     = '</li>';
        $config['cur_tag_open']       = '<li class="page-item active"><a>';
        $config['cur_tag_close']      = '</li></a>';
        $config['num_tag_open']       = ' <li class="page-item">';
        $config['num_tag_close']      = '</li>';
        $config['full_tag_open']      = '<nav class="pagination mt-4 main-pagination"><ul class="pagination justify-content-center">';
        $config['full_tag_close']     = '</ul></nav>';
        return $config;
    }
}


/*
    <li class="page-item prev">
        <a href="#"><i class="fas fa-angle-double-left"></i></a>
    </li>
    <li class="page-item active"><a href="#">1</a></li>
    <li class="page-item"><a href="#">2</a></li>
    <li class="page-item"><a href="#">3</a></li>
    <li class="page-item next">
        <a href="#"><i class="fas fa-angle-double-right"></i></a>
    </li>
*/

if (!function_exists('array_to_object')) {
    function array_to_object($array)
    {
        $object = new stdClass();
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $value = array_to_object($value);
            }
            $object->$key = $value;
        }
        return $object;
    }
}



if (!function_exists('fav_and_app_icons')) {
    function fav_and_app_icons(): string
    {
        $folder = 'site_url';
        return <<<HTML
                <link rel="shortcut icon" href="{$folder('assets/front/images/favicons/apple-icon-57x57.png')}" />
                <link rel="apple-touch-icon" sizes="57x57" href="{$folder('assets/front/images/favicons/apple-icon-57x57.png')}">
                <link rel="apple-touch-icon" sizes="60x60" href="{$folder('assets/front/images/favicons/apple-icon-60x60.png')}">
                <link rel="apple-touch-icon" sizes="72x72" href="{$folder('assets/front/images/favicons/apple-icon-72x72.png')}">
                <link rel="apple-touch-icon" sizes="76x76" href="{$folder('assets/front/images/favicons/apple-icon-76x76.png')}">
                <link rel="apple-touch-icon" sizes="114x114" href="{$folder('assets/front/images/favicons/apple-icon-114x114.png')}">
                <link rel="apple-touch-icon" sizes="120x120" href="{$folder('assets/front/images/favicons/apple-icon-120x120.png')}">
                <link rel="apple-touch-icon" sizes="144x144" href="{$folder('assets/front/images/favicons/apple-icon-144x144.png')}">
                <link rel="apple-touch-icon" sizes="152x152" href="{$folder('assets/front/images/favicons/apple-icon-152x152.png')}">
                <link rel="apple-touch-icon" sizes="180x180" href="{$folder('assets/front/images/favicons/apple-icon-180x180.png')}">
                <link rel="icon" type="image/png" sizes="192x192" href="{$folder('assets/front/images/favicons/android-icon-192x192.png')}">
                <link rel="icon" type="image/png" sizes="32x32" href="{$folder('assets/front/images/favicons/favicon-32x32.png')}">
                <link rel="icon" type="image/png" sizes="96x96" href="{$folder('assets/front/images/favicons/favicon-96x96.png')}">
                <link rel="icon" type="image/png" sizes="16x16" href="{$folder('assets/front/images/favicons/favicon-16x16.png')}">
                <link rel="manifest" href="{$folder('assets/front/images/favicons/manifest.json')}">
                <meta name="msapplication-TileImage" content="{$folder('assets/front/images/favicons/ms-icon-144x144.png')}'">
        HTML;
    }
}


if (!function_exists('month')) {
    function month($date)
    {
        $months = array(
            '1' => 'Ocak', '2' => 'Şubat', '3' => 'Mart', '4' => 'Nisan', '5' => 'Mayıs', '6' => 'Haziran', '7' => 'Temmuz ',
            '8' => 'Ağustos', '9' => 'Eylül', '10' => 'Ekim', '11' => 'Kasım', '12' => 'Aralık',
        );
        $mon = explode("-", $date);
        foreach ($months as $_key => $_val) {
            if ($_key == $mon[1]) {
                $new_date = $mon[2].' '.$_val.','.$mon[0];
            }
        }
        return $new_date;
    }
}

if (!function_exists('month_hour')) {
    function month_hour($date)
    {
        $date = explode(' ' ,$date);
        $months = array(
            '1' => 'Ocak', '2' => 'Şubat', '3' => 'Mart', '4' => 'Nisan', '5' => 'Mayıs', '6' => 'Haziran', '7' => 'Temmuz ',
            '8' => 'Ağustos', '9' => 'Eylül', '10' => 'Ekim', '11' => 'Kasım', '12' => 'Aralık',
        );
        $mon = explode("-", $date[0]);
        foreach ($months as $_key => $_val) {
            if ($_key == $mon[1]) {
                $new_date = $mon[2].' '.$_val.','.$mon[0];
            }
        }
        $hour = explode(':' , $date[1]);
        $new_date = $new_date . ' saat :' . $hour[0]. ':' .$hour[1];
        return $new_date;
    }
}




//if (!function_exists('selected_category_tree')) {
//    function selected_category_tree($categories,$id): array
//    {
//        foreach ($categories as $key => $item)
//        {
//            if($item->id == $id) {
//                $tree[$item->id] = $item;
//                unset($categories[$key]);
//                category_find_sub_cats_selected($categories, $tree[$item->id]);
//            }
//        }
//        return $tree;
//    }
//}
//
//if (!function_exists('category_find_sub_cats_selected')) {
//    function category_find_sub_cats_selected(&$categories, &$selected)
//    {
//        foreach ($categories as $key => $item) {
//            if ($item->top_category_id == $selected->id) {
//                $selected->sub_cats[$item->id] = $item;
//                unset($categories[$key]);
//                category_find_sub_cats_selected($categories, $selected->sub_cats[$item->id]);
//            }
//        }
//    }
//}
//
//if (!function_exists('category_tree')) {
//    function category_tree($categories): array
//    {
//        foreach ($categories as $id => $item)
//        {
//            if($item->top_category_id == 0) {
//                $tree[$item->id] = $item;
//                unset($categories[$id]);
//                category_find_sub_cats($categories, $tree[$item->id]);
//            }
//        }
//
//        return $tree;
//    }
//}
//
//if (!function_exists('category_find_sub_cats')) {
//    function category_find_sub_cats(&$categories, &$selected)
//    {
//        foreach ($categories as $id => $item) {
//            if ($item->top_category_id == $selected->id) {
//                $selected->sub_cats[$item->id] = $item;
//                unset($categories[$id]);
//                category_find_sub_cats($categories, $selected->sub_cats[$item->id]);
//            }
//        }
//    }
//}
//
//if (!function_exists('list_category')) {
//    function list_category($tree,$slug,$main_id)
//    {
//        foreach ($tree as $key => $val) {
//            if(empty($val->sub_cats)) {
//                if($slug == $val->slug || in_array($val->id,$main_id)) {
//                    echo '<li class="active"><a href="' . site_url($val->slug) . '"> <i class="fa fa-angle-right"></i>  ' . $val->name . ' </a></li>';
//                } else {
//                    echo '<li><a href="' . site_url($val->slug) . '">  ' . $val->name . ' </a></li>';
//                }
//            }
//            if (!empty($val->sub_cats)) {
//                echo '<div class="filter-list-block subtitle-list">';
//                echo '<button class="btn btn-link filter-button" type="button">';
//                if($slug == $val->slug || in_array($val->id,$main_id)) {
//                    echo '<a class="subtitle-link active" href="' . site_url($val->slug) . '"> '. $val->name.' </a>';
//                    echo ' <span  class="filter-eksi-active "> </span></button>';
//                    echo '<ul class="filter-list filter-list-active">';
//                } else {
//                    echo '<a class="subtitle-link" href="' . site_url($val->slug) . '"> '. $val->name.' </a>';
//                    echo ' <span  class="filter-icon-eksi filter-icon-plus "> </span></button>';
//                    echo '<ul class="filter-list">';
//                }
//
//                list_category($val->sub_cats ,$slug,$main_id);
//                echo '</div>';
//
//            }
//       }
//    }
//}
//
//if (!function_exists('cats')) {
//    function cats($selected_categories)
//    {
//        $ary = array();
//        if (isset($selected_categories->sub_cats)) {
//            foreach ($selected_categories->sub_cats as $key => $val) {
//                $ary[] = $val->id;
//                $ary = array_merge(cats($val), $ary);
//            }
//        } else {
//            return array($selected_categories->id);
//        }
//        return $ary;
//    }
//}


//if (!function_exists('convert_payment')) {
//    function convert_payment($value)
//    {
//        $value = trim($value);
//        $value = preg_replace('/(\d)(\s)(\d)/', '$1$3', $value);
//
//        if (stristr($value, '.') && stristr($value, ',')) {
//            if (strrpos($value, '.') < strpos($value, ',')) {
//                $value = str_replace('.', '', $value);
//            }
//        }
//
//        if (stristr($value, ',') && stristr($value, '.')) {
//            if (strrpos($value, ',') < strpos($value, '.')) {
//                $value = str_replace(',', '', $value);
//            }
//        }
//        $radixOptions = [',', ' '];
//        $value = str_replace(',', '', $value);
//        $value = str_replace('₺', '', $value);
//        return $value;
//    }
//}

if (!function_exists('convert_payment')) {
    function convert_payment($value)
    {
        $value = trim($value);
        $value = preg_replace('/(\d)(\s)(\d)/', '$1$3', $value);

        if (stristr($value, '.') && stristr($value, ',')) {
            if (strrpos($value, '.') < strpos($value, ',')) {
                $value = str_replace('.', '', $value);
            }
        }

        if (stristr($value, ',') && stristr($value, '.')) {
            if (strrpos($value, ',') < strpos($value, '.')) {
                $value = str_replace(',', '', $value);
            }
        }
        $radixOptions = [',', ' '];
        $value = str_replace(',', '', $value);
        $value = preg_replace('/[^\d\.]/', '', $value);
        return str_replace('.', '', $value);
    }
}

if (!function_exists('money_transform')) {
    function money_transform($amount )
    {
        return number_format($amount/100,2,'.',',');
    }
}

if (!function_exists('createDuration')) {
    function createDuration($duration = 0)
    {
        return date("Y-m-d H:i:s", (strtotime(date("Y-m-d H:i:s")) + ($duration * 86400)));
    }
}

if (!function_exists('fix_it_payment')) {
    function fix_it_payment($payment)
    {
        return '₺' . number_format($payment / 100, 2, '.', ',');
    }
}

function XMLtoArray($XML)
{
    $xml_parser = xml_parser_create();
    xml_parse_into_struct($xml_parser, $XML, $vals);
    xml_parser_free($xml_parser);
    // wyznaczamy tablice z powtarzajacymi sie tagami na tym samym poziomie
    $_tmp='';
    foreach ($vals as $xml_elem) {
        $x_tag=$xml_elem['tag'];
        $x_level=$xml_elem['level'];
        $x_type=$xml_elem['type'];
        if ($x_level!=1 && $x_type == 'close') {
            if (isset($multi_key[$x_tag][$x_level]))
                $multi_key[$x_tag][$x_level]=1;
            else
                $multi_key[$x_tag][$x_level]=0;
        }
        if ($x_level!=1 && $x_type == 'complete') {
            if ($_tmp==$x_tag)
                $multi_key[$x_tag][$x_level]=1;
            $_tmp=$x_tag;
        }
    }
    // jedziemy po tablicy
    foreach ($vals as $xml_elem) {
        $x_tag=$xml_elem['tag'];
        $x_level=$xml_elem['level'];
        $x_type=$xml_elem['type'];
        if ($x_type == 'open')
            $level[$x_level] = $x_tag;
        $start_level = 1;
        $php_stmt = '$xml_array';
        if ($x_type=='close' && $x_level!=1)
            $multi_key[$x_tag][$x_level]++;
        while ($start_level < $x_level) {
            $php_stmt .= '[$level['.$start_level.']]';
            if (isset($multi_key[$level[$start_level]][$start_level]) && $multi_key[$level[$start_level]][$start_level])
                $php_stmt .= '['.($multi_key[$level[$start_level]][$start_level]-1).']';
            $start_level++;
        }
        $add='';
        if (isset($multi_key[$x_tag][$x_level]) && $multi_key[$x_tag][$x_level] && ($x_type=='open' || $x_type=='complete')) {
            if (!isset($multi_key2[$x_tag][$x_level]))
                $multi_key2[$x_tag][$x_level]=0;
            else
                $multi_key2[$x_tag][$x_level]++;
            $add='['.$multi_key2[$x_tag][$x_level].']';
        }
        if (isset($xml_elem['value']) && trim($xml_elem['value'])!='' && !array_key_exists('attributes', $xml_elem)) {
            if ($x_type == 'open')
                $php_stmt_main=$php_stmt.'[$x_type]'.$add.'[\'content\'] = $xml_elem[\'value\'];';
            else
                $php_stmt_main=$php_stmt.'[$x_tag]'.$add.' = $xml_elem[\'value\'];';
            eval($php_stmt_main);
        }
        if (array_key_exists('attributes', $xml_elem)) {
            if (isset($xml_elem['value'])) {
                $php_stmt_main=$php_stmt.'[$x_tag]'.$add.'[\'content\'] = $xml_elem[\'value\'];';
                eval($php_stmt_main);
            }
            foreach ($xml_elem['attributes'] as $key=>$value) {
                $php_stmt_att=$php_stmt.'[$x_tag]'.$add.'[$key] = $value;';
                eval($php_stmt_att);
            }
        }
    }
    return $xml_array;
}


if (!function_exists('fix_it_payment_for_accounting')) {
    function fix_it_payment_for_accounting($payment)
    {
        return number_format($payment / 100, 2, '.', ',');
    }
}

if (!function_exists('times_ago')) {
    function times_ago($date)
    {
        $time = Carbon::parse($date);
        return $time->diffForHumans(Carbon::now()->addHours(3)->toDateTimeString());
    }
}

if (!function_exists('fix_it_auto_discount_info')) {
    function fix_it_auto_discount_info($percent,$basket_total,$discount_type)
    {
        if($discount_type == 1) {
            return $basket_total.' TL ve Üzeri Alışverişte Anında '. $percent . 'TL İndirim';
        }
        else if($discount_type == 2) {
            return $basket_total.' TL ve Üzeri Alışverişte Anında %'. $percent . ' İndirim';
        }
    }
}


if (!function_exists('fix_it_code_discount_info')) {
    function fix_it_code_discount_info($percent,$basket_total,$discount_type,$code)
    {
        if($discount_type == 1) {
            return $code.' İndirim Kodu İle '.$basket_total.' TL ve Üzeri Alışverişte Anında '. $percent . 'TL İndirim';
        }
        else if($discount_type == 2) {
            return $basket_total.' TL ve Üzeri Alışverişte Anında %'. $percent . ' İndirim';
        }
    }
}

if (!function_exists('fix_it_brand_discount_info')) {
    function fix_it_brand_discount_info($percent,$lover_price,$discount_type,$loop_qty,$coefficient,$brand_name)
    {
        if($discount_type == 1) {
            if($loop_qty <= 0) {
                $data = $lover_price . 'TL ve Üzeri ' . $brand_name . ' Markalı Ürün Alımında <br> 2. '  . $brand_name . ' Markalı Ürün ve Sonraki '.$brand_name.' Markalı Ürünler' . $percent . ' TL İndirimli';
            } else {
                $data = $lover_price . 'TL ve Üzeri ' . $brand_name . ' Markalı Ürün Alımında <br> 2. ' . $brand_name . ' Markalı Ürün ' . $percent . ' TL İndirimli';
            }
            for ($i = 1; $i <= $loop_qty; $i++) {
                if($i == $loop_qty) {
                    $data .= '<br> ' . ($i + 2) . '. ' . $brand_name . ' Markalı Ürün ve Sonraki '.$brand_name.' Markalı Ürünler ' . ($percent + ($i * $coefficient)) . ' TL  İndirimli';
                } else {
                    $data .= '<br> ' . ($i + 2) . '. ' . $brand_name . ' Markalı Ürün ' . ($percent + ($i * $coefficient)) . ' TL İndirimli';
                }
            }
            return $data;
        }
        else if($discount_type == 2) {
            if($loop_qty <= 0) {
                $data = $lover_price . 'TL ve Üzeri ' . $brand_name . ' Markalı Ürün Alımında <br> 2. '  . $brand_name . ' Markalı Ürün ve Sonraki '.$brand_name.' Markalı Ürünler %' . $percent . ' İndirimli';
            } else {
                $data = $lover_price . 'TL ve Üzeri ' . $brand_name . ' Markalı Ürün Alımında <br> 2. ' . $brand_name . ' Markalı Ürün %' . $percent . ' İndirimli';
            }
            for ($i = 1; $i <= $loop_qty; $i++) {
                if($i == $loop_qty) {
                    $data .= '<br> ' . ($i + 2) . '. ' . $brand_name . ' Markalı Ürün ve Sonraki '.$brand_name.' Markalı Ürünler %' . ($percent + ($i * $coefficient)) . ' İndirimli';
                } else {
                    $data .= '<br> ' . ($i + 2) . '. ' . $brand_name . ' Markalı Ürün %' . ($percent + ($i * $coefficient)) . ' İndirimli';
                }
            }
            return $data;
        }
    }
}





if (!function_exists('create_order_mail_body')) {
    function create_order_mail_body($order_products,$total,$payment_method,$order_detail)
    {

        if($order_detail->order_status == 0){
            $o_status =  "Beklemede";
        }else if($order_detail->order_status == 1){
            $o_status =  "Hazırlanıyor";
        }else if($order_detail->order_status == 2){
            $o_status =  "Kargoda";
        }else if($order_detail->order_status == 3){
            $o_status =  "Tamamlandı";
        }else if($order_detail->order_status == 5){
            $o_status =  "İptal Edildi";
        } else if($order_detail->order_status == 6) {
            $o_status =  "Ödeme Bekliyor";
        }

        $body = '
        <!DOCTYPE html>
            <html style="-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;margin:0" ">
               <head>
                  <meta charset="UTF-8 ">
                  <meta content="width=device-width, initial-scale=1 " name="viewport ">
                  <meta name="x-apple-disable-message-reformatting ">
                  <meta http-equiv="X-UA-Compatible " content="IE=edge ">
               </head>
               <body>
                  <div class="mail-bg " style="background: #80808014;min-height: 100vh;overflow: hidden; ">
                     <div class="mail-area " style="margin-bottom:20px !important;margin-top:20px !important;max-width: 750px; margin: 0 auto;position: relative;overflow: hidden; background-color: #fff; ">
                        <div class="mail-title " style="margin-bottom:60px;padding: 30px 50px;width: 100%;background: #961914;font-size: 30px;color: #fff;font-weight: 500; ">
                           <p style="margin: 0; ">
                              Siparişiniz için teşekkür ederiz.
                           </p>
                        </div>
                        <div class="mail-content " style="padding-left: 50px;padding-right: 50px; ">
                           <p class="mail-min-title ">
                              Merhaba '.$order_detail->billing_name_surname.',
                           </p>
                           <p class="mail-min-title ">
                          
                              Bilginize - #'.$order_detail->o_number_for_user.' nolu siparişiniz '.$o_status.'
                           </p>
                           <div class="product-info " style="">
                              <p style="margin-right:5px;font-weight: bold;color: #DD3333;font-size: 20px;float:left; ">
                                 [Sipariş #'.$order_detail->o_number_for_user.']
                              </p>
                              <p style="margin-left:5px;font-weight: bold;color: #DD3333; font-size: 20px;float:left; ">
                                 ('.month(explode(" ", $order_detail->added_time)[0]).')
                              </p>
                           </div>
                           <table style="width:100%; ">
                              <thead>
                                 <tr style=" ">
                                    <td style="padding: .75rem;vertical-align: top;border: 1px solid #dee2e6;font-weight: bold;font-size: 18px; ">
                                       Ürün
                                    </td>
                                    <td style="padding: .75rem;vertical-align: top;border: 1px solid #dee2e6;font-weight: bold;font-size: 18px; ">
                                       Miktar
                                    </td>
                                    <td style="padding: .75rem;vertical-align: top;border: 1px solid #dee2e6;font-weight: bold;font-size: 18px; ">
                                       Fiyat
                                    </td>
                                 </tr>';
                                    foreach ($order_products as $key => $val) {
                                    $body = $body . '
                                    <tr style=" ">
                                        <td style="padding: .75rem;vertical-align: top;border: 1px solid #dee2e6; ">
                                           <p style=" ">
                                                '.$val->p_name.'
                                           </p>
                                        </td>
                                        <td style="padding: .75rem;vertical-align: top;border: 1px solid #dee2e6; ">
                                             '.$val->qty.'
                                        </td>
                                        <td style="padding: .75rem;vertical-align: top;border: 1px solid #dee2e6; ">
                                             '.fix_it_payment($val->op_price).'
                                        </td>
                                     </tr>';
                                    }
        $body = $body . '
                                 <tr style=" ">
                                    <td style="padding: .75rem;vertical-align: top;border: 1px solid #dee2e6;font-weight: bold;color:dd3333; ">
                                       Ödeme Yöntemi:
                                    </td>
                                    <td colspan="2 " style="padding: .75rem;vertical-align: top;border: 1px solid #dee2e6; ">
                                    '.$payment_method.'
                                    </td>
                                 </tr>
                                 <tr style=" ">
                                    <td style="padding: .75rem;vertical-align: top;border: 1px solid #dee2e6;font-weight: bold;color:dd3333; ">
                                       Toplam:
                                    </td>
                                    <td colspan="2 " style="padding: .75rem;vertical-align: top;border: 1px solid #dee2e6; ">
                                      '.fix_it_payment($total).'
                                    </td>
                                 </tr>
                              </thead>
                           </table>
                           <div class="mail-adress " style=" ">
                              <div class="mail-adres-left " style="width:50%;float:left; ">
                                 <p style="font-weight: bold;font-size: 20px;font-weight: bold;color: #DD3333; ">
                                    Fatura Adresi
                                 </p>
                                 <div class="mail-adres-box " style="border:1px solid #dee2e6;padding: 10px; ">
                                    <p style="margin: 5px 0px; ">
                                      '.$order_detail->billing_name_surname.'
                                    </p>
                                    <p style="margin: 5px 0px; ">
                                       '.$order_detail->billing_address.'
                                    </p>
                                    <p style="margin: 5px 0px; ">
                                       '.$order_detail->billing_phone.'
                                    </p>
                                    <p style="margin: 5px 0px; ">
                                       '.$order_detail->billing_city_name.' / '.$order_detail->billing_counties_name.'
                                    </p>
                                    <a href="# ">
                                      '.$order_detail->email.'
                                    </a>
                                 </div>
                              </div>
                              <div class="mail-adres-right " style="width:50%;float:left; ">
                                 <p style="font-weight: bold;font-size: 20px;font-weight: bold;color: #DD3333; ">
                                    Gönderim Adresi
                                 </p>
                                 <div class="mail-adres-box " style="border:1px solid #dee2e6;padding: 10px; ">
                                    <p style="margin: 5px 0px; ">
                                      '.$order_detail->shipping_name_surname.'
                                    </p>
                                    <p style="margin: 5px 0px; ">
                                       '.$order_detail->shipping_address.'
                                    </p>
                                    <p style="margin: 5px 0px; ">
                                       '.$order_detail->shipping_phone.'
                                    </p>
                                    <p style="margin: 5px 0px; ">
                                       '.$order_detail->shipping_city_name.' / '.$order_detail->shipping_counties_name.'
                                    </p>
                                 </div>
                              </div>
                           </div>
                           <div class="order-link " style="clear: both;">
                              <p style="padding:30px 0px;">
                                 Siparişinizin takibini  bu
                                 <a href="' . site_url('siparis-takibi/' . $order_detail->o_number_for_user) . '">
                                 bağlantıya
                                 </a>
                                 tıklayarak yapabilirsiniz
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </body>
            </html>
        ';

       return $body;
    }
}
if (!function_exists('current_date')) {
    function current_date()
    {
        $date = Carbon::now();
        $date->toISO8601String();
        return $date->tz('Europe/Istanbul')->toDateTimeString();
    }
}
//'<p>Mesaj : Siparişiniz Alınmıştır</p> <br>
//                                        <p>Ürünler : <br> ' . $products . '</p> <br>
//                                        <a href="' . site_url('siparis-takibi/' . $data->o_number) . '">Sipariş Detay</a>


if (!function_exists('print_xml')) {
    function print_xml($xml)
    {
        header("Content-type: text/xml");
        return $xml;
    }
}
