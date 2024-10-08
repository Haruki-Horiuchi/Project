<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{   
    use HasFactory;
    //7-04--------------
    //PostControllerクラスのstore関数のfill用の設定
    protected $fillable = [
        'title',
        'body',
    ];
    //------------------

    //7-02--------------
    public function getByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('id')->limit($limit_count)->get();
    }

    public function getPaginateByLimit(int $limit_count = 3)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('id')->paginate($limit_count);
    }
    //------------------

}
