<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name'   => 'required|string|max:100',
            'last_name'    => 'required|string|max:100',
            'age'          => 'nullable|integer|min:10|max:70',
            'nationality'  => 'nullable|string|max:150',
            'weight_class' => 'nullable|string|max:100',
            'experience'   => 'nullable|string|max:2000',
        ]);

        Application::create($data);

        return back()->with(
            'success',
            'Your application has been submitted. Our team will contact you soon.'
        );
    }
}
