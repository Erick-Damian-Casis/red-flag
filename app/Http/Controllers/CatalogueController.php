<?php

namespace App\Http\Controllers;

use App\Http\Resources\V1\Catalogue\CatalogueCollection;
use App\Models\Catalogue;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    public function index()
    {
        $catalogues= Catalogue::find();
        return (new CatalogueCollection($catalogues))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }
}
