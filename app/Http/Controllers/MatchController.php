<?php

namespace App\Http\Controllers;


use App\Http\Requests\Match\CreateMatchRequest;
use App\Service\MatchService;

class MatchController extends Controller
{


    public function getCreate()
    {
        return view(
            'match.create'
        );
    }

    public function postCreate(
        CreateMatchRequest $request,
        MatchService $matchService
    )
    {
        $matchService->createMatch($request->all());

        return view(
            'welcome'
        );
    }
}
