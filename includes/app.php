<?php

require 'functions.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

//Connect to database
$db = connectDataBase();

use App\ActiveRecord;

ActiveRecord::setDataBase($db);
