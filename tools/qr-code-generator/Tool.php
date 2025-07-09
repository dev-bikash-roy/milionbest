<?php
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
class QrGenerator {
    public static function create($text) {
        $qr = QrCode::create($text);
        $writer = new PngWriter();
        return $writer->write($qr)->getString();
    }
}
