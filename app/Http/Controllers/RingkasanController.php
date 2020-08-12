<?php

namespace App\Http\Controllers;

use App\Http\Constants\MessageState;
use App\Informasi;
use Illuminate\Http\Request;

class RingkasanController extends Controller
{
    public function show()
    {
        return view("ringkasan.show", [
            "ringkasan" => Informasi::query()
                ->findOrFail(Informasi::RINGKASAN)
        ]);
    }

    public function edit()
    {
        return view("ringkasan.edit", [
            "ringkasan" => Informasi::query()
                ->findOrFail(Informasi::RINGKASAN)
        ]);
    }

    public function update(Request $request)
    {
        $ringkasan = Informasi::query()
            ->findOrFail(Informasi::RINGKASAN);

        $data = $request->validate([
            "konten" => ["required", "string"]
        ]);

        $ringkasan->update($data);

        return redirect()
            ->back()
            ->with("messages", [
                [
                    "state" => MessageState::STATE_SUCCESS,
                    "content" => __("messages.update.success")
                ]
            ]);
    }
}
