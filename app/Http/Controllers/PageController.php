<?php

namespace App\Http\Controllers;

use App\Category;
use App\Trail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class PageController extends CourseController
{
    /**
     * @param Request $request
     * @return View
     */
    public function home(Request $request)
    {
        $cursos_destaque = Category::whereIn('category_id', [47,28,14,44,4,24,18,36,13,25,38,23])->get();
        $categorias = Category::all();
        $trilhas = Trail::with('courses')->get();

        return view('index', [
            'categorias' => $categorias,
            'destaques' => $cursos_destaque,
            'trilhas' => $trilhas,
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
