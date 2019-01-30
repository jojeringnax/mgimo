<?php
/**
 * Created by PhpStorm.
 * User: Броненосец
 * Date: 08.12.2018
 * Time: 13:32
 */

namespace App\Http\Controllers;


use App\Smi;

class SmiController extends Controller
{

    public function index()
    {
        return view('smis.index', [
            'smis' => Smi::limit(12)->orderBy('created_at', 'desc')->get(),
            'smisNumber' => Smi::all()->count()
        ]);
    }

    public function add_smis($data)
    {
        return Smi::limit(12)->offset($data)->get()->toArray();
    }

}