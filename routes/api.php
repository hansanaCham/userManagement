<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//api
Route::middleware('auth:api')->post('/rolls/rollId/{id}', 'RollController@store');
Route::middleware('auth:api')->delete('/rolls/rollId/{id}', 'RollController@destroy');
Route::middleware('auth:api')->get('/rolls/levelId/{id}', 'LevelController@rollsByLevel')->name('rolls_by_level');
Route::middleware('auth:api')->get('/rolls/rollPrivilege/{id}', 'RollController@getRollPrevilagesById')->name('Previlages_by_rollId');
Route::middleware('auth:api')->get('/user/Privileges/{id}', 'UserController@previlagesById');
Route::middleware('auth:api')->get('/rolls/privilege/add', 'RollController@PrevilagesAdd')->name('Previlages_add');
Route::middleware('auth:api')->get('/user/privilege/add/{id}', 'UserController@PrevilagesAddById');
Route::middleware('auth:api')->get('/user/activity/{id}', 'UserController@activeStatus');
Route::middleware('auth:api')->get('/level/institutes/id/{id}', 'LevelController@instituteById')->name('level_institues_by_id');

// user
Route::middleware('auth:api')->get('/user/authUser', 'UserController@getAuthUser');
Route::middleware('auth:api')->get('/user/authUser/privileges', 'UserController@getAuthUserPrivilages');

/*
[
{
"id": 1,
"name": "User Create",
"pivot": {
"user_id": 1,
"privilege_id": 1,
"is_read": 1,whereHave
"is_create": 1,
"is_update": 1,
"is_delete": 1
}
},
{
"id": 2,
"name": "User Role",
"pivot": {
"user_id": 1,
"privilege_id": 2,
"is_read": 1,
"is_create": 1,
"is_update": 1,
"is_delete": 1
}
},
]

 */
Route::middleware('auth:api')->get('/user/authUser/privilege/id/{id}', 'UserController@getAuthUserPrivilage');


// waste type routes
Route::middleware('auth:api')->post('/WasteType', 'WasteCollectionSettingsController@create');
/*
{
    "id": 1,
    "message": "true"
}

//validation output
{
    "message": "The given data was invalid.",
    "errors": {
        "name": [
            "The name has already been taken."
        ]
    }
}
  */




Route::middleware('auth:api')->get('/WasteType', 'WasteCollectionSettingsController@show');  //get all WasteType
/*
[
    {
        "id": 1,
        "name": "waste01",
        "created_at": "2020-02-20 08:24:09",
        "updated_at": "2020-02-20 08:24:09"
    },
    {
        "id": 2,
        "name": "test",
        "created_at": "2020-02-20 08:33:50",
        "updated_at": "2020-02-20 08:33:50"
    }
]
*/


Route::middleware('auth:api')->get('/WasteType/id/{id}', 'WasteCollectionSettingsController@find'); //get a WasteType by id
/*
{
    "id": 2,
    "name": "test",
    "created_at": "2020-02-20 08:33:50",
    "updated_at": "2020-02-20 08:33:50"
}
*/
Route::middleware('auth:api')->put('/WasteType/id/{id}', 'WasteCollectionSettingsController@store'); //update WasteType
/*
{
    "id": 1,
    "message": "true"
}
*/

Route::middleware('auth:api')->delete('/WasteType/id/{id}', 'WasteCollectionSettingsController@destroy'); //delete WasteType
/*
{
    "id": 1,
    "message": "true"
}
*/


// end waste type 



//densities 

Route::middleware('auth:api')->post('/density', 'WasteCollectionSettingsController@createDensities');
/*
{
    "id": 1,
    "message": "true"
}

//validation output
{
    "message": "The given data was invalid.",
    "errors": {
        "density": [
            "The density must be a number."
        ]
    }
}
  */



Route::middleware('auth:api')->get('/density', 'WasteCollectionSettingsController@showDensities'); //get all Densities
/*
[
    {
        "id": 3,
        "density": "10.500",
        "description": "test ",
        "waste_type_id": 1,
        "status": 0,
        "created_at": "2020-02-20 10:09:43",
        "updated_at": "2020-02-20 10:09:43"
    }

      {
        "id": 4,
        "density": "45.500",
        "description": "test2 ",
        "waste_type_id": 1,
        "status": 0,
        "created_at": "2020-02-20 10:11:43",
        "updated_at": "2020-02-20 10:11:43"
    }
]
*/
Route::middleware('auth:api')->get('/density/id/{id}', 'WasteCollectionSettingsController@findDensities'); //get a Densitie by id
/*
{
    "id": 3,
    "density": "10.500",
    "description": "test ",
    "waste_type_id": 1,
    "status": 0,
    "created_at": "2020-02-20 10:09:43",
    "updated_at": "2020-02-20 10:09:43"
}
*/

Route::middleware('auth:api')->put('/density/id/{id}', 'WasteCollectionSettingsController@storeDensities'); //update WasteType
/*
{
    "id": 1,
    "message": "true"
}

validation
{
    "message": "The given data was invalid.",
    "errors": {
        "density": [
            "The density must be a number."
        ]
    }
}
*/

Route::middleware('auth:api')->delete('/density/id/{id}', 'WasteCollectionSettingsController@destroyDensities'); //delete density
/*
{
    "id": 1,
    "message": "true"
}
*/

Route::middleware('auth:api')->get('/density_by_waste_type/id/{id}', 'WasteCollectionSettingsController@getDensityByWasteType'); //get density by waste id
// [
//     {
//         "id": 4,
//         "density": "15.000",
//         "description": "Kurunegla",
//         "waste_type_id": 1,
//         "status": 0,
//         "created_at": null,
//         "updated_at": null
//     }
// ]

Route::middleware('auth:api')->get('/density_by_waste_type_and_active/id/{id}', 'WasteCollectionSettingsController@showDensitiesByWasteTypeAndActive'); //get Densities ByWasteType and active status = 1
/*
[
    {
        "id": 23,
        "density": "5554.000",
        "description": "jj",
        "waste_type_id": 22,
        "status": 1,
        "created_at": "2020-03-24 11:36:31",
        "updated_at": "2020-03-24 11:36:50"
    }
]
*/

Route::middleware('auth:api')->patch('/set_density_active/id/{id}', 'WasteCollectionSettingsController@setDensityActive'); //set  density active
// {"id":"1","msg":"true"}


//end densities


//CollectionRatio
Route::middleware('auth:api')->post('/collection_ratio', 'WasteCollectionSettingsController@createCollectionRatio');
//input array example
// {
//  "name" :"half",
//  "number":"50%",
//  "ratio":"0.5"
// }


// query output example
// {
//     "id": 1,
//     "message": "true"
// }


//validation example
// {
//     "message": "The given data was invalid.",
//     "errors": {
//         "name": [
//             "The name field is required."
//         ],
//         "number": [
//             "The number field is required."
//         ],
//         "ratio": [
//             "The ratio must be a number."
//         ]
//     }
// }
Route::middleware('auth:api')->get('/collection_ratio', 'WasteCollectionSettingsController@showCollectionRatio'); //get all collection_ratio
// [
//     {
//         "id": 1,
//         "name": "half",
//         "number": "50%",
//         "ratio": "0.500",
//         "created_at": "2020-02-24 06:27:21",
//         "updated_at": "2020-02-24 06:27:21"
//     }
// ]

Route::middleware('auth:api')->get('/collection_ratio/id/{id}', 'WasteCollectionSettingsController@findCollectionRatio'); //get a CollectionRatio by id
/*
{
    "id": 1,
    "name": "half",
    "number": "50%",
    "ratio": "0.500",
    "created_at": "2020-02-24 06:27:21",
    "updated_at": "2020-02-24 06:27:21"
}

*/
//store collection ratio
Route::middleware('auth:api')->put('/collection_ratio/id/{id}', 'WasteCollectionSettingsController@storeCollectionRatio'); //update CollectionRatio
/* 

data arry example
{
    "name": "half",
    "number": "80%",
    "ratio": "0.500"
}

server response 
{
    "id": 1,
    "message": "true"
}

validation responce example

{
    "message": "The given data was invalid.",
    "errors": {
        "name": [
            "The name field is required."
        ],
        "number": [
            "The number field is required."
        ],
        "ratio": [
            "The ratio must be a number."
        ]
    }
}


*/

Route::middleware('auth:api')->delete('/collection_ratio/id/{id}', 'WasteCollectionSettingsController@destroyCollectionRatio'); //CollectionRatio
/*
server responce 
{
    "id": 1,
    "message": "true"
}

*/
//end collectio ratio


//end CollectionRatio



//Plant Controller API
Route::middleware('auth:api')->get('/getallplant', 'PlantController@getAllPlant'); //
/*
[
    {
        "id": 1,
        "name": "Sad",
        "address": "123",
        "contactNo": "1111111111",
        "type": "Bio Plant",
        "local_authority_id": null,
        "created_at": "2020-02-10 07:12:32",
        "updated_at": "2020-02-10 08:06:24",
        "deleted_at": null
    },
    {
        "id": 2,
        "name": "Sad",
        "address": "123",
        "contactNo": "111141111112",
        "type": "Compost Palnt",
        "local_authority_id": null,
        "created_at": "2020-02-10 07:13:28",
        "updated_at": "2020-02-10 08:06:47",
        "deleted_at": null
    }
]


*/

//get plat by active local authority
Route::middleware('auth:api')->get('/get_plant_by_level', 'PlantController@getPlants');


/*
[
    {
        "id": 3,
        "name": "aaaa",
        "address": "eraaawerw",
        "contactNo": null,
        "type": "Compost Palnt",
        "local_authority_id": 10,
        "created_at": "2020-03-25 11:31:25",
        "updated_at": "2020-03-25 11:31:25",
        "deleted_at": null,
        "local_authority": {
            "id": 10,
            "name": "Bandaragama PS",
            "type": "Pradeshiya Sabha",
            "address": "Pradeshiya Sabha, Panadura Road, Bandaragama.",
            "laCode": null,
            "provincial_council_id": 1,
            "deleted_at": null,
            "created_at": "2020-01-22 16:12:49",
            "updated_at": "2020-01-22 16:12:49",
            "parent_id": null
        }
    },
    {
        "id": 4,
        "name": "eeeeee",
        "address": "eeee",
        "contactNo": null,
        "type": "Bio Plant",
        "local_authority_id": 10,
        "created_at": "2020-03-25 11:31:37",
        "updated_at": "2020-03-25 11:31:37",
        "deleted_at": null,
        "local_authority": {
            "id": 10,
            "name": "Bandaragama PS",
            "type": "Pradeshiya Sabha",
            "address": "Pradeshiya Sabha, Panadura Road, Bandaragama.",
            "laCode": null,
            "provincial_council_id": 1,
            "deleted_at": null,
            "created_at": "2020-01-22 16:12:49",
            "updated_at": "2020-01-22 16:12:49",
            "parent_id": null
        }
    }
]

*/
//end get plat by active local authority

//end Plant Controller API


//TransferStationController
Route::middleware('auth:api')->get('/getalltransferstation', 'TransferStationController@showTransferStation'); //get all TransferStation 

/*
[
    {
        "id": 1,
        "name": "Jayasinghe Power Plant",
        "address": "Narammla",
        "contactNo": null,
        "local_authority_id": 10,
        "created_at": "2020-03-25 11:38:28",
        "updated_at": "2020-03-25 11:38:28",
        "deleted_at": null
    },
    {
        "id": 3,
        "name": "Ceytech",
        "address": "kurunegala",
        "contactNo": "0370000000",
        "local_authority_id": 10,
        "created_at": "2020-03-25 11:39:06",
        "updated_at": "2020-03-25 11:39:06",
        "deleted_at": null
    }
]
 */


Route::middleware('auth:api')->get('/get_transferstation_by_level', 'TransferStationController@getTransferStations'); //get a Transfer Station by level
/*
[
    {
        "id": 1,
        "name": "Jayasinghe Power Plant",
        "address": "Narammla",
        "contactNo": null,
        "local_authority_id": 10,
        "created_at": "2020-03-25 11:38:28",
        "updated_at": "2020-03-25 11:38:28",
        "deleted_at": null
    },
    {
        "id": 3,
        "name": "Ceytech",
        "address": "kurunegala",
        "contactNo": "0370000000",
        "local_authority_id": 10,
        "created_at": "2020-03-25 11:39:06",
        "updated_at": "2020-03-25 11:39:06",
        "deleted_at": null
    }
]
 */
//end TransferStationController


//dump side api code
Route::middleware('auth:api')->get('/get_all_dumpsite', 'DumpSiteController@showDumpSite'); //get all DumpSite 

/*
[
    {
        "id": 1,
        "name": "abc",
        "address": null,
        "contactNo": null,
        "local_authority_id": null,
        "created_at": "2020-02-25 09:07:32",
        "updated_at": "2020-02-25 09:07:32",
        "deleted_at": null
    }
]
 */

Route::middleware('auth:api')->get('/get_dumpsite_by_level', 'DumpSiteController@getDumpSites'); //get all DumpSite 
//end dump side api code


//vehicle api
Route::middleware('auth:api')->get('/vehicle_by_id/{id}', 'VehicleController@getVehicleById'); //get vehicle by id

Route::middleware('auth:api')->get('/get_runnable_vehicle_by_authority/id/{id}', 'VehicleController@runnableVehicalByAuthority'); //get_runnable_vehicle_by_authority


Route::middleware('auth:api')->get('/get_vehicle_by_authority', 'VehicleController@vehicalByAuthority'); //get vehicle by authority

/*
[
    {
        "id": 1,
        "register_no": "BB756846",
        "capacity": "4000.00",
        "wide": "5000.00",
        "length": "6000.00",
        "height": "7000.00",
        "production_year": 2019,
        "bland": "bbb",
        "condition": "Moderate",
        "dump_type": "Dump",
        "ownership": "LA",
        "local_authority_id": 10,
        "ward_id": 1,
        "vehicle_type_id": 1,
        "created_at": "2020-01-27 09:21:29",
        "updated_at": "2020-01-27 09:41:37",
        "deleted_at": null
    },
    {
        "id": 2,
        "register_no": "BB756849",
        "capacity": "4000.00",
        "wide": "4000.00",
        "length": "4000.00",
        "height": "4000.00",
        "production_year": 4000,
        "bland": "dasdas",
        "condition": "Good",
        "dump_type": "Dump",
        "ownership": "LA",
        "local_authority_id": 10,
        "ward_id": null,
        "vehicle_type_id": 1,
        "created_at": "2020-01-27 09:21:55",
        "updated_at": "2020-01-27 09:21:55",
        "deleted_at": null
    }
]
 */

Route::middleware('auth:api')->get('/get_tempory_vehicle', 'VehicleController@getTemporyVehicle'); //get tempory vehicle 
Route::middleware('auth:api')->get('/get_tempory_vehicle_by_authority', 'VehicleController@getTemporyVehicleByAuthority'); //get get tempory vehicle by la


//end vehicle api


//WardController api

Route::middleware('auth:api')->get('/get_word_by_authority/id/{id}', 'WardController@getWordByLevel');
/*
[
    {
        "id": 1,
        "name": "ward one",
        "code": null,
        "local_authority_id": 10,
        "created_at": "2020-01-27 09:19:34",
        "updated_at": "2020-01-27 09:19:34",
        "deleted_at": null
    },
    {
        "id": 2,
        "name": "ward two",
        "code": null,
        "local_authority_id": 10,
        "created_at": "2020-01-27 09:19:39",
        "updated_at": "2020-01-27 09:19:39",
        "deleted_at": null
    }
]
*/
Route::middleware('auth:api')->get('/get_unassigned_words', 'WardController@getUnassignedWords'); //get unallocated words
/*
[
    {
        "id": 1,
        "name": "central",
        "code": "01",
        "local_authority_id": 57,
        "created_at": "2020-02-25 11:38:50",
        "updated_at": "2020-02-25 11:38:50",
        "deleted_at": null,
        "sub_office_id": null
    },
    {
        "id": 2,
        "name": "Nalluruwa",
        "code": "02",
        "local_authority_id": 57,
        "created_at": "2020-02-25 11:39:11",
        "updated_at": "2020-02-25 11:39:11",
        "deleted_at": null,
        "sub_office_id": null
    },
    {
        "id": 12,
        "name": "ward",
        "code": "fghjk",
        "local_authority_id": 18,
        "created_at": "2020-03-24 04:42:53",
        "updated_at": "2020-03-24 04:42:53",
        "deleted_at": null,
        "sub_office_id": null
    }
]


*/


Route::middleware('auth:api')->get('/get_words_by_sub_office/id/{id}', 'WardController@getWordsBy_subOffice'); //get  words by sub office id

/*
[
    {
        "id": 13,
        "name": "ward tow",
        "code": "fdfg",
        "local_authority_id": 18,
        "created_at": "2020-03-24 04:43:12",
        "updated_at": "2020-03-24 04:43:12",
        "deleted_at": null,
        "sub_office_id": 51
    }
]

*/
Route::middleware('auth:api')->put('/assign_ward/id/{id}', 'WardController@assignWard'); //assignWard to sub office
/*
request
{
        "sub_office_id": "60"
        }


response
{
    "id": 1,
    "message": "true"
}
*/



Route::middleware('auth:api')->get('/get_sub_office', 'SubofficeController@getSubOffice'); //get sub office by local authority
/*


*/
//end WardController api



//MainCollection  api codes

Route::middleware('auth:api')->post('/main_collection', 'MainCollectionController@create'); //save MainCollection 

/*request Example 
{

    "waste_type_id":"1",
    "ward_id":"12",
    "is_accurate":"1",
    "destination_type":"dumpsite",
    "destination_id":"1",
    "date":"2020-01-01",
    "amount":"5000",
    "density":"12.5",
    "ratio":"1",
    "session" : "1",
    "driver_id":"3",
    "is_tempory":"1",
    "registerNo":"BBW-7000",
    "type" : "1"  
    
    }

 * 
 * 
 *  */
Route::middleware('auth:api')->post('/main_collection_all', 'MainCollectionController@create1'); //save MainCollection 

/*request Example 
{

    "waste_type_id":"1",
    "ward_id":"12",
    "is_accurate":"1",
    "destination_type":"dumpsite",
    "destination_id":"1",
    "date":"2020-01-01",
    "amount":"5000",
    "density":"12.5",
    "ratio":"1",
    "session" : "1",
    "driver_id":"3",
    "is_tempory":"1",
    "registerNo":"BBW-7000",
    "type" : "1"  
    
    }

 * 
 * 
 *  */



Route::middleware('auth:api')->get('/main_collection', 'MainCollectionController@showMainCollection'); //get all MainCollection 

/*request Example 
 {    }   
   response Example  
 validation response Example */

Route::middleware('auth:api')->get('/main_collection/id/{id}', 'MainCollectionController@findMainCollection'); //get a MainCollection by id  

/*request Example 
 {    }   
   response Example  
 validation response Example */


Route::middleware('auth:api')->get('/get_submitted_main_collection/id/{id}', 'MainCollectionController@getSubmittedMainCollection'); //get submitted  MainCollection   

/*request Example 
 {    }   
   response Example  

   [{
   "id":2,
   "vehicle_id":1,
   "waste_type_id":1,
   "ward_id":12,
   "amount":112.5,
   "is_accurate":2,
   "density":12.5,
   "ratio":1,
   "vehicle_capacity":9,
   "destination_type":"dumpsite",
   "destination_id":"1",
   "date":"2020-01-01",
   "submitted_date":null,
   "main_collection_sessions_id":null,
   "is_submitted":1,
   "change_ref_id":null,
   "is_updatable":2,
   "created_at":"2020-03-26 11:56:17",
   "updated_at":"2020-03-27 04:02:05",
   "deleted_at":null,
   "driver_id":null,
   "session":"",
   "register_no":"BB756846",
   "waste_type_name":"burnable"
   },

   ]
 validation response Example */
Route::middleware('auth:api')->get('/get_submitted_main_collection', 'MainCollectionController@getSubmittedMainCollectionByLoggedLa'); //get submitted  MainCollection   

/*request Example 
 {    }   
   response Example  

   [{
   "id":2,
   "vehicle_id":1,
   "waste_type_id":1,
   "ward_id":12,
   "amount":112.5,
   "is_accurate":2,
   "density":12.5,
   "ratio":1,
   "vehicle_capacity":9,
   "destination_type":"dumpsite",
   "destination_id":"1",
   "date":"2020-01-01",
   "submitted_date":null,
   "main_collection_sessions_id":null,
   "is_submitted":1,
   "change_ref_id":null,
   "is_updatable":2,
   "created_at":"2020-03-26 11:56:17",
   "updated_at":"2020-03-27 04:02:05",
   "deleted_at":null,
   "driver_id":null,
   "session":"",
   "register_no":"BB756846",
   "waste_type_name":"burnable"
   },

   ]
 validation response Example */


Route::middleware('auth:api')->put('/main_collection/id/{id}', 'MainCollectionController@store'); //update MainCollection 

/*request Example 
 {    }   
   response Example  
 validation response Example */

Route::middleware('auth:api')->delete('/main_collection/id/{id}', 'MainCollectionController@destroy'); //deleteMainCollection

/*request Example 
 {    }   
   response Example  
 validation response Example */

//end MainCollection  api codes 
// drivers
Route::middleware('auth:api')->get('/drivers/id/{id}', 'DriverController@show'); // get drivers in the la
/*
[
    {
        "id": 1,
        "first_name": "siyathu updated",
        "last_name": "banda",
        "nic": "950901390V", 
        "address": "nakkawatta",
        "contact_no": "0710576923",
        "local_authority_id": 18,
        "created_at": "2020-04-05 13:26:19",
        "updated_at": "2020-04-05 13:44:33"
    }
]




*/
Route::middleware('auth:api')->get('/drivers', 'DriverController@getallByla'); // get drivers in the la
/*
[
    {
        "id": 1,
        "first_name": "siyathu updated",
        "last_name": "banda",
        "nic": "950901390V", 
        "address": "nakkawatta",
        "contact_no": "0710576923",
        "local_authority_id": 18,
        "created_at": "2020-04-05 13:26:19",
        "updated_at": "2020-04-05 13:44:33"
    }
]




*/


Route::middleware('auth:api')->post('/driver', 'DriverController@create'); //  insert driver
/*
{
	"first_name":"siyathu updated",
	"last_name":"banda",
	"address":"nakkawatta",
	"contact_no":"0710576923",
	"nic":"950901390V"
}
*/

Route::middleware('auth:api')->put('/driver/id/{id}', 'DriverController@store'); // update driver
/*
{
	"first_name":"siyathu updated",
	"last_name":"banda",
	"address":"nakkawatta",
	"contact_no":"0710576923",
	"nic":"950901390V"
}
*/



Route::middleware('auth:api')->get('/driver/id/{id}', 'DriverController@find'); // get A driver

/*
{
    "id": 1,
    "first_name": "siyathu updated",
    "last_name": "banda",
    "nic": "950901390V",
    "address": "nakkawatta",
    "contact_no": "0710576923",
    "local_authority_id": 18,
    "created_at": "2020-04-05 13:26:19",
    "updated_at": "2020-04-05 13:44:33"
}
*/

Route::middleware('auth:api')->delete('/driver/id/{id}', 'DriverController@destroy'); // get A driver

/*
{
    "id": 1,
    "message": "true"
}

*/

Route::middleware('auth:api')->get('/driver/is_available/nic/{nic}', 'DriverController@uniqueNic'); // get A driver

/*
{
    "id": 1,
    "message": "true" true => if available false => is nic is already used
}

*/
// end drivers

//Zone  api codes  
Route::middleware('auth:api')->post('/zone', 'ZoneController@create'); //save Zone 

/*request Example 
 { 

 {
        "code": "nar",
        "name": "narammala"
    }

       }   
   response Example  

   {
    "id": 1,
    "message": "true"
}
 validation response Example 
{
    "message": "The given data was invalid.",
    "errors": {
        "code": [
            "The code has already been taken."
        ],
        "name": [
            "The name has already been taken."
        ]
    }
}

 */

Route::middleware('auth:api')->get('/zone', 'ZoneController@show');

//get all Zone 

/*request Example 
 {    }   
   response Example 

   [
    {
        "id": 1,
        "code": "ku",
        "name": "kurunegala",
        "created_at": "2020-04-10 05:21:31",
        "updated_at": "2020-04-10 05:21:31"
    },
    {
        "id": 5,
        "code": "naram",
        "name": "narammala",
        "created_at": "2020-04-10 05:50:16",
        "updated_at": "2020-04-10 05:50:16"
    }
] 
 validation response Example 
 */




Route::middleware('auth:api')->get('/zone/name/{name}', 'ZoneController@isNameValid'); //isNameValid
/*
response Example
 if name in use
{
    "id": 0,
    "message": "name narammala already exists"
}

if name avilable

{
    "id": 1,
    "message": "You can use this Name"
}
 */

Route::middleware('auth:api')->get('/zone/code/{code}', 'ZoneController@isCodeValid'); //isCodeValid
/*
if code avilable
{
    "id": 0,
    "message": "code naram already exists"
}

if code avilable
{
    "id": 1,
    "message": "You can use this code"
}

*/

Route::middleware('auth:api')->get('/zone_province/id/{id}', 'LocalAuthorityController@findByProvince'); //isCodeValid
/*
 {
        "code": "nar",
        "name": "narammala"
    }

*/
Route::middleware('auth:api')->get('/zone/id/{id}', 'ZoneController@find'); //get a Zone by id  

/*request Example 
 {    }   
   response Example  
   {
    "id": 3,
    "code": "naram",
    "name": "narammala",
    "created_at": "2020-04-10 05:29:26",
    "updated_at": "2020-04-10 05:47:36"
}
 validation response Example */

Route::middleware('auth:api')->put('/zone/id/{id}', 'ZoneController@store'); //update Zone 

/*request Example 
{
        "code": "naram",
        "name": "narammala"
    }  
   response Example  
{
    "id": 1,
    "message": "true"
}


 validation response Example */

Route::middleware('auth:api')->delete('/zone/id/{id}', 'ZoneController@destroy'); //deleteZone

/*request Example 
{
    "id": 1,
    "message": "true"
}  
   response Example  
 validation response Example */

//end Zone  api codes 

// Broken
Route::middleware('auth:api')->patch('/vehicle/broken/id/{id}', 'BrokenVehicleController@setBroken'); // set a broken vehicle

// {
//     "id": 1,
//     "mgs": "ok"
// }
Route::middleware('auth:api')->patch('/vehicle/repair/id/{id}', 'BrokenVehicleController@setRepaired'); // set a repaired vehicle

// {
//     "id": 1,
//     "mgs": "ok"
// }
Route::middleware('auth:api')->get('/vehicle/not_broken', 'BrokenVehicleController@repairVehicles'); // get not broken vehicles

/*

[
    {
        "id": 1,
        "register_no": "BB756846",
        "capacity": "9.00",
        "wide": "3.00",
        "length": "3.00",
        "height": "3.00",
        "production_year": 2020,
        "bland": "tata",
        "condition": "Good",
        "dump_type": "Dump",
        "ownership": "LA",
        "local_authority_id": 18,
        "ward_id": 12,
        "vehicle_type_id": 1,
        "created_at": "2020-03-26 11:29:03",
        "updated_at": "2020-04-21 05:36:14",
        "deleted_at": null,
        "driver_id": null,
        "broken": 0
    },
    {
        "id": 2,
        "register_no": "V45642512",
        "capacity": "5456.00",
        "wide": "4564.00",
        "length": "4654.00",
        "height": "465464.00",
        "production_year": 1995,
        "bland": "dasd",
        "condition": "Good",
        "dump_type": "Transfer",
        "ownership": "LA",
        "local_authority_id": 18,
        "ward_id": null,
        "vehicle_type_id": 1,
        "created_at": "2020-04-19 16:01:31",
        "updated_at": "2020-04-19 16:01:31",
        "deleted_at": null,
        "driver_id": null,
        "broken": 0
    }
]


*/
Route::middleware('auth:api')->get('/vehicle/broken', 'BrokenVehicleController@brokenVehicles'); // get broken vehicles

/*

[
    {
        "id": 1,
        "register_no": "BB756846",
        "capacity": "9.00",
        "wide": "3.00",
        "length": "3.00",
        "height": "3.00",
        "production_year": 2020,
        "bland": "tata",
        "condition": "Good",
        "dump_type": "Dump",
        "ownership": "LA",
        "local_authority_id": 18,
        "ward_id": 12,
        "vehicle_type_id": 1,
        "created_at": "2020-03-26 11:29:03",
        "updated_at": "2020-04-21 05:36:14",
        "deleted_at": null,
        "driver_id": null,
        "broken": 0
    },
    {
        "id": 2,
        "register_no": "V45642512",
        "capacity": "5456.00",
        "wide": "4564.00",
        "length": "4654.00",
        "height": "465464.00",
        "production_year": 1995,
        "bland": "dasd",
        "condition": "Good",
        "dump_type": "Transfer",
        "ownership": "LA",
        "local_authority_id": 18,
        "ward_id": null,
        "vehicle_type_id": 1,
        "created_at": "2020-04-19 16:01:31",
        "updated_at": "2020-04-19 16:01:31",
        "deleted_at": null,
        "driver_id": null,
        "broken": 0
    }
]



*/

//Item by ID
Route::middleware('auth:api')->get('/vehicle/id/{id}', 'BrokenVehicleController@find');
// Broken





//FacilityOutputTypes  api codes  

Route::middleware('auth:api')->post('/facilityoutputtypes', 'FacilityOutputTypesController@create'); //save FacilityOutputTypes 

/*request Example 
 {
 "name" : "test name ",
 "type" : "test",
"nature" : "test"
}  
   response Example  
   {
    "id": 1,
    "message": "true"
}


 validation response Example */

Route::middleware('auth:api')->get('/facilityoutputtypes', 'FacilityOutputTypesController@show'); //get all FacilityOutputTypes 

/*request Example 

  
   response Example  
    [
    {
        "id": 1,
        "name": "Compost",
        "type": "Compost Palnt",
        "nature": "main",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 2,
        "name": "Residuals",
        "type": "Compost Palnt",
        "nature": "out",
        "created_at": null,
        "updated_at": null
    }
    ]
 validation response Example
  */

Route::middleware('auth:api')->get('/facilityoutputtypes/id/{id}', 'FacilityOutputTypesController@findFacilityOutputTypes'); //get a FacilityOutputTypes by id  

/*request Example 
 {    }   
   response Example 
   {
    "id": 3,
    "name": "BIO Gas ",
    "type": "Bio Plant",
    "nature": "main",
    "created_at": null,
    "updated_at": null
} 
 validation response Example
{
    "message": "The given data was invalid.",
    "errors": {
        "name": [
            "The name field is required."
        ],
        "type": [
            "The type field is required."
        ],
        "nature": [
            "The nature field is required."
        ]
    }
}

  */

Route::middleware('auth:api')->put('/facilityoutputtypes/id/{id}', 'FacilityOutputTypesController@store'); //update FacilityOutputTypes 

/*request Example 
{
 "name" : "nadun",
 "type" : "test",
"nature" : "test"
} 
   response Example  
   {
    "id": 1,
    "message": "true"
}
 validation response Example
{
    "message": "The given data was invalid.",
    "errors": {
        "name": [
            "The name field is required."
        ],
        "type": [
            "The type field is required."
        ],
        "nature": [
            "The nature field is required."
        ]
    }
}


  */

Route::middleware('auth:api')->delete('/facilityoutputtypes/id/{id}', 'FacilityOutputTypesController@destroy'); //deleteFacilityOutputTypes

/*request Example 
 {    }   
   response Example  
   {
    "id": 1,
    "message": "true"
}
 validation response Example */



Route::middleware('auth:api')->get('/facilityoutputtypes/nature_type', 'FacilityOutputTypesController@getNatureTypes'); // get nature types
/*
{
    "main": "Main",
    "out": "Out"
}
 */

Route::middleware('auth:api')->get('/facilityoutputtypes/plant_type', 'FacilityOutputTypesController@getPlantTypes'); // get plant/facility types
/*
{
    "Bio_Plant": "Bio Plant",
    "Compost_Palnt": "Compost Palnt"
}
*/

//end FacilityOutputTypes  api codes 




//districts API Start
Route::middleware('auth:api')->post('/districts', 'DistrictController@create'); // insert
Route::middleware('auth:api')->get('/districts', 'DistrictController@show');
Route::middleware('auth:api')->put('/districts/id/{id}', 'DistrictController@store'); // update
Route::middleware('auth:api')->delete('/districts/id/{id}', 'DistrictController@destroy');
Route::middleware('auth:api')->get('/districts/id/{id}', 'DistrictController@find');
//districts API End


Route::middleware('auth:api')->get('/localAuthorities', 'LocalAuthorityController@getAllLocalAuthorities'); //get all local authorities
/*
[
    {
        "id": 10,
        "name": "Bandaragama PS",
        "type": "Pradeshiya Sabha",
        "address": "Pradeshiya Sabha, Panadura Road, Bandaragama.",
        "laCode": "WP/PS/001",
        "provincial_council_id": 1,
        "deleted_at": null,
        "created_at": "2020-01-22 16:12:49",
        "updated_at": "2020-01-22 16:12:49",
        "parent_id": null,
        "zone_id": null
    },
    {
        "id": 11,
        "name": "Boralesgamuwa UC",
        "type": "Urban Council",
        "address": "No.01, Aberathna mawatha, Boralesgamuwa.",
        "laCode": "WP/UC/002",
        "provincial_council_id": 1,
        "deleted_at": null,
        "created_at": "2020-01-22 16:18:55",
        "updated_at": "2020-01-22 16:18:55",
        "parent_id": null,
        "zone_id": null
    }
    ]

    */
Route::middleware('auth:api')->get('/testLog/id/{id}', 'DistrictController@testLog');
