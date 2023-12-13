<?php

namespace App\Http\Controllers;

use App\Models\Repository;
use Illuminate\Http\Request;

class RepositoryController extends Controller
{
    public function index()
    {
        $repositories = Repository::all();
        $data = [
            'repositories' => $repositories
        ];
        return view('repository.index', $data);
    }
}
