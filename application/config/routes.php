<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

//Defaults
$route['default_controller'] = "main";
$route['404_override'] = '';


//JSON Data
$route['json/users'] = "main/allUsers";     //All Users in JSON format

// $route['json/trips/(:num)'] = "main/tripById/$1";   //Trips By User ID
$route['json/trips/(:any)'] = "main/tripByName/$1"; //Trips By User name
$route['json/trips'] = "main/allTrips";     //All Trips in JSON format

$route['json/trip/(:num)'] = "main/tripByTId/$1";   //Gets trip by trip id
$route['json/trip'] = "main/allTrips";      //All Trips in JSON format


//Database Manipulation
$route['addUser'] = "main/addUser";         //Add users to the database
$route['addTrips'] = "main/addTripsByUserName";       //Add trips to the database
// $route['jank/addTrips/(:any)/(:any)/(:any)/(:any)/(:num)'] = "main/jankAddTrips/$1/$2/$3/$4/$5";       //Add trips to the database


//Check Logic
$route['checkLogin'] = "main/checkLogin";   //Checks the username to database

//Delete trip
$route['deleteTrip'] = "main/deleteTripById";

//logoff
$route['logoff'] = "main/logoff";

/* End of file routes.php */
/* Location: ./application/config/routes.php */
