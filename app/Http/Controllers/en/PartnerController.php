<?php
/**
 * Created by PhpStorm.
 * User: Броненосец
 * Date: 17.12.2018
 * Time: 11:55
 */

namespace App\Http\Controllers\en;


use App\en\Partner;

class PartnerController
{
    public function index()
    {
        return view('partners.index', ['partners' => Partner::all()]);
    }

}