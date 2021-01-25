<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUserFormRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->repository
                            ->orderBy('id', 'DESC')
                            ->paginate();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateUserFormRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        $this->repository->store($data);

        return redirect()
                ->route('users.index')
                ->withSuccess('Cadastro realizado com sucesso !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //if(!$user = $this->repository->where('id', $id)->first())
        if(!$user = $this->repository->findWhereFirst('id', $id))
            return redirect()->back();

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$user = $this->repository->findById($id))
            return redirect()->back();

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        if(!$this->repository->findById($id))
            return redirect()->back();

        $data = $request->all();

        if($data['password'])
            $data['password'] = bcrypt($data['password']);
        else 
            unset($data['password']);

        $this->repository->update($id, $data);

        return redirect()
                ->route('users.index')
                ->withSuccess('Cadastro atualizado com Sucesso !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$this->repository->findById($id))
            return redirect()->back();

        $this->repository->delete($id);

        return redirect()
                ->route('users.index')
                ->withSuccess('Cadastro deletado com Sucesso !');
    }

    public function search(Request $request)
    {
        $data   = $request->except('_token');

        $users  = $this->repository->search($request);

        return view('admin.users.index', compact('users', 'data'));
    }
}
