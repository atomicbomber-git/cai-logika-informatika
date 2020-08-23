<?php

namespace App\Http\Controllers;

use App\Http\Constants\MessageState;
use App\Informasi;
use App\Support\SessionHelper;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    private $responseFactory;

    public function __construct(ResponseFactory $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function show(Informasi $informasi)
    {
        return $this->responseFactory->view(strtolower($informasi->id) . ".show", compact("informasi"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Informasi $informasi)
    {
        return $this->responseFactory->view("informasi.edit", [
            "informasi" => $informasi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Informasi  $informasi
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Informasi $informasi)
    {
        $data = $request->validate([
            "konten" => ["required", "string"]
        ]);

        $informasi->update($data);

        SessionHelper::flashMessage(
            __("messages.update.success"),
            MessageState::STATE_SUCCESS,
        );

        return $this->responseFactory
            ->redirectToRoute("informasi.edit", $informasi);
    }
}
