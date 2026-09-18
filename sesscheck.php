<?php
echo "sys_get_temp_dir(): " . sys_get_temp_dir() . "<br>";
echo "Does this folder exist? " . (is_dir(sys_get_temp_dir()) ? 'YES' : 'NO') . "<br>";
echo "Is it writable? " . (is_writable(sys_get_temp_dir()) ? 'YES' : 'NO') . "<br>";
