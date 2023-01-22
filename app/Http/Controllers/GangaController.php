<?php

namespace App\Http\Controllers;

use App\Http\Requests\GangaEdit;
use App\Http\Requests\GangaPost;
use App\Models\Category;
use App\Models\Ganga;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GangaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gangas = Ganga::orderBy('title', 'ASC')->paginate(12);
        $user = null;
        if (\Illuminate\Support\Facades\Auth::check()) {
            $id = \Illuminate\Support\Facades\Auth::id();
            $user = User::findOrFail($id);
        }
        return view('layouts/gangas.index', compact('gangas', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            $categorias = Category::get();
            $user = null;
            if (\Illuminate\Support\Facades\Auth::check()) {
                $id = \Illuminate\Support\Facades\Auth::id();
                $user = User::findOrFail($id);
            }
            return view('layouts/gangas.create', compact('user', 'categorias'));
        } else {
            return redirect()->route('ganga.index');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GangaPost $request)
    {
        $ganga = new Ganga();
        $ganga->title = $request->get('titulo');
        $ganga->description = $request->get('descripcion');
        $ganga->url = $request->get('pagina');
        $ganga->category = $request->get('categoria');
        $ganga->likes = 0;
        $ganga->unlikes = 0;
        $ganga->price = $request->get('precioActual');
        $ganga->price_sale = $request->get('precioAntiguo');
        $ganga->available = 1;
        $ganga->user_id = Auth::id();
        $ganga->save();

        $nombre = $ganga->id . "-ganga-severa.jpg";

        $request->file('archivo')->storeAs('public/img', $nombre);

        return redirect("ganga/$ganga->id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = null;
        if (\Illuminate\Support\Facades\Auth::check()) {
            $idUser = \Illuminate\Support\Facades\Auth::id();
            $user = User::findOrFail($idUser);
        }
        $ganga = Ganga::findOrFail($id);
        return view('layouts/gangas.show', compact('ganga', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ganga = Ganga::find($id);
        if (Auth::id() == $ganga->user_id) {
            $categorias = Category::get();
            $user = null;
            if (\Illuminate\Support\Facades\Auth::check()) {
                $id = \Illuminate\Support\Facades\Auth::id();
                $user = User::findOrFail($id);
            }
            return view('layouts/gangas.edit', compact('ganga', 'categorias', 'user'));
        } else {
            return redirect()->route('ganga.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GangaEdit $request, $id)
    {
        $ganga = Ganga::findOrFail($id);
        $ganga->title = $request->get('titulo');
        $ganga->description = $request->get('descripcion');
        $ganga->url = $request->get('pagina');
        $ganga->category = $request->get('categoria');
        $ganga->price = $request->get('precioActual');
        $ganga->price_sale = $request->get('precioAntiguo');
        $ganga->save();

        if ($request->file('archivo')) {
            $nombre = $ganga->id . "-ganga-severa.jpg";
            $request->file('archivo')->storeAs('public/img', $nombre);
        }

        return redirect("ganga/$ganga->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ganga::findOrFail($id)->delete();
        return redirect()->route('ganga.index');
    }

    public function showPerfil() {
        $id = \Illuminate\Support\Facades\Auth::id();
        $user = User::findOrFail($id);
        $gangas = Ganga::get();
        $gangasUser = array();
        foreach ($gangas as $ganga) {
            if ($id == $ganga->user_id) {
                array_push($gangasUser, $ganga);
            }
        }
        return view('layouts/gangas.perfil', compact('user', 'gangasUser'));
    }
}
