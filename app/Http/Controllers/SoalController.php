<?php

namespace App\Http\Controllers;

use App\Http\Constants\MessageState;
use App\Materi;
use App\Soal;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

/**
 * Class SoalController
 * @package App\Http\Controllers
 */
class SoalController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function index(Materi $materi)
    {
        $materi->load([
            "soal" => function (HasMany $hasMany) {
                $hasMany->orderBy("urutan");
            },
            "soal.jawaban_benar",
        ]);

        return response()->view("soal.index", compact(
            "materi"
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Materi  $materi
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create(Materi $materi)
    {
        $nextUrutan = $materi->soal()
            ->selectRaw("MAX(urutan) AS next_urutan")
            ->value("next_urutan");

        return view("soal.create", compact(
            "materi",
            "nextUrutan"
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Materi $materi
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, Materi $materi)
    {
        $data = $this->validate($request, [
            "konten" => "required|string",
            "urutan" => "required|numeric|gte:1",
        ]);

        Soal::create(array_merge($data, [
            "materi_id" => $materi->id,
        ]));

        return redirect()
            ->route("materi.soal.index", $materi)
            ->with("messages", [
                [
                    "state" => MessageState::STATE_SUCCESS,
                    "content" => __("messages.create.success"),
                ]
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Materi  $materi
     * @param  \App\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function show(Materi $materi, Soal $soal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Materi  $materi
     * @param  \App\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function edit(Soal $soal)
    {
        return response()->view("soal.edit", compact(
            "soal"
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Materi $materi
     * @param \App\Soal $soal
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Soal $soal)
    {
        $data = $this->validate($request, [
            "konten" => "required|string",
        ]);

        $soal->update($data);

        return redirect()
            ->route("soal.edit", $soal)
            ->with("messages", [
                [
                    "state" => MessageState::STATE_SUCCESS,
                    "content" => __("messages.update.success")
                ]
            ]);
    }


    /**
     * @param Soal $soal
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Soal $soal)
    {
        $materi_id = $soal->materi_id;
        $soal->forceDelete();

        return redirect()
            ->route("materi.soal.index", $materi_id)
            ->with("messages", [
                [
                    "state" => MessageState::STATE_SUCCESS,
                    "content" => __("messages.delete.success")
                ]
            ]);
    }
}
