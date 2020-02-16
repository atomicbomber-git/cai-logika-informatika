<?php

namespace App\Http\Controllers;

use App\Materi;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $materis = Materi::get();

        return response()
            ->view("front_page", compact(
                "materis"
            ));
    }
}
