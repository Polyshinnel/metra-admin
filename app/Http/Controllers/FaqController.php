<?php

namespace App\Http\Controllers;

use App\Models\AddMaterialContent;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $pageInfo = ['title' => 'FAQ'];
        $faqContent = AddMaterialContent::where(['category_id' => 5])->get();
        return view('faq.faq', ['pageInfo' => $pageInfo, 'faq' => $faqContent]);
    }
}
