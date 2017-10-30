<?php

namespace App\Http\Controllers\Admin;

use App\Forms\AccessForm;
use App\Models\RouteAccess;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $access =  RouteAccess::paginate();
        return view('admin.access.index',compact('access'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(AccessForm::class,[
            'url' => route('admin.access.store'),
            'method' => 'POST'
        ]);
        return view('admin.access.create',compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** @var UserForm $form */
        $form = \FormBuilder::create(AccessForm::class);
        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }
        $data = $form->getFieldValues();
        RouteAccess::create($data);
        $request->session()->flash('message', 'Route access cadastro com sucesso');
        return redirect()->route('admin.access.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(RouteAccess $access)
    {
        return view('admin.access.detalhes',compact('access'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(RouteAccess $access)
    {
        $form = \FormBuilder::create(AccessForm::class,[
            'url' => route('admin.access.update',['id' => $access->id]),
            'method' => 'PUT',
            'model' => $access
        ]);

        return view('admin.access.edit',compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
