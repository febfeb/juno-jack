<?php
namespace common\components;

use common\models\Url;

/**
 * Description of Angka
 *
 * @author maf
 */
class Slug {

	public static function slugify($string) {
	    $slug = rawurlencode(str_replace("/", "-slash-", str_replace(" ", "-", strtolower(trim($string)))));
	    return $slug;    
	}

}

