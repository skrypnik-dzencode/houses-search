<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class HouseFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    public function name($name)
    {
        return $this->where('name', 'LIKE', "%$name%");
    }

    public function bedrooms($bedrooms)
    {
        return $this->where('bedrooms', $bedrooms);
    }

    public function bathrooms($bathrooms)
    {
        return $this->where('bathrooms', $bathrooms);
    }

    public function storeys($storeys)
    {
        return $this->where('storeys', $storeys);
    }

    public function garages($garages)
    {
        return $this->where('garages', $garages);
    }

    public function priceFrom($priceFrom)
    {
        return $this->where('price', '>=', $priceFrom);
    }

    public function priceTo($priceTo)
    {
        return $this->where('price', '<=', $priceTo);
    }

}
