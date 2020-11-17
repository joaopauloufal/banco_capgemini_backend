<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\UserRepositoryEloquent;
use App\Traits\CrudApiTrait;

class UserController extends Controller
{
    use CrudApiTrait;

    protected $repository;

    public function __construct(UserRepositoryEloquent $repository)
    {
        $this->repository = $repository;
    }

    public function store(UserRequest $request)
    {
        $data = $request->all();
        $result = $this->repository->create([
            'email' => $data['email'],
            'password' => bcrypt($request->password),
            'name' => $data['name']
        ]);

        if ($request->roles){
            $roles = json_decode($request->roles);
            $result->syncRoles(array_column($roles, 'name'));
        } else {
            $result->syncRoles([]);
        }

        return response()->json($result);
    }

    public function update(UserRequest $request, $id)
    {
        $data = $request->all();
        $result = $this->repository->find($id);


        if ($request->roles){
            $roles = json_decode($request->roles);
            $result->syncRoles(array_column($roles, 'name'));
        } else {
            $result->syncRoles([]);
        }

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $result->name = $data['name'];
        $result->email = $data['email'];

        $result->save();

        $result = $this->repository->find($id);

        return response()->json($result);
    }

    public function destroy($id)
    {
      $result = $this->repository->find($id);
      $result->roles()->detach();
      $result->delete();
      return response()->json($result);
    }

}
