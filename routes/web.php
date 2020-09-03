<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
Route::get('/', 'HomeController@index');
Route::get('/survey', 'SurveyTitleController@show');
Route::get('/survey_view/id/{id}', 'SurveyTitleController@view');
Route::get('/survey_session', 'SurveySessionController@load');
Route::get('/province/id/{id}', 'ProvincialCouncilController@index');
// Route::get('/province/id/{id}', 'ProvincialCouncilController@index');
Route::get('/local_authority_view/id/{id}/{sessionID}', 'SurveyViewController@localAuthorty');

/*
|plant
|
|
 */
Route::get('/plant', 'PlantController@index');
Route::Post('/plant', 'PlantController@create');
Route::get('/plant/id/{id}', 'PlantController@edit');
Route::put('/plant/id/{id}', 'PlantController@store');
Route::delete('/plant/id/{id}', 'PlantController@destroy');

/*
|transfer station
|
|
 */
Route::get('/transfer_station', 'TransferStationController@index');
Route::Post('/transfer_station', 'TransferStationController@create');
Route::get('/transfer_station/id/{id}', 'TransferStationController@edit');
Route::put('/transfer_station/id/{id}', 'TransferStationController@store');
Route::delete('/transfer_station/id/{id}', 'TransferStationController@destroy');
Route::get('/transfer_collect', 'TransferCollectController@index2');
Route::get('/transfer_collection_segregation', 'TransferSegregationController@index');

/*
|dump site
|
|
 */
Route::get('/dumpsite', 'DumpSiteController@index');
Route::Post('/dumpsite', 'DumpSiteController@create');
Route::get('/dumpsite/id/{id}', 'DumpSiteController@edit');
Route::put('/dumpsite/id/{id}', 'DumpSiteController@store');
Route::delete('/dumpsite/id/{id}', 'DumpSiteController@destroy');
/*
|sampathkendraya
|
|
 */
Route::get('/sampath', 'SamapthKendrayaController@index');
Route::Post('/sampath', 'SamapthKendrayaController@create');
Route::get('/sampath/id/{id}', 'SamapthKendrayaController@edit');
Route::put('/sampath/id/{id}', 'SamapthKendrayaController@store');
Route::delete('/sampath/id/{id}', 'SamapthKendrayaController@destroy');

/*
|suboffice
|
|
 */
Route::get('/suboffice', 'SubofficeController@index');
Route::Post('/suboffice', 'SubofficeController@create');
Route::get('/suboffice/id/{id}', 'SubofficeController@edit');
Route::put('/suboffice/id/{id}', 'SubofficeController@store');
Route::delete('/suboffice/id/{id}', 'SubofficeController@destroy');
/*
|ward
|
|
 */
Route::get('/ward', 'WardController@index');
Route::get('/ward_vehicle_assign', 'WardController@indexWardAssign');
Route::Post('/ward', 'WardController@create');
Route::get('/ward/id/{id}', 'WardController@edit');
Route::put('/ward/id/{id}', 'WardController@store');
Route::delete('/ward/id/{id}', 'WardController@destroy');

Route::get('/province/{id}', 'SurveyViewController@province');
Route::get('/la/{id}', 'SurveyViewController@localAuthorty');
/*
|vehicle
|
|
 */
Route::get('/vehicle', 'VehicleController@index');
Route::Post('/vehicle', 'VehicleController@create');
Route::get('/vehicle/id/{id}', 'VehicleController@edit');
Route::put('/vehicle/id/{id}', 'VehicleController@store');
Route::delete('/vehicle/id/{id}', 'VehicleController@destroy');
Route::get('/driver', 'DriverController@index');

Auth::routes(['register' => false]);


// waste COllection
Route::get('/waste_collection_settings', 'WasteCollectionSettingsController@index');

//
Route::get('/waste_collection', 'MainCollectionController@index');
Route::get('/waste_collection_submit', 'MainCollectionController@submit_collection');

Route::get('/ward_assign', 'WardController@indexWardAssignSuboffice');


//Zone
Route::get('/zone', 'ZoneController@index');

//Register Store
Route::get('/register_store', 'StoreController@index');
//WasteInput Logs
Route::get('/waste_inputlog', 'TransferCollectController@index');
Route::get('/facility_inputlog', 'TransferCollectController@index3');


//Broken []
Route::get('/broken_vehicles', 'BrokenVehicleController@index');


//segregatable-types Store
Route::get('/segregatable_types', 'SegregatablePartsController@index');


//Bio Compost Input
Route::get('/bio_compostinput', 'BioCompostInputController@index');
Route::get('/plant_production', 'BioCompostInputController@index2');

//bio degradable
Route::get('/bio_degradable', 'PlantDegradablePoolController@index');


//
Route::get('/facility_output_types', 'FacilityOutputTypesController@index');
Route::get('/compost_report', 'BioCompostInputController@index3');


//reports
Route::get('/general_reports', 'GeneralReportsController@index');
Route::get('/la_report', 'GeneralReportsController@la_report');
Route::get('/plants_report', 'GeneralReportsController@plants_report');
Route::get('/transfer_satation_report', 'GeneralReportsController@transfer_satation_report');
Route::get('/dump_site_report', 'GeneralReportsController@dump_site_report');
Route::get('/sampath_kendraya_report', 'GeneralReportsController@sampath_kendraya_report');
Route::get('/vehicle_report', 'GeneralReportsController@vahicle_report');
Route::get('/damaged_vahicle_report', 'GeneralReportsController@damaged_vahicle_report');
Route::get('/general_report_vehicle_by_la', 'GeneralReportsController@general_report_vehicle_by_la');

//waste colection report
Route::get('/row_waste_collection_report', 'WasteCollectionReportsController@rowWasteCollectionReport');
Route::get('/waste_collection_report', 'WasteCollectionReportsController@index');
Route::get('/waste_collection/excel', 'WasteCollectionReportsController@export');
Route::get('/waste_collection/json', 'WasteCollectionReportsController@downloadJSON');
//end waste colection report


//end report
Route::get('/survey_reports', 'SurveyReportsController@index');
Route::get('/row_survey_report', 'SurveyReportsController@rowReport');

Route::get('download/', 'SurveyReportsController@export');
Route::get('download/json', 'SurveyReportsController@downloadJSON');
//workers

Route::get('/worker', 'WorkerController@index');
Route::get('/downloads', 'WorkerController@index2');

//districts
Route::get('/districts', 'DistrictController@index');

//waste collcetion plant
Route::get('/waste_collection_plant', 'MainCollectionController@index2');

//filtering reports
Route::get('/filtering_report', 'GeneralReportsController@index2');

