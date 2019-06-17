<?php

namespace App\Http\Controllers;

use App\AssetCategory;
use App\FaultCategory;
use App\Priority;

use Illuminate\Http\Request;
use Auth;

class CategoryController extends Controller
{
    /*public function __construct(){
        $this->middleware('auth');
    }*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $asset_categories = AssetCategory::with('parent', 'children')->where('hospital_id', $user->hospital_id)->get();
        $fault_categories = FaultCategory::where('hospital_id', $user->hospital_id)->get();
        $priority_categories = Priority::where('hospital_id', $user->hospital_id)->get();

        function filter_parents($item){
            return $item->children->count() > 0;
        }

        $parent_categories = $asset_categories->filter(function($item){
            return $item->parent_id == null;
        })->values();

        return view('categories', compact("asset_categories", "fault_categories", "priority_categories", "parent_categories"));
        //return response()->json($parent_categories, 200);
    }
}
