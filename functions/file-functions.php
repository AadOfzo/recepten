<?php
function getFilesFromFolder($folder, $suffix = '')
{
    $files = array_diff(scandir($folder), array('..', '.'));  // Verwijdert . en ..
    if ($suffix) {
        $files = array_filter($files, function ($file) use ($suffix) {
            return strpos($file, $suffix) !== false;
        });
    }
    return $files;
}
