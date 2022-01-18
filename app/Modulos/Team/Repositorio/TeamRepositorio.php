<?php

namespace App\Modulos\Team\Repositorio;

use App\Models\Team;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class TeamRepositorio
{
    public function list()
    {
        $blog = Team::get();

        return datatables()->of($blog)
            ->addColumn('action', function ($row) {
                $route=Str::of($row->name)->slug('-');
                $row->url=route('team.show', "{$row->id}-{$route}");
                $row->url_destroy=route('team.destroy', [$row->id]);
                $type='team';
                return view()->make('admin.components.button_action',compact('row','type'));
            })
            ->addColumn('date', function ($row) {
                return $row->created_at->format('d-m-Y');
            })
            ->addColumn('hadquarter', function ($row) {
                return $row->headquarter->name;
            })
            ->addColumn('count_user', function ($row) {
                return $row->users->count();
            })
            ->toJson();
    }

    public function store($request)
    {
        $team   = new Team();
        $team->fill($request->all());
        if(blank($request->headquarter_id))
            $team->headquarter_id = Auth::user()->headquarter_id;

        if ($request->file('images'))
         $team->images =json_encode( saveImages($request,'teams'));

        if ($team->save())
            return $team;
    }
    public function update($request, Team $team)
    {
        $dataImages=[];
        $newDataImages=[];
        $team->images= json_decode($team->images);
        if (array_key_exists("MoreimgGaleryPre",$request->all())  && !empty($team->images)){

            $dataImages= deleteImages(json_decode($request->MoreimgGaleryPre),'teams',$team->images);
            if(blank($team->images))
                $team->images= array_merge($team->images,$dataImages);
            else
            $team->images=$dataImages;
        }

        if(array_key_exists("images",$request->all())){

            $newDataImages=saveImages('teams',$request);
            if(filled($team->images))
                $team->images= array_merge($team->images,$newDataImages);
            else
                $team->images=$newDataImages;

        }
        $team->fill($request->except('images'));

        if(!blank($request->images))
        $team->images=json_encode($team->images);


        return $team->save();
    }
    public function destroy(Team $team)
    {
        if(!empty($team->images))
            deleteImage('team',json_decode($team->images));

        return  $team->delete();
    }
    public function teamUser(Team $team,Array $ids){

        return $team->users()->sync($ids);
    }
}
