<?php

namespace App\Models\Trait;

use App\Services\CommonFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait HasCommonFilter
{
    public function scopeFilter(Builder $builder): Builder
    {
        return CommonFilter::build(request(), $this->filters)->filter($builder);
    }
}
