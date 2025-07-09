<?php
class JsonFormatter {
    public static function format($json) {
        $decoded = json_decode($json, true);
        if ($decoded === null) {
            return false;
        }
        return json_encode($decoded, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
}
