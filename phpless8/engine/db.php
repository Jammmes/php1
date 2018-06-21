<?php

  $mysql = mysqli_connect(DB_CONFIG['server'],DB_CONFIG['user'],DB_CONFIG['pass'],DB_CONFIG['dbname']);

  $GLOBALS['db'] = $mysql;