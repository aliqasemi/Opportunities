<?php

namespace App\Models\Trait;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Modules\Common\Entities\Language;

trait HasScopeOrder
{
    public function scopeSetOrder(Builder $builder): Builder
    {
        $model = $builder->getModel();

        if (!is_null(request('key_sort'))) {
            $sort = request('key_sort');
            $order = strtoupper(request('key_order')) === 'DESC' ? 'DESC' : 'ASC';

            return $builder->orderBy($sort, $order);
        } else {
            return $builder;
        }
    }
}
