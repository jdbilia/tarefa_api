<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTarefaRequest;

class TarefaController extends Controller
{
    public function index()
    {
        $tarefas = Tarefa::all();
        return response()->json($tarefas);
    }

    public function store(StoreTarefaRequest $request)
    {
            $tarefa = Tarefa::create($request->all());
            return response()->json($tarefa, 201);
    }

    public function update(StoreTarefaRequest $request, $id)
    {
        $tarefa = Tarefa::findOrFail($id);

        $tarefa->update($request->all());

        return $tarefa;
    }

    public function destroy($id)
    {
        $tarefa = Tarefa::findOrFail($id);

        $tarefa->delete();

        return response()->json(null, 204);
    }
}
