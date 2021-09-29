<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Platforms extends Model
{
    /**
     * このプラットフォームが所有するソフトウェア。（ Softwareモデルとの関係を定義）
     */
    public function softwares()
    {
        return $this->hasMany(Software::class);
    }
}
