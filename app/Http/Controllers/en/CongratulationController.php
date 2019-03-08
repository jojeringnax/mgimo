<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 14.12.2018
 * Time: 15:01
 */

namespace App\Http\Controllers\en;


use App\en\Congratulation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CongratulationController extends Controller
{
    public function index()
    {
        return view('congratulations.index', ['congratulations' => Congratulation::getModerated(), 'congratulationsNumber' => Congratulation::all()->count()]);
    }

    public function addCongratulations($data, Request $request)
    {
        if(!$request->ajax()) {
            return redirect('/');
        }
        $congratulations = Congratulation::getModerated(4, $data);
        foreach ($congratulations as $congratulation) {
            $resultArray[] = [
                'id' => $congratulation->id,
                'title' => $congratulation->title,
                'content' => !preg_match('/<iframe*/', $congratulation->content) ? $congratulation->mainPhoto !== null ? $congratulation->mainPhoto->path : url('img/no-image.png') : $congratulation->content,
                'date' => $congratulation->date
            ];
        }
        return isset($resultArray) ? json_encode($resultArray) : 0;
    }
}