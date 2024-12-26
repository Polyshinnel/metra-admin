<?php

namespace App\Http\Controllers;

use App\Models\AddMaterialContent;
use Illuminate\Http\Request;

class SertificatesController extends Controller
{
    public function index()
    {
        $pageInfo = ['title' => 'Сертификаты'];
        $certificates = AddMaterialContent::where(['category_id' => 4])->get();
        return view('sertificates.sertificates', ['pageInfo' => $pageInfo, 'certificates' => $certificates]);
    }
}
