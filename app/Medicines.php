<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Medicines extends Model
{
    protected $table = 'medicines';

    public static function insertData($data){

      $value=DB::table('medicines')->where('name', $data['name'])->get();
      if($value->count() == 0){
         DB::table('medicines')->insert($data);
      }
   }
}
