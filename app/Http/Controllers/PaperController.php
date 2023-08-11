<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    public function index()
    {
        $papers = Paper::where('status', 2)->latest('id')->paginate(8);

        return view('papers.index', compact('papers'));
    }
}
