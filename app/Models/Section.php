<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes; 

class Section extends Model
{
    //use HasFactory;
    use softDeletes;

    // protected $dates = ['deleted_at'];
    // protected $table = 'sections';
    // protected $primaryKey = 'id';

 public function books()
 {       
     return $this->hasMany("App\Models\book","section_id","id");
 }
}