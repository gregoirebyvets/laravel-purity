<?php

namespace Abbasudo\Purity\Filters\Strategies;

use Abbasudo\Purity\Filters\Filter;
use Closure;

class EqualFilter extends Filter
{
    /**
     * Operator string to detect in the query params.
     *
     * @var string
     */
    protected static string $operator = '$eq';

    /**
     * Apply filter logic to $query.
     *
     * @return Closure
     */
    public function apply(): Closure
    {
        return function ($query) {
            foreach ($this->values as $value) {
                // Make the column and value case-insensitive using LOWER function
                $query->whereRaw('LOWER(' . $this->column . ') = ?', [strtolower($value)]);
            }
        };
    }
}
