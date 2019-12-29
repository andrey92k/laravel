<?php

namespace App\Repositories;

use App\Models\Staff as Model;
//use Your Model

/**
 * Class StaffRepository.
 */
class StaffRepository extends CoreRepository
{
    /**
     * @return string
     *  Return the model
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @return mixed
     */
    public function getAllWithStaff($request)
    {
        if(!empty($request->query('count_staff'))){
            $count_staff = $request->query('count_staff');
        }else{
            $count_staff = 10;
        }
       
        return $this->startConditions()->with('department')->paginate($count_staff);
    }

    /**
     * @param $departmentSlug
     * @return mixed
     */
    public function getWithDepartment($departmentSlug, $request)
    {

        if(!empty($request->query('count_staff'))){
            $count_staff = $request->query('count_staff');
        }else{
            $count_staff = 10;
        }

        return $this->startConditions()->whereHas('department', function($query) use ($departmentSlug) {
            $query->where('slug', $departmentSlug);
        })->with('department')->paginate($count_staff);
    }

    public function createOrUpdate(array $staff)
    {
        return $this->startConditions()->updateOrCreate(
            ['full_name' => $staff['full_name']],
            collect($staff)->only('dob', 'department_id', 'position', 'rate', 'clock', 'payment')->toArray()
        );
    }
}
