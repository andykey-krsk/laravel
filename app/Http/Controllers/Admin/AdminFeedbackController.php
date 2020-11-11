<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Response;

class AdminFeedbackController extends Controller
{
    public function index()
    {
        return Response::view('admin.feedback.index',[
            'feedbacks' => Feedback::query()->paginate(10),
        ]);
    }
}
