<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\MindMap;

class MindMapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        // echo 'test 123';
        $mindmaps = MindMap::all()->first();

        return view('mindmap.index')->with("mindmaps", $mindmaps);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

        $mySavedModel =  $request->mySavedModel;
        $mySavedModel = json_decode($mySavedModel, true);
        $nodeDataArray = $mySavedModel['nodeDataArray'];

        foreach ($nodeDataArray as $key => $value) {
          print_r($value);
          echo "</br>";
          $mindMap = new MindMap();
          $mindMap->key = $value['key'];
          $mindMap->parent = isset($value['parent'])?$value['parent']:null;
          $mindMap->text = $value['text'];
          $mindMap->brush = isset($value['brush'])?$value['brush']:null;
          $mindMap->dir = isset($value['dir'])?$value['dir']:null;
          $mindMap->loc = $value['loc'];
          $mindMap->save();

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
