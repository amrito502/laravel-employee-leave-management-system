<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        return view('pages.employee.index');
    }

    public function show($id){}
    public function store(Request $request){}
    public function edit($id){}
    public function update(Request $request, $id){}
    public function delete($id){}
}
