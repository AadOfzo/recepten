<?php
function getFilesFromFolder($folder, $suffix = '')
{
    $files = array_diff(scandir($folder), array('..', '.'));
    if ($suffix) {
        $files = array_filter($files, function ($file) use ($suffix) {
            return strpos($file, $suffix) !== false;
        });
    }
    return $files;
}
