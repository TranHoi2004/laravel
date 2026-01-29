<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgeController extends Controller
{
    public function showForm()
    {
        return view('age');
    }

    public function store(Request $request)
    {
        $request->validate([
            'age' => 'required|integer|min:1',
        ]);

        $request->session()->put('age', $request->age);

        return redirect('/dashboard');
    }
}
