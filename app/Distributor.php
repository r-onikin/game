<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $fillable = ['name'];
    
    /**
     * この販売元が所有するソフトウェア。（ Softwareモデルとの関係を定義）
     */
    public function softwares()
    {
        return $this->hasMany(Software::class);
    }
}
