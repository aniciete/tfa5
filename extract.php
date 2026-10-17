<?php
/**
 * InfinityFree Deployment Extractor
 * Unpacks tfa5-infinityfree.zip into /htdocs, sets permissions, cleans up, and self-destructs.
 */
header('Content-Type: text/plain; charset=utf-8');

$zipFile = __DIR__ . '/tfa5-infinityfree.zip';

if (!file_exists($zipFile)) {
    http_response_code(404);
    echo "ERROR: Deployment package not found at " . $zipFile . "\n";
    exit(1);
}

if (!class_exists('ZipArchive')) {
    http_response_code(500);
    echo "ERROR: ZipArchive extension is not enabled in this PHP environment.\n";
    exit(1);
}

$zip = new ZipArchive();
$res = $zip->open($zipFile);

if ($res === TRUE) {
    $extracted = $zip->extractTo(__DIR__);
    $zip->close();

    if ($extracted) {
        @unlink($zipFile);
        echo "SUCCESS: Extracted tfa5-infinityfree.zip successfully!\n";
        echo "All application files, production vendor dependencies, and assets are in place.\n";

        // Remove default InfinityFree index2.html placeholder
        if (file_exists(__DIR__ . '/index2.html')) {
            @unlink(__DIR__ . '/index2.html');
            echo "Removed default InfinityFree index2.html placeholder.\n";
        }

        // Ensure storage and cache directories exist and are writable
        $storageDirs = [
            __DIR__ . '/storage/app/public',
            __DIR__ . '/storage/framework/cache/data',
            __DIR__ . '/storage/framework/sessions',
            __DIR__ . '/storage/framework/views',
            __DIR__ . '/storage/logs',
            __DIR__ . '/bootstrap/cache',
        ];
        foreach ($storageDirs as $sDir) {
            if (!is_dir($sDir)) {
                @mkdir($sDir, 0777, true);
            }
            @chmod($sDir, 0777);
        }
        echo "Verified storage and cache directories.\n";

        // Self-destruct for security
        @unlink(__FILE__);
        echo "Removed extract.php for security.\n";
        echo "Deployment complete! Visit http://tfa5.infinityfreeapp.com/ to test.\n";
    } else {
        http_response_code(500);
        echo "ERROR: Failed during extraction to " . __DIR__ . "\n";
    }
} else {
    http_response_code(500);
    echo "ERROR: Could not open zip file. Error code: " . $res . "\n";
}
