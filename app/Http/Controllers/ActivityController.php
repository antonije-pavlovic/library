<?php

namespace App\Http\Controllers;

use App\models\Activity;
use App\models\User;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    private $a;

    function __construct()
    {
        $this->a = new Activity();
    }

    function renderActivity()
    {
        $res = $this->a->getActivity();
        return view('pages.admin.activity', ["data" => $res]);
    }

    function exportCSV()
    {
        $headers = array(
            'Content-Type' => 'application/vnd.ms-excel; charset=utf-8',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Content-Disposition' => 'attachment; filename=abc.csv',
            'Expires' => '0',
            'Pragma' => 'public',
        );
        $filename = "download.csv";
        $handle = fopen($filename, 'w');
        fputcsv($handle, [
            "id",
            "user",
            "activity",
            "date",
            "time"
        ]);

        $data = $this->a->getActivity();
        foreach ($data as $row) {
            // Add a new row with data
            fputcsv($handle, [
                $row->id,
                $row->user_id,
                $row->activity,
                $row->date,
                $row->time
            ]);
        }
        fclose($handle);
        return response()->download($filename, "activity.csv", $headers);
    }

    function userActivityCSV($id){
        $headers = array(
            'Content-Type' => 'aplication/vnd.ms-excel; charset=utf-8',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Content-Disposition' => 'attachment; filename=abc.csv',
            'Expires' => '0',
            'Pragma' => 'public'
        );
        $filename = 'download.csv';
        $handle = fopen($filename, 'w');
        fputcsv($handle,[
            'id',
            'user',
            'activity',
            'date',
            'time',
        ]);

        $u = new User();
        $data = $u->userActivity($id);
        foreach ($data as $row) {
            // Add a new row with data
            fputcsv($handle, [
                $row->id,
                $row->name,
                $row->activity,
                $row->date,
                $row->time
            ]);
        }
        fclose($handle);
        return response()->download($filename, $data[0]->name . 'Activity.csv', $headers);


    }
}
