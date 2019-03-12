<?php
/**
 * Created by PhpStorm.
 * User: antonije
 * Date: 3/4/19
 * Time: 10:01 PM
 */

namespace App\models;


use Illuminate\Support\Facades\DB;

class Activity
{
    static function insertActivity($userID, $activity)
    {
        return DB::table('activity_log')
            ->insert([
                "user_id" => $userID,
                "activity" => $activity,
                "date" => date('Y-m-d'),
                "time" => date('H:i:s')
        ]);
    }

    function getActivity(){
        return DB::table('activity_log')
            ->get();
    }

    function activityDate($from,$to){
        return DB::table('activity_log')
            ->where('date','>=',$from)
            ->where('date','<=',$to)
            ->get();
    }
}