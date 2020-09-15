<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'HomeController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Début des routes
$route['Login'] = "LoginController/index";
$route['Employe'] = "EmployeController/index";
$route['Operations'] = "OperationsController/index";
$route['Customers'] = "CustomersController/index";