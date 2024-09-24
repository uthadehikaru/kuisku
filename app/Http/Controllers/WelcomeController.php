<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data['quizzes'] = Quiz::public()->latest()->take(4)->get();
        return view('welcome', $data);
    }
}
