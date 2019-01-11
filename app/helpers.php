<?php
if (!function_exists('cut_html')) {
    function cut_html(string $html, $offset=250) {
        $forIter = strlen($html)-$offset;
        for($i=0;$i<$forIter;$i++) {
            $g = substr($html, $offset-1, 15);
            $result = preg_match('/<\/[a-z]+>/', $g, $matches, PREG_OFFSET_CAPTURE);
            if ($result !== 0) {
                $offset = $offset + $matches[0][1] + strlen($matches[0][0]);
                return html_entity_decode(substr($html, 0, $offset+1));
            } else {
                $offset += 15;
            }
        }
        return html_entity_decode($html);
    }
}