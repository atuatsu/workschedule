<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


class Board extends Model
{
    use SoftDeletes;
    public function getByLimit(int $limit_count = 10)
    {
        return $this::with('user')->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    
    protected $fillable = [
        'user_id',
        'body',
        'position',
        ];
        
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
