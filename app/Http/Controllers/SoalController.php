<?php

namespace App\Http\Controllers;

use App\Http\Constants\MessageState;
use App\Materi;
use App\Soal;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

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
     * @param Materi $materi
     * @return Response
     */
    public function index(Materi $materi)
    {
        $materi->load([
            "soal" => function (HasMany $hasMany) {
                $hasMany->orderBy("urutan");
            },
            "soal.jawaban_benar",
        ]);

        return response()->view("soal.index", ['materi' => $materi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Materi $materi
     * @return Factory|Response|View
     */
    public function create(Materi $materi)
    {
        $nextUrutan = $materi->soal()
            ->selectRaw("MAX(urutan) AS next_urutan")
            ->value("next_urutan");

        return view("soal.create", ['materi' => $materi, 'nextUrutan' => $nextUrutan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Materi $materi
     * @return RedirectResponse|Response
     * @throws ValidationException
     */
    public function store(Request $request, Materi $materi)
    {
        $data = $this->validate($request, [
            "konten" => "required|string",
            "urutan" => "required|numeric|gte:1",
        ]);

        Soal::query()->create(array_merge($data, [
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
     * @param Soal $soal
     * @return Response
     */
    public function show(Soal $soal)
    {
        return response()
            ->view("soal.show", compact("soal"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Materi $materi
     * @param Soal $soal
     * @return Response
     */
    public function edit(Soal $soal)
    {
        return response()->view("soal.edit", ['soal' => $soal]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Materi $materi
     * @param Soal $soal
     * @return RedirectResponse|Response
     * @throws ValidationException
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
     * @return RedirectResponse
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
