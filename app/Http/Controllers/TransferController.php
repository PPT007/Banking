<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TransferController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'recipient_account_number' => 'required|exists:accounts,account_number',
            'amount' => 'required|numeric|min:0.01',
        ]);

        $senderName = Auth::user()->name;
        $recipientAccount = Account::where('account_number', $request->recipient_account_number)->first();
        $recipientAccount->balance += $request->amount;
        $recipientAccount->save();

        Transaction::create([
            'account_id' => $recipientAccount->id,
            'type' => 'credit',
            'amount' => $request->amount,
            'description' => 'Transfer from account ' . $senderName,
        ]);

        return back()->with('status', 'Transfer successful.');
    }
}

