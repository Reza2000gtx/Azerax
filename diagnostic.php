<?php
register_shutdown_function(function(){
    $error = error_get_last();
    if ($error !== NULL) {
        echo '<pre style="background:#fee;padding:20px;border:2px solid red;">';
        echo "FATAL ERROR CAUGHT:\n\n";
        print_r($error);
        echo '</pre>';
    } else {
        echo '<pre style="background:#efe;padding:20px;border:2px solid green;">No fatal error detected - script completed normally up to this point.</pre>';
    }
});

echo "Starting diagnostic...<br>";
echo "PHP version: " . phpversion() . "<br>";
echo "Loaded extensions: " . implode(', ', get_loaded_extensions()) . "<br><br>";

echo "Attempting to load CodeIgniter's index.php now...<br>";
flush();

chdir(__DIR__);
require __DIR__ . '/index.php';
