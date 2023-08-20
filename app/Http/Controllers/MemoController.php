<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;
use Auth;

class MemoController extends Controller
{
    public function index()
    {
        $memos = Auth::user()->memos()->active()->orderBy('created_at', 'asc')->get();
        return view('memo.index', compact('memos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|max:99',
        ],[
            'content.required' => '何か入力してください',
            'content.max' => ':max文字以内で入力してください',
        ]);

        $memo = new Memo();
        $memo->content = $request->content;
        $memo->user_id = Auth::id();
        $memo->save();

        return redirect('/index');
    }

    public function edit(Memo $memo)
    {
        if (Auth::id() !== $memo->user_id) {
            return redirect('/')->withErrors(['unauthorized' => 'Unauthorized action.']);
        }

        return view('memo.edit', compact('memo'));
    }

    public function update(Request $request, Memo $memo)
    {
        if (Auth::id() !== $memo->user_id) {
            return redirect('/')->withErrors(['unauthorized' => 'Unauthorized action.']);
        }

        $request->validate([
            'content' => 'required|max:99'
        ],[
            'content.required' => '何か入力してください',
            'content.max' => ':max文字以内で入力してください',
        ]);

        $memo->content = $request->content;
        $memo->save();

        return redirect('/');
    }

    public function destroy(Memo $memo)
    {
        $memo->is_deleted = true;
        $memo->save();

        return redirect('/');
    }

}
