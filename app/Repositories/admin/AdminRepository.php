<?php 

namespace App\Repositories\admin;

class AdminRepository implements AdminRepositoryInterface
{
    public function get_data($model){

        return $model::paginate();
    }
}