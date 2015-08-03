<?php

namespace common\components;

class Rating {

    public static function getDiv($rating) {
        $output = [];
        $overall = round(2 * $rating) / 2;
        for ($i = 0; $i < floor($overall); $i++) {
            $output[] = '<div class="star"><i class="fa fa-star"></i></div>';
        }
        if ($overall - $i == 0.5) {
            $output[] = '<div class="star"><i class="fa fa-star-half-full"></i></div>';
            $i++;
        }
        for ($j = $i; $j < 5; $j++) {
            $output[] = '<div class="star"><i class="fa fa-star-o"></i></div>';
        }
        return implode("\n", $output);
    }

}
