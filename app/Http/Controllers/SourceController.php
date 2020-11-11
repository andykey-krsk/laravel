<?php

namespace App\Http\Controllers;

class SourceController extends Controller
{
    public function source()
    {
        $sources = \DB::table('sources')->select('*')->get();

        return view('source', compact('sources'));
    }
}
