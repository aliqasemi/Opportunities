<?php

namespace App\Models\Trait;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Modules\Common\Entities\Language;
use Modules\Common\Infrastructure\Services\Filter\CommonFilter;

trait HasCommonFilter
{
    public function scopeFilter(Builder $builder, Request $request): Builder
    {
        return CommonFilter::build($request, $this->filters, $this->mapFilter, self::$jsonFields)->filter($builder);
    }
}
