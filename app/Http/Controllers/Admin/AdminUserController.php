<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InsertUserRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Response;
use Illuminate\Http\RedirectResponse;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response::view('admin.user.index', [
            'users' => User::query()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Response::view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(InsertUserRequest $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'is_admin' => (bool)$request->input('is_admin'),
        ]);
        \Session::flash('userStore', sprintf('Пользователь %s успешно создан', $user->name));

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        return Response::view('admin.user.edit', [
            'user' => User::query()->findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::query()->findOrFail($id);
        if (empty($request->is_admin)) {
            $user->update([
                'is_admin' => false,
            ]);
        }

        $user->update($request->except('_token'));

        \Session::flash('userStore', sprintf('Пользователь %s успешно изменен', $user->name));

        return redirect()->route('user.index');
    }

    public function password($id)
    {
        return Response::view('admin.user.password', [
            'user' => User::query()->findOrFail($id),
        ]);
    }

    public function passwordUpdate(UpdatePasswordRequest $request, $id)
    {
        $user = User::query()->findOrFail($id);
        if (Hash::check($request->input('old_password'), $user->password)) {
            $user->update([
                'password' => Hash::make($request->input('password')),
            ]);

            \Session::flash('userStore', sprintf('Пароль у пользователя %s успешно изменен', $user->name));

            return redirect()->route('user.index');
        }

        //\Session::flash('userStore', sprintf('Пароль у пользователя %s указан не верно', $user->name));
        //dd($request->all());
        return back()->withErrors(['Пароль у пользователя '. $user->name . ' указан не верно']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        User::destroy($id);
        return Response::json([
            'status' => true,
        ]);
    }
}
