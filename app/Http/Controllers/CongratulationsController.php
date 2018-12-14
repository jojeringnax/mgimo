<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 14.12.2018
 * Time: 15:01
 */

namespace App\Http\Controllers;


use App\Congratulation;

class CongratulationsController
{
    public function index()
    {
        return view('congratulations.index', ['congratulations' => Congratulation::all()]);
    }
}