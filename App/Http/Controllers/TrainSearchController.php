<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Train;


class TrainSearchController extends Controller
{


	/**
     * Get the index name for the model.
     *
     * @return string
    */
    public function index(Request $request)
    {
        if($request->has('titlesearch')){
            $trains = Train::search($request->titlesearch)
                ->paginate(6);
        }else{
            $trains = Train::paginate(6);
        }
        return view('train-search',compact('trains'));
    }


    /**
     * Get the index name for the model.
     *
     * @return string
    */
    public function create(Request $request)
    {
        $this->validate($request,['title'=>'required']);


        $trains = Train::create($request->all());
        return back();
    }
}