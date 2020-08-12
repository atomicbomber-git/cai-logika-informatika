<?php

namespace App\Http\Controllers;

use App\Http\Constants\MessageState;
use App\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MateriController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $materis = Materi::query()
            ->select([
                "id",
                "judul",
                "deskripsi",
                "urutan",
            ])
            ->orderBy("urutan")
            ->get();

        return view("materi.index", ['materis' => $materis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view("materi.create", [
            "materi" => new Materi,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            "judul" => "required|max:255",
            "deskripsi" => "required|string",
            "urutan" => ["required", "numeric", "gte:1"],
        ]);

        Materi::create($data);

        return redirect()
            ->route("materi.index")
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
     * @param \App\Materi $materi
     * @return \Illuminate\Http\Response
     */
    public function show(Materi $materi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Materi $materi
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Materi $materi)
    {
        return view("materi.edit", ['materi' => $materi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Materi $materi
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Materi $materi)
    {
        $data = $this->validate($request, [
            "judul" => "required|unique:" . (new Materi)->getTable() . ",judul,{$materi->id}",
            "deskripsi" => "required|string",
            "urutan" => ["required", "numeric", "gte:1"],
        ]);

        $materi->update($data);

        return redirect()
            ->route("materi.edit", $materi->id)
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
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Materi $materi)
    {
        $materi->delete();

        return redirect()
            ->route("materi.index")
            ->with("messages", [
                [
                    "state" => MessageState::STATE_SUCCESS,
                    "content" => __("messages.delete.success")
                ]
            ]);
    }
}
