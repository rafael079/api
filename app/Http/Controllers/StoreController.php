<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoresPostRequest;
use App\Http\Requests\StoresPutRequest;
use App\Http\Resources\StoresCollection;
use App\Models\Stores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
    /**
     * Retorna todas as lojas cadastradas

     * @return object
     */
    public function index()
    {
        return StoresCollection::collection(Stores::all());
    }

    /**
     * Retorna Loja pelo id
     * @param int $id
     * @return object
     */
    public function show($id)
    {
        return Stores::find($id);
    }

    /**
     * Cria uma nova loja
     * @param StoresPostRequest $request
     * @return object
     */
    public function store(StoresPostRequest $request)
    {
        return Stores::create($request->all());
    }

    /**
     * Atualiza uma loja
     * @param StoresPutRequest $request
     * @param int $request
     * @return object
     */
    public function update(StoresPutRequest $request, $id)
    {
        $store = Stores::findOrFail($id);
        $store->update($request->all());

        return $store;
    }

    /**
     * Remove uma loja
     * @param int $request
     * @return empty
     */
    public function delete($id)
    {
        $store = Stores::findOrFail($id);
        $store->delete();

        return  response('', 204);
    }
}
