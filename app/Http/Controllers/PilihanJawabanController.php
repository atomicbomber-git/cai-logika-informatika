<?php

namespace App\Http\Controllers;

use App\Http\Constants\MessageState;
use App\PilihanJawaban;
use App\Soal;
use Illuminate\Http\Request;

class PilihanJawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function index(Soal $soal)
    {
        $soal->load([
            "pilihan_jawaban",
            "jawaban_benar",
        ]);

        return response()
            ->view("pilihan_jawaban.index", compact(
                "soal"
            ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function create(Soal $soal)
    {
        return response()->view("pilihan_jawaban.create", compact(
            "soal"
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Soal $soal
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, Soal $soal)
    {
        $data = $this->validate($request, [
            "konten" => "required|string",
        ]);

        PilihanJawaban::create(array_merge($data, [
            "soal_id" => $soal->id,
        ]));

        return redirect()
            ->route("soal.pilihan_jawaban.index", $soal)
            ->with("messages", [
                [
                    "state" => MessageState::STATE_SUCCESS,
                    "content" => __("messages.create.success")
                ]
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Soal  $soal
     * @param  \App\PilihanJawaban  $pilihanJawaban
     * @return \Illuminate\Http\Response
     */
    public function show(Soal $soal, PilihanJawaban $pilihanJawaban)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PilihanJawaban $pilihan_jawaban
     * @return \Illuminate\Http\Response|void
     */
    public function edit(PilihanJawaban $pilihan_jawaban)
    {
        return response()
            ->view("pilihan_jawaban.edit", compact("pilihan_jawaban"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Soal $soal
     * @param \App\PilihanJawaban $pilihanJawaban
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, PilihanJawaban $pilihan_jawaban)
    {
        $data = $this->validate($request, [
            "konten" => "required|string",
        ]);

        $pilihan_jawaban->update($data);

        return redirect()
            ->route("pilihan_jawaban.edit", $pilihan_jawaban)
            ->with("messages", [
                [
                    "state" => MessageState::STATE_SUCCESS,
                    "content" => __("messages.update.success")
                ]
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PilihanJawaban $pilihan_jawaban
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(PilihanJawaban $pilihan_jawaban)
    {
        $soal_id = $pilihan_jawaban->soal_id;
        $pilihan_jawaban->forceDelete();

        return redirect()
            ->route("soal.pilihan_jawaban.index", $soal_id)
            ->with("messages", [
                [
                    "state" => MessageState::STATE_SUCCESS,
                    "content" => __("messages.delete.success")
                ]
            ]);
    }
}
