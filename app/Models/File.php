<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'path',
        'user_id',
        'status'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function groups(){
        return $this->hasMany(Group::class,'file_id' , 'id');
    }











    ///// group
    ///  public function users()
    ////    {
    ////        return $this->belongsTo(User::class, 'user_id');
    ////    }
    ////
    ////    public function files()
    ////    {
    ////        return $this->belongsTo(File::class, 'filez_id');
    ////    }
    ///
    ///
    ///
    ///
}
