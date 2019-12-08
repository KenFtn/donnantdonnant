<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Ad_Category;
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
        $mainCats = Category::all()->where('category_id', NULL);
        $subCats = Category::all()->where('category_id', !NULL);
        return view('annonces.index', compact('ads', 'mainCats', 'subCats', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type=NULL)
    {
        $mainCats = Category::all()->where('category_id', NULL);
        $subCats = Category::all()->where('category_id', !NULL);
        return view('annonces.create', compact(['type', 'mainCats', 'subCats']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subCat = Category::all()->where('name', $request->cat)->first();
        $mainCat = Category::whereId($subCat->category_id)->first();

        $ad = Ad::create([
            'city_id' => $request->city_id,
            'type' => $request->type,
            'author_id' => Auth::user()->id,
            'status' => '0',
            'price' => $request->price,
            'title' => $request->title,
            'desc' => $request->desc,
            'slug' => Str::slug($request->title .' '. Auth::user()->id, '-'),
        ]);
        
        Ad_Category::create([
            'category_id' => $subCat->id,
            'ad_id' => $ad->id,
        ]);

        Ad_Category::create([
            'category_id' => $mainCat->id,
            'ad_id' => $ad->id,
        ]);


        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
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
    public function destroy(Ad $ad)
    {
        $to_deletes = Ad_Category::all()->where('ad_id', $ad->id);
        foreach($to_deletes as $to_delete){
            $to_delete->delete();
        }
        $delete_reponse = AdUser::all()->where('ad_id', $ad->id);
        foreach($delete_reponse as $delete){
            $delete->delete();
        }
        $ad->delete();
        return back();
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
        return response()->json(['success']);
    }

    public function paiement(Request $request)
    {
        
    }
    /** Fonction de debug ajax */
    public function deb(Request $request)
    {

    }
}
