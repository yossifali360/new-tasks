<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function Home()
    {
        $doctors = [
            [
                'title' => "doctor 1",
                'image' => "assets/images/major.jpg",
                'url' => "/"
            ], [
                'title' => "doctor 2",
                'image' => "assets/images/major.jpg",
                'url' => "/"
            ], [
                'title' => "doctor 3",
                'image' => "assets/images/major.jpg",
                'url' => "/"
            ], [
                'title' => "doctor 4",
                'image' => "assets/images/major.jpg",
                'url' => "/"
            ],
        ];
        return view('pages/home', ['doctors' => $doctors]);
    }
}
