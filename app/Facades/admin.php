<?php 

namespace App\Facades;

use App\Repositories\admin\AdminRepositoryInterface;
use Illuminate\Support\Facades\Facade;


class admin extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return AdminRepositoryInterface::class;
    }
}