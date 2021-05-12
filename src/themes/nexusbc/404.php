<?php
header("HTTP/1.1 302");
header("Location: ".get_bloginfo('url'));
exit();