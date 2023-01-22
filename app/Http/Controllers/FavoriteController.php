<?php

namespace App\Http\Controllers;

use App\Http\Resources\V1\Favorite\FavoriteCollection;
use App\Http\Resources\V1\Favorite\FavoriteResource;
use App\Models\Favorite;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index(){
        $user = Auth::user()->getAuthIdentifier();
        $favorites = Favorite::where('user_id', $user)->get();
        return(new FavoriteCollection($favorites))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => 'success',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    public function store(Request $request){
        $user = Auth::user()->getAuthIdentifier();
        $favorite = new Favorite();
        $favorite->user()->associate(User::find($user));
        $favorite->product()->associate(Product::find($request->input('product')));
        $favorite->save();

        return(new FavoriteResource($favorite))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => 'Agregado al carrito',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    public function destroy(Favorite $favorite){
        $favorite->delete();
        return (new FavoriteResource($favorite))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => 'Eliminado de favoritos',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }
}
