<?php

unset($CFG);  // Ignore this line
$CFG = new stdClass();

$CFG->dbtype    = 'mysql';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'moodle19';
$CFG->dbuser    = 'root';
$CFG->dbpass    = 'agora';
$CFG->prefix    = 'ml_';
$CFG->dbpersist = false;

$CFG->passwordsaltmain = 'y7a!Eb019n8Z5*43Sl5J&ly4pjJUk-b';

$CFG->wwwroot  = 'http://agora/agora/moodle';
$CFG->dirroot  = '/srv/www/agora/html/moodle';
$CFG->dataroot = '/srv/www/agora/moodledata';

$CFG->directorypermissions = 02777;

$CFG->admin = 'admin';

include_once("$CFG->dirroot/lib/setup.php");


