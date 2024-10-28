<?php

namespace App\Models;

use App\Models\Trait\HasCommonFilter;
use App\Models\Trait\HasScopeOrder;
use App\Services\CommonFilter;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasCommonFilter, HasScopeOrder;

    protected $fillable = ['name'];

    protected array $filters = [
        'name' => CommonFilter::class,
    ];
}
