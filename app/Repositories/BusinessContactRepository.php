<?php

namespace App\Repositories;

use App\Models\BusinessContact;
use App\Repositories\BaseRepository;

/**
 * Class BusinessContactRepository
 * @package App\Repositories
 * @version July 16, 2021, 6:15 pm -03
*/

class BusinessContactRepository extends BaseRepository
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
        return BusinessContact::class;
    }
}
