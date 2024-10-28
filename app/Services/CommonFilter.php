<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CommonFilter extends AbstractFilter
{

    public static function build(Request $request, array $filters, $mapFilter = null, $jsonFields = null): CommonFilter
    {
        return new CommonFilter($request, $filters, $mapFilter, $jsonFields);
    }

    protected static function filterElement(Builder $builder, $filter, $value, $isOr, $jsonFields = null): Builder
    {
        $tableName = $builder->getModel()->getTable();
        if ($isOr) {
            if (Str::endsWith($filter, "id")) {
                return $builder->orWhereRaw("LOWER($tableName" . ".$filter) = ?", [strtolower($value)]);
            } else {
                return $builder->orWhereRaw("LOWER($tableName" . ".$filter) LIKE ?", ["%" . strtolower($value) . "%"]);
            }
        } else {
            if (Str::endsWith($filter, "id")) {
                return $builder->whereRaw("LOWER($tableName" . ".$filter) = ?", [strtolower($value)]);
            } else {
                return $builder->whereRaw("LOWER($tableName" . ".$filter) LIKE ?", ["%" . strtolower($value) . "%"]);
            }
        }
    }

    protected static function filterRelationElement(Builder $builder, $filter, $value, $relation, $isOr, $jsonFields = null): Builder
    {
        if ($isOr) {
            return $builder->orWhereHas($relation, function ($query) use ($filter, $value) {
                if (Str::endsWith($filter, "id")) {
                    return $query->whereRaw("LOWER($filter) = ?", [strtolower($value)]);
                } else {
                    return $query->whereRaw("LOWER($filter) LIKE ?", ["%" . strtolower($value) . "%"]);
                }
            });
        } else {
            return $builder->whereHas($relation, function ($query) use ($filter, $value) {
                if (Str::endsWith($filter, "id")) {
                    return $query->whereRaw("LOWER($filter) = ?", [strtolower($value)]);
                } else {
                    return $query->whereRaw("LOWER($filter) LIKE ?", ["%" . strtolower($value) . "%"]);
                }
            });
        }
    }
}
