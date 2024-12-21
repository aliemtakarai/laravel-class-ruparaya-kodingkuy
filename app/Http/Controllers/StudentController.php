<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view("profile");
    }

    public function profile($nama)
    {
        $nilai = 80;
        // $nilaiArray = ['80','90']; // array biasa
        $nilaiArray = [
            [
                'nama' => 'agus',
                'nilai' => 50
            ],
            [
                'nama' => 'Ilham',
                'nilai' => 80
            ]
        ];
        return view("profile",compact('nama','nilai', 'nilaiArray'));
    }
}
