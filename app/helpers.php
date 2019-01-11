<?php
if (!function_exists('cut_html')) {
    function cut_html(string $html, $length=320) {
        $forIter = strlen($html)-$length;
        for($i=0;$i<$forIter;$i++) {
            $g = substr($html, $length-1, 1);
            $res[] = $g;
            if (!in_array($g, array('!', '.', '?'))) {
               $length++;
            } else {
                return html_entity_decode(substr($html, 0, $length));
            };
        }
        return html_entity_decode($html);
    }
}