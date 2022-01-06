<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Modulos\Team\Interfaces\TeamInterface;

class TeamController extends ApiController
{

    protected $teamInterface;

    public function __construct(TeamInterface $teamInterface)
    {
        $this->teamInterface = $teamInterface;
    }

    public function list()
    {

        $datos =$this->teamInterface->list();
        return  $datos;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Team.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos =$this->teamInterface->store($request);
        return  $datos['success']
        ? $this->successResponse([ 'data' =>$datos['data']], $datos['code'])
        : $this->errorResponse($datos['data']['message'], $datos['code']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {

        if(filled($team->images)){
            $images =json_decode($team->images);
            $route = asset('storage/img/team').'/'. Auth::id();
            $team->elementImage .=view()
                                ->make('admin.components.images_element')
                                ->with('images',$images)
                                ->with('route',$route);
        }
        return $this->showOne($team,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $datos =$this->teamInterface->update($request,$team);
        return  $datos['success']
        ? $this->successResponse($datos['data'], $datos['code'])
        : $this->errorResponse($datos['data']['message'], $datos['code']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $datos =$this->teamInterface->destroy($team);
        return  $datos['success']
        ? $this->successResponse($datos['data'], $datos['code'])
        : $this->errorResponse($datos['data']['message'], $datos['code']);
    }
}
