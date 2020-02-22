<?php

namespace App\Http\Controllers;

use App\Http\Constants\MessageState;
use App\Materi;
use App\SubMateri;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class SubMateriController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Materi $materi
     * @return \Illuminate\Http\Response
     */
    public function index(Materi $materi)
    {
        $materi->load([
            "sub_materi" => function (HasMany $query) {
                $query
                    ->select(
                        "id",
                        "materi_id",
                        "judul",
                        "urutan"
                    )
                    ->orderBy("urutan");
            },
        ]);

        return response()->view("sub_materi.index", ['materi' => $materi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Materi $materi
     * @return \Illuminate\Http\Response
     */
    public function create(Materi $materi)
    {
        $nextUrutan = ($materi->sub_materi()
            ->selectRaw("MAX(urutan) AS max_urutan")
            ->value("max_urutan") ?? 0) + 1;

        return response()->view("sub_materi.create", ['materi' => $materi, 'nextUrutan' => $nextUrutan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Materi $materi
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, Materi $materi)
    {
        $data = $this->validate($request, [
            "judul" => "required|string",
            "konten" => "required|string",
            "urutan" => "required|numeric|gte:1",
        ]);

        $materi->sub_materi()->create($data);

        return response()
            ->redirectToRoute("materi.sub_materi.index", $materi)
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
     * @param \App\Materi $materi
     * @param \App\SubMateri $subMateri
     * @return \Illuminate\Http\Response
     */
    public function show(SubMateri $sub_materi)
    {
        return response()
            ->view("sub_materi.show", ['sub_materi' => $sub_materi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Materi $materi
     * @param \App\SubMateri $subMateri
     * @return \Illuminate\Http\Response
     */
    public function edit(SubMateri $sub_materi)
    {
        return response()->view("sub_materi.edit", ['sub_materi' => $sub_materi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Materi $materi
     * @param \App\SubMateri $subMateri
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, SubMateri $sub_materi)
    {
        $data = $this->validate($request, [
            "judul" => "required|string",
            "konten" => "required|string",
        ]);

        $sub_materi->update($data);

        return redirect()
            ->route("sub_materi.edit", $sub_materi)
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
     * @param \App\Materi $materi
     * @param \App\SubMateri $subMateri
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(SubMateri $sub_materi)
    {
        $sub_materi->delete();
        return response()->redirectToRoute("materi.sub_materi.index", $sub_materi->materi_id)
            ->with("messages", [
                [
                    "state" => MessageState::STATE_SUCCESS,
                    "content" => __("messages.delete.success"),
                ]
            ]);
    }
}
