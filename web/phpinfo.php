<?php
//echo phpinfo();
if (mail("mcnally486@hotmail.com", "test", "test")) {
  echo 'mail sent';  
}else {
    echo 'mail failed'; 
}

?>