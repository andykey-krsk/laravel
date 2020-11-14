<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpsertFeedbackRequest;
use App\Models\Feedback;

use Response;

class FeedbackController extends Controller
{
    public function index(): \Illuminate\Http\Response
    {
        return Response::view('feedback');
    }

    public function store(UpsertFeedbackRequest $request)
    {
        Feedback::query()->create($request->except('_token'));
        return Response::view('feedback', ['status' => true]);
    }
}
