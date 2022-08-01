<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'hrd/loginHrd';
$route['login'] = 'hrd/loginHrd';
$route['review'] = 'hrd/review';
$route['input'] = 'hrd/inputdata';
$route['display'] = 'display';
$route['caridata'] = 'hrd/cari';
$route['carigaji'] = 'hrd/carigaji';
$route['caridata-akta'] = 'hrd/cariakta';
$route['caridata-pks'] = 'hrd/caripks';
$route['caridata-izin'] = 'hrd/cariizin';
$route['carilembur'] = 'hrd/carilembur';
$route['caridatatp'] = 'hrd/caritepe';
$route['update/(:any)'] = 'hrd/updatedata/$1';
$route['datauser'] = 'hrd/user';
$route['gaji'] = 'gaji';
$route['lembur'] = 'lembur';
$route['hbd'] = 'hrd/hbd';
$route['reminder'] = 'hrd/reminder';
$route['reminder-izin'] = 'hrd/reminder_izin';
$route['akta'] = 'hrd/akta';
$route['pks'] = 'hrd/pks';
$route['izin'] = 'hrd/izin';
$route['pks-up/(:any)/(:any)'] = 'hrd/pks_up/$1/$2';
$route['izin-up/(:any)/(:any)'] = 'hrd/izin_up/$1/$2';
$route['tp-up/(:any)'] = 'hrd/tepe_up/$1';
$route['data-akta/display'] = 'akta/display';
$route['data-akta/display/(:num)'] = 'akta/display/$1';
$route['data-pks/display'] = 'pks/display';
$route['data-pks/display/(:num)'] = 'pks/display/$1';
$route['data-izin/display'] = 'izin/display';
$route['data-izin/display/(:num)'] = 'izin/display/$1';
$route['tp'] = 'tepe';
$route['import'] = 'import/datagaji';
$route['import-lembur'] = 'import/datalembur';
$route['user'] = 'hrd/userupdate';
$route['log-check'] = 'hrd/logCheck';
$route['logout'] = 'hrd/logout';
$route['ajax'] = 'input/ajax';
$route['ajax-id'] = 'input/ajax_id';
$route['submit'] = 'input/datasubmit';
$route['legal-akta'] = 'input/akta_submit';
$route['legal-pks'] = 'input/pks_submit';
$route['legal-pks-up'] = 'input/pks_update';
$route['legal-izin'] = 'input/izin_submit';
$route['legal-izin-up'] = 'input/izin_update';
$route['updatedata'] = 'update/dataupdate';
$route['updatedatatp'] = 'update/dataupdatetp';
//$route['pdf16'] = 'cetak/pdf16';
$route['pdf'] = 'cetak/pdf';
$route['excel'] = 'cetak/excel';
$route['pdf-cv'] = 'cetak/cv';
$route['pdf-akta'] = 'cetak/pdf_akta';
$route['excel-akta'] = 'cetak/excel_akta';
$route['pdf-pks'] = 'cetak/pdf_pks';
$route['excel-pks'] = 'cetak/excel_pks';
$route['pdf-izin'] = 'cetak/pdf_izin';
$route['excel-izin'] = 'cetak/excel_izin';
$route['cetak-slip/(:any)'] = 'cetak/slip/$1';
$route['cetak-slip-lembur/(:any)'] = 'cetak/slipLembur/$1';
$route['slip/pdf'] = 'cetak/slip_all';
$route['slip-lembur/pdf'] = 'cetak/slipLembur_all';
$route['hapus-gaji'] = 'import/hapus';
$route['hapus-lembur'] = 'import/hapus_lembur';
$route['dlt'] = 'hrd/dlt';
$route['download/(:any)'] = 'cetak/dl/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['qc'] = 'hrd/qc';
