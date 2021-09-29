<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    /**
     * このソフトウェアを所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * このソフトウェアの開発元。（ Developerモデルとの関係を定義）
     */
    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }
    
    /**
     * このソフトウェアの販売元。（ Distributorモデルとの関係を定義）
     */
    public function distributor()
    {
        return $this->belongsTo(Distributor::class);
    }
    
    /**
     * このソフトウェアのプラットフォーム。（ Platformモデルとの関係を定義）
     */
    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }
}
