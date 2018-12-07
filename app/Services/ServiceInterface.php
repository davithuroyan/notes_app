<?php
/**
 * Created by PhpStorm.
 * User: davit
 * Date: 07-Dec-18
 * Time: 2:46 PM
 */

namespace App\Services;


use App\Repositories\RepositoryInterface;

interface ServiceInterface
{
    public function __construct(RepositoryInterface $repository);
}