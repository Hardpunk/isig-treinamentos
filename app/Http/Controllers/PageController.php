<?php

namespace App\Http\Controllers;

use App\Category;
use App\Plan;
use App\Trail;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function home(Request $request)
    {
        $arrayCursos = [47, 28, 14, 44, 4, 24, 18, 36, 13, 25, 38, 23];
        $cursos_destaque = Category::whereIn('category_id', $arrayCursos)->get();
        $categorias = Category::all();
        $trilhas = Trail::with('courses')->get();
        $planos = Plan::all();

        return view('index', [
            'categorias' => $categorias,
            'destaques' => $cursos_destaque,
            'trilhas' => $trilhas,
            'planos' => $planos
        ]);
    }

    /**
     * @return View
     */
    public function termos()
    {
        return view('pages.condicoes-gerais');
    }

    public function empresas()
    {
        return view('pages.para-empresas');
    }

    public function contato()
    {
        return view('pages.contato');
    }

}
