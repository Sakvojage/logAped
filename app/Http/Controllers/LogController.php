<?php

namespace App\Http\Controllers;

use App\Http\Resources\LogResource;
use App\Log;
use http\Env\Response;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Throwable;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Log $log
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Log $log)
    {
        return LogResource::collection($log->all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Log $log
     * @return ResponseFactory|\Illuminate\Http\Response
     * @throws Throwable
     */
    public function store(Request $request, Log $log)
    {
        $log->data = $request->input('bag.number');

        if ($log->save()) {
            return response()->json(["Status" => "Logged", "Data" => $log->data], 202);
        };
        return response()->json(["Status" => "Failed to log"], 400);

    }

    /**
     * Display the specified resource.
     *
     * @param Log $log
     * @return LogResource
     */
    public function show(Log $log)
    {
        return new LogResource($log);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Log $log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Log $log)
    {
        return response()->json(["Status" => "Log cannot be updated"], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Log $log
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Log $log)
    {
        if ($log->delete()) {
            return response()->json(["Status" => "Log deleted"], 200);
        }

        return response()->json(["Status" => "Failed to delete"], 400);
    }
}
