<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

use Response;
use Storage;

class FeedbackController extends Controller
{
    public function index(): \Illuminate\Http\Response
    {
        return Response::view('feedback');
    }

    public function store(Request $request): \Illuminate\Http\Response
    {
        Feedback::query()->create($request->except('_token'));
        return Response::view('feedback', ['status' => true]);
    }
}
