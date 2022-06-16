<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;

class TestController extends Controller
{
    public function retrieveJson(){
        $data = File::get(storage_path("app/public/app.json"));
        return json_encode($data);
    }

    public function createJson(){
        $data = [
            [                
                "no" => 1,
                "id_soal" => 5,
                "jawaban" => "d",
            ],[                
                "no" => 2,
                "id_soal" => 6,
                "jawaban" => "c",
            ],
        ];

        $newJson = json_encode($data);

        File::put(storage_path("app/public/newapp.json"), $newJson);
        return json_encode($newJson);
    }

    public function editJson(Request $request){
        $oldJson = File::get(storage_path("app/public/app.json"));
        $data = json_decode($oldJson, true);

        foreach ($data as $key => $entry) {
            if ($entry['no'] == $request->no) {
                $data[$key]['jawaban'] = $request->jawaban;
            }
        }

        $newJson = json_encode($data);
        File::put(storage_path("app/public/app.json"), $newJson);
        return json_encode($newJson);
    }

    public function destroyJson(){
        $deletedJson = File::delete(storage_path("app/public/newapp.json"));
        return 'Dihapus';
    }
}
