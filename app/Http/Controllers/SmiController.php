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
            'smis' => Smi::all()
        ]);
    }

    public function add_smis($offset)
    {
        return Smi::limit(12)->offset($offset)->toArray()->get();
    }

}