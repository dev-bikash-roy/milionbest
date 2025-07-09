<?php
class WordCounter {
    public static function countWords($text) {
        return str_word_count($text);
    }
}
