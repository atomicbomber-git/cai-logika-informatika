<?php

namespace App\Http\Controllers;

use App\Http\Constants\MessageState;
use App\Materi;
use App\SubMateri;
use Illuminate\Http\Request;

class SubMateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Materi $materi
     * @return \Illuminate\Http\Response
     */
    public function index(Materi $materi)
    {
        return response()->view("sub_materi.index", compact(
            "materi"
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Materi $materi
     * @return \Illuminate\Http\Response
     */
    public function create(Materi $materi)
    {
        return response()->view("sub_materi.create", compact(
            "materi"
        ));
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
            ->view("sub_materi.show", compact("sub_materi"));
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
        return response()->view("sub_materi.edit", compact("sub_materi"));
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
