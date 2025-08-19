<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::where('user_id', Auth::id())->get();
        return view('index', compact('todos'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Todo::create([
            'title' => $request->title,
            'completed' => false,
            'user_id' => Auth::id() ?? null,
        ]);

        return redirect()->route('todos.index')->with('success', 'Task berhasil ditambahkan!');
    }
    public function updateStatus($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->completed = !$todo->completed;
        $todo->save();

        return redirect()->route('todos.index')->with('success', 'Status task diperbarui!');
    }
    private function decryptId($id){
        try {
            return Crypt::decrypt($id);
        } catch (DecryptException $e) {
            abort(404);
        }
    }
    public function delete($id)
    {
        $todo = Todo::findOrFail($this->decryptId($id));
        $todo->delete();

        return redirect()->route('todos.index')->with('success', 'Task berhasil dihapus!');
    }
}
