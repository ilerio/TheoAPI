<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'landing';
$route['(:any)'] = 'api/$1';
$route['(:any)/(:any)'] = 'api/$1/$2';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
