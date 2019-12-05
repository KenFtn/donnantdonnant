<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Category;
use App\Models\User;
use App\Models\AdUser;
use Auth;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category = Category::with('ads.user')->where('id', $request->cat)->first();
        $ads = $category->ads->where('type', $request->type)->sortByDesc('ad.created_at');
        $mainCat = Category::all()->where('category_id', NULL);
        $subCat = Category::all()->where('category_id', !NULL);
        return view('annonces.index', compact('ads', 'mainCat', 'subCat', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type=NULL)
    {
        return view('annonces.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ad::create([
            'city_id' => $request->city_id,
            'type' => $request->type,
            'author_id' => Auth::user()->id,
            'status' => '0',
            'price' => $request->price,
            'title' => $request->title,
            'desc' => $request->desc,
            'slug' => Str::slug($request->title .' ' . Auth::user()->id, '-'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = Ad::findOrFail($id);
        return view('annonces.show', compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Ad::where('id', $request->id)->delete();
    }


    public function search(Request $request)
    {
        $categories = Category::with('ads.user')->where('id', $request->cat)->first();
        if($request->nbr == '4'){
            $ads = $categories->ads->where('type', 'search')->sortByDesc('ad.created_at')->take(4);
        }else{
            $ads = $categories->ads->where('type', 'search')->sortByDesc('ad.created_at');
        }
        return response($ads);
    }

    public function offer(Request $request)
    {
        $categories = Category::with('ads.user')->where('id', $request->cat)->first();
        $ads = [];
        if($request->nbr == '4'){
            $ads = $categories->ads->where('type', 'woffer')->sortByDesc('ad.created_at')->take(4);
        }else{
            $ads = $categories->ads->where('type', 'woffer')->sortByDesc('ad.created_at');
        }
        return response()->json($ads);
    }

    public function responseAd(Request $request)
    {
        AdUser::create([
            'ad_id' => $request->ad_id,
            'user_id' => $request->user_id,
        ]);
        return response()->json('sucess');
    }

    /** Fonction de debug ajax */
    public function deb(Request $request)
    {

    }
}
