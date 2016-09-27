<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = addslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }

  echo "<script>\nfunction change(){\ndocument.getElementById('displayFilter').submit();\n}\n</script>\n";
?>