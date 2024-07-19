<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\User;
use App\Http\Requests\StoreAccountRequest;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::all();
        return view('admin.accounts.index', compact('accounts'));
    }

    public function create()
    {
        return view('admin.accounts.create');
    }

    public function store(StoreAccountRequest $request)
    {
        $validated = $request->validated();
        foreach ($validated['accounts'] as $accountData) {
            Account::create($accountData);
        }
        return redirect()->route('admin.accounts.index')->with('success', 'Accounts created successfully.');
    }

    public function show($id)
    {
        $account = Account::with('transactions')->findOrFail($id);
        return view('admin.accounts.show', compact('account'));
    }
}
