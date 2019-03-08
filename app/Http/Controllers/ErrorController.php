<?php

namespace App\Http\Controllers;

use App\models\Error;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    private $e;
    function __construct()
    {
        $this->e = new Error();
    }

    function renderError(){
        $errors = $this->e->getErrors();
        return view('pages.admin.errors',["errors" => $errors]);
    }

    function exportCSV(){
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
            "text",
            "date",
            "time"
        ]);

        $data= $this->e->getErrors();
        foreach ($data as $row) {
            // Add a new row with data
            fputcsv($handle, [
                $row->id,
                $row->text,
                $row->date,
                $row->time
            ]);
        }
        fclose($handle);
        return response()->download($filename, "errors.csv", $headers);

    }
}
