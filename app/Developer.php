<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    /**
     * この開発元が所有するソフトウェア。（ Softwareモデルとの関係を定義）
     */
    public function softwares()
    {
        return $this->hasMany(Software::class);
    }
}
