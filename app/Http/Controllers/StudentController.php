<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = \App\Student::all();

        return view('estudantes', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nome' => 'required',
            'dre' => 'required|min:9|max:9|unique:students'
        ]);

        \App\Student::create($request->all());

        return back()->with(['success' => 'Estudante criado com sucesso.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $s = \App\Student::find($id);


        if($s->dre == $request->dre){
            $this->validate($request,[
                'nome' => 'required',
            ]);

            $s->update(['nome' => $request->nome]);

            return back()->with(['success' => 'Estudante editado com sucesso.' ]);
        }


        $this->validate($request,[
            'nome' => 'required',
            'dre' => 'required|min:9|max:9|unique:students'
        ]);

        $s->update($request->all());

        return back()->with(['success' => 'Estudante criado com sucesso.' ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\Student::destroy($id);

        return back();
    }
}
