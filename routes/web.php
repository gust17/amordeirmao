<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $rifas = \App\Models\Rifa::all('numero');
    return view('inicio', compact('rifas'));
});
Route::get('/home',function (){
   // dd('aqui');
    return redirect(url('validar'));
});

Route::post('consulta',function (\Illuminate\Http\Request $request){
    //dd($request->all());
    $regras = [

        'telefone' => 'required',


    ];

    $mensagens = [

        'telefone.required' => 'O campo telefone é Obrigatório'
    ];

    $validador = \Illuminate\Support\Facades\Validator::make($request->all(), $regras, $mensagens);

    if ($validador->fails()) {
        return redirect()->back()->withErrors($validador)->withInput();
    }
    $request['telefone'] = preg_replace('/[^\d]/', '', $request['telefone']);

    return redirect(url('pesquisa',$request->telefone));
});
Route::post('cadRifa', function (\Illuminate\Http\Request $request) {
    // dd($request->all());
    $regras = [
        'name' => 'required',
        'telefone' => 'required',
        'numeros' => 'required|array|present',
        'numeros.*' => [
            'numeric',
            function ($attribute, $value, $fail) {
                // Verifica se o número já existe na coluna 'numero' da tabela 'rifas'
                if (\App\Models\Rifa::where('numero', $value)->exists()) {
                    $fail("O número $value já está em uso.");
                }
            },
        ],
    ];

    $mensagens = [
        'numeros.required' => 'O array de números é obrigatório.',
        'numeros.array' => 'O campo números deve ser um array.',
        'numeros.present' => 'O array de números deve ter pelo menos um valor.',
        'numeros.*.numeric' => 'O campo :attribute deve ser um número.',
        'numeros.*.unique' => 'Cada número no array deve ser único na tabela de rifas.',
        'name.required' => 'O campo nome é Obrigatório',
        'telefone.required' => 'O campo telefone é Obrigatório'
    ];

    $validador = \Illuminate\Support\Facades\Validator::make($request->all(), $regras, $mensagens);

    if ($validador->fails()) {
        return redirect()->back()->withErrors($validador)->withInput();
    }
    $dados = $request->all();
    $dados['numeros'] = array_filter($dados['numeros'], function ($numero) {
        return $numero !== null && $numero !== '';
    });
    $dados['telefone'] = preg_replace('/[^\d]/', '', $dados['telefone']);
    $compra = \App\Models\Rifa::first('compra');
    $compra = $compra + 1;
    //dd($compra);
    foreach ($dados['numeros'] as $numero) {
        \App\Models\Rifa::create(

            [
                'name' => $dados['name'],
                'telefone' => $dados['telefone'],
                'numero' => $numero,
                'compra' => $compra
            ]
        );
    };
    //dd($dados);
    return redirect(url('pix', $compra));
});
Route::get('pix/{id}', function ($id) {
    $rifas = \App\Models\Rifa::where('compra', $id)->get();
    return view('pix', compact('rifas'));
});
Route::get('pesquisa/{telefone}', function ($telefone) {
    $rifas = \App\Models\Rifa::where('telefone', $telefone)->get();
    if ($rifas) {
        return view('pesquisa', compact('rifas'));
    } else {

    }
});

Route::get('validar', function () {
    $rifas = \App\Models\Rifa::all();

    return view('valida', compact('rifas'));
})->middleware('auth');

Route::get('ativar/{id}', function ($id) {
    $rifa = \App\Models\Rifa::find($id);

    $compras = \App\Models\Rifa::where("compra", $rifa->compra)->get();

    $numeros = "";

    foreach ($compras as $compra) {
        $compra->update(['status'=>1]);
        $numeros = $numeros . ' ' . $compra->numero;
    }
    //dd($numeros);

    return redirect(url('https://api.whatsapp.com/send?phone=55' . $rifa->telefone . '&text=Compra de rifa confirmada o(s) número(s) da sua rifa é(são) ' .$numeros.
  ' você pode conferir suas rifas compradas no link: ' . url('pesquisa', $rifa->telefone)));
})->middleware('auth');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
