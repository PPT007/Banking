<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'recipient_account_number' => 'required|exists:accounts,account_number',
            'amount' => 'required|numeric|min:0.01',
        ]);

        $senderAccount = auth()->user()->account;
        $recipientAccount = Account::where('account_number', $request->recipient_account_number)->first();

        if ($senderAccount->balance < $request->amount) {
            return back()->withErrors(['amount' => 'Insufficient balance.']);
        }

        $senderAccount->balance -= $request->amount;
        $recipientAccount->balance += $request->amount;

        $senderAccount->save();
        $recipientAccount->save();

        Transaction::create([
            'account_id' => $senderAccount->id,
            'type' => 'debit',
            'amount' => $request->amount,
            'description' => 'Transfer to account ' . $recipientAccount->account_number,
        ]);

        Transaction::create([
            'account_id' => $recipientAccount->id,
            'type' => 'credit',
            'amount' => $request->amount,
            'description' => 'Transfer from account ' . $senderAccount->account_number,
        ]);

        return back()->with('status', 'Transfer successful.');
    }
}

