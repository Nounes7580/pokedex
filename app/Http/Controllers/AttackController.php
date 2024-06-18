<?php
namespace App\Http\Controllers;

use App\Models\Attack;
use Illuminate\Http\Request;

class AttackController extends Controller
{
    public function index()
    {
        $attacks = Attack::with('type')->get();
        return view('attacks.index', compact('attacks'));
    }

    public function show($id)
    {
        $attack = Attack::with('type')->findOrFail($id);
        return view('attacks.show', compact('attack'));
    }
}

