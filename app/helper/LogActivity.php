<?php


namespace App\Helpers;

use App\LogActivity as LogActivityModel;


class LogActivity
{
    public static function addToLog($subject, $model, $response = array('code' => 0, 'data' => 'N/A'))
    {
        $log = [];
        if (!is_subclass_of($model, 'Illuminate\Database\Eloquent\Model')) {
            // not a model 
            $log['table'] = "";
            $log['field'] = 0;
        } else {
            $log['table'] = $model->getTable();
            $log['field'] = $model->id;
        }
        $log['subject'] = $subject;
        $log['user_id'] = auth()->check() ? auth()->user()->id : "N/A";
        $log['url'] = request()->fullUrl();
        $log['ip'] = request()->ip();
        $log['method'] = request()->method();
        $log['headers'] = json_encode(request()->header());
        $log['request_data'] = json_encode(request()->all());
        $log['response_code'] = $response['code'];
        $log['response_data'] = $response['data'];

        LogActivityModel::create($log);
    }


    public static function logActivityLists()
    {
        return LogActivityModel::latest()->get();
    }
}
