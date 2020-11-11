<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Response;

class AdminFeedbackController extends Controller
{
    public function index()
    {
        return Response::view('admin.feedback.index', [
            'feedbacks' => Feedback::query()->paginate(10),
        ]);
    }

    public function edit($id)
    {
        $feedbacks = Feedback::query()->findOrFail($id);
        return Response::view('admin.feedback.edit', [
            'feedbacks' => $feedbacks,
        ]);
    }

    public function update(Request $request, $id)
    {
        $feedbacks = Feedback::query()->findOrFail($id);
        $feedbacks->update($request->except('_token'));
        return redirect()->route('feedback.index');
    }
}
