<?php

namespace App\Repositories;

use App\Plan;
use App\Repositories\BaseRepository;

/**
 * Class PlanRepository
 * @package App\Repositories
 * @version June 6, 2021, 11:17 pm -03
*/

class PlanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [

    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Plan::class;
    }
}
