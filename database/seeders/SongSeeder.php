<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $excel_filepath = storage_path('app/public/cancionero.csv');

        $excelData = [];
        $excelFile = fopen($excel_filepath, 'r');

        while (($data = fgetcsv($excelFile, 0, ';')) !== FALSE) {
            $excelData[] = $data;
        }

        fclose($excelFile);

        foreach ($excelData as $key => $value) {
            DB::table('songs')->insert([
                'id' => $value[0],
                'title' => $value[1],
                'artist' => $value[2],
                'gender' => $value[3],
            ]);
        }
        echo var_dump($excelData);
        return response()->json([
            'status' => 'success',
            'message' => 'CancioneroController@index',
            'data' => $excelData,
        ]);
    }
}
