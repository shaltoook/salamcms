<?php  // SalamCMS configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dblibrary = 'native';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'salam';
$CFG->dbuser    = 'root';
$CFG->dbpass    = '123456';
$CFG->prefix    = 'slm_';
$CFG->url       = 'http://salam.local';
$CFG->wwwroot   = 'D:\xampp\htdocs\salamcms\installer';
$CFG->dataroot  = 'D:\xampp\htdocs\salamcms\installer';
