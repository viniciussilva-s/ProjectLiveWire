<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categories extends Model
{
    use SoftDeletes ;

    protected $table = 'categories';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'created_by',
    ];

    public function tickets(): HasMany
    {
        return $this->hasMany(Tickets::class,'category_id');
    }
}
