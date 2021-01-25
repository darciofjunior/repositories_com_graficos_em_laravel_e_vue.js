<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\User;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class EloquentUserRepository extends BaseEloquentRepository implements UserRepositoryInterface
{
    public function entity()
    {
        return User::class;
    }

    public function search(Request $request)
    {
        return $this->entity
                        ->where('name', 'LIKE', "%{$request->name}%")
                        ->where('email', 'LIKE', "%{$request->email}%")
                        ->paginate(3);
    }
}
