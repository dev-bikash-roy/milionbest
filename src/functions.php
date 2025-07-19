<?php
function view(string $file, array $data = []): void {
    extract($data);
    include $file;
}
