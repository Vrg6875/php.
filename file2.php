<?php
// Append-only mode
$a = fopen("vicky.txt", "a"); // Open in append mode
fwrite($a, "kya haal hai vicky\n"); 
fwrite($a, "ok vicky\n"); 
echo "Append successful";
fclose($a); // Close the file after appending
?>
