<?php

namespace App\Http\Controllers;

use App\Http\Resources\V1\Catalogue\CatalogueCollection;
use App\Models\Catalogue;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    public function getGender()
    {
        $catalogues= Catalogue::where('type','CARRER')->get();
        \Log::info($catalogues);
        return (new CatalogueCollection($catalogues))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }
        public function getCategory()
        {
            $catalogues= Catalogue::where('type','CATEGORY')->get();
            return (new CatalogueCollection($catalogues))->additional([
                'msg'=>[
                    'summary' => 'success',
                    'detail' => '',
                    'code' => '200'
                ]
            ])->response()->setStatusCode(200);
        }
        public function getColor()
    {
        $catalogues= Catalogue::where('type','COLOR')->get();
        return (new CatalogueCollection($catalogues))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    public function getSize()
    {
        $catalogues= Catalogue::where('type','SIZE')->get();
        return (new CatalogueCollection($catalogues))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }
}
