<?php

namespace App\Models\Trait;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Modules\Common\Entities\Language;

trait HasScopeOrder
{
    public function scopeSetOrder(Builder $builder, Request $request): Builder
    {
        $model = $builder->getModel();

        if (!is_null(request('key_sort'))) {
            $sort = request('key_sort');
            $order = strtoupper(request('key_order')) === 'DESC' ? 'DESC' : 'ASC';

            if (!is_null(request('key_lang')) && in_array($sort, $model::$jsonFields)) {
                $languageCode = Language::$languageCodes[request('key_lang')];
                return $builder->orderByRaw("JSON_UNQUOTE(JSON_EXTRACT($sort, '$.$languageCode')) $order");
            } else {
                return $builder->orderBy($sort, $order);
            }
        } else {
            return $builder;
        }
    }
}
