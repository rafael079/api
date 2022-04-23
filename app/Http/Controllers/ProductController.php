<?php

namespace App\Http\Controllers;

use App\Events\CreateOrUpdateProduct;
use Mail;
use App\Http\Requests\ProductsPostRequest;
use App\Http\Resources\ProductsCollection;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Retorna todas os produtos cadastrados
     * @return object
     */
    public function index()
    {
        return ProductsCollection::collection(Products::all());
    }

    /**
     * Retorna produto pelo id
     * @param int $id
     * @return object
     */
    public function show($id)
    {
        return new ProductsCollection(Products::find($id));
    }

    /**
     * Cria um novo produto
     * @param ProductsPostRequest $request
     * @return object
     */
    public function store(ProductsPostRequest $request)
    {

        $product = Products::create($request->all());

        // Envia o Email de Notificação da Criação de um Novo produto
        event(new CreateOrUpdateProduct($product));

        return new ProductsCollection($product);
    }


    /**
     * Atualiza um produto
     * @param StoresPutRequest $request
     * @param int $request
     * @return object
     */
    public function update(ProductsPostRequest $request, $id)
    {
        $product = Products::findOrFail($id);
        $product->update($request->all());

        // Envia o Email de Notificação da Criação de um Novo produto
        event(new CreateOrUpdateProduct($product));

        return new ProductsCollection($product);
    }

    /**
     * Remove um produto
     * @param int $request
     * @return empty
     */
    public function delete($id)
    {
        $store = Products::findOrFail($id);
        $store->delete();

        return  response('', 204);
    }
}
