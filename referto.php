<?php
echo str_replace("\n", "<br>",file_get_contents(".\\assets\\referti\\" . $_GET["filename"]));