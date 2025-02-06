<?php
function getFilesFromFolder($folder, $suffix = '')
{
    // Controleer of de map bestaat voordat we deze proberen te scannen
    if (!is_dir($folder)) {
        return [];  // Retourneer een lege array als de map niet bestaat
    }

    $files = array_diff(scandir($folder), array('..', '.'));
    if ($suffix) {
        $files = array_filter($files, function ($file) use ($suffix) {
            return strpos($file, $suffix) !== false;
        });
    }
    return $files;
}
