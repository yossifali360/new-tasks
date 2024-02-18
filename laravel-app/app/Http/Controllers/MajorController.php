<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MajorController extends Controller
{
    function Major(){
        $majors = [
            [
                'title' => "major 1",
                'image' => "assets/images/major.jpg",
                'url' => "/"
            ], [
                'title' => "major 2",
                'image' => "assets/images/major.jpg",
                'url' => "/"
            ], [
                'title' => "major 3",
                'image' => "assets/images/major.jpg",
                'url' => "/"
            ], [
                'title' => "major 4",
                'image' => "assets/images/major.jpg",
                'url' => "/"
            ],
        ];
        return view('pages/major',['majors' => $majors]);
    }
}
