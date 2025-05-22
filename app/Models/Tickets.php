<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tickets extends Model
{
        use SoftDeletes ;

    protected $table = 'tickets';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'title',
        'description',
        'status',
        'category_id',
    ];

    public function category(): HasOne
    {
        return $this->hasOne(Categories::class,'id','category_id');
    }
}
