<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product;
use CodeCommerce\Category;
use CodeCommerce\ProductImage;
use CodeCommerce\Tag;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class AdminProductsController extends Controller
{
    protected $products;
    public function __construct(Product $product)
    {
        $this->products = $product;
    }

    public function index()
    {

        //$products = $this->products->all();//todos
        $products = $this->products->paginate(12);//paginaçao
        return view('admin.products.index', compact('products'));
    }


    public function create(Category $category)
    {
        $categories = $category->lists('name', 'id');
        return view('admin.products.create', compact('categories'));
    }

    public function retrieve($id)
    {
            echo $this->products->find($id)->name;
    }

    public function edit($id, Category $category)
    {
        $categories = $category->lists('name', 'id');
        $product = $this->products->find($id);
        $tags = $product->tags->lists('name')->toArray();
        $tags = implode(",", $tags);
        return view('admin.products.edit', compact('product', 'categories', 'tags'));
    }

    public function update(Requests\ProductRequest $request, $id)
    {
        $input = $request->all();

        $product = $this->products->find($id);
        $product->update($input);

        $tagNames = explode(',', $input['tags']);
        $tagIds = $this->storeTags($tagNames, $product->id);//armazena novas tags e mantem as atuais

        flash()->success('Produto atualizado com sucesso. - '.$product->name);//flash message teste
        return redirect()->route('admin.products.index');
    }

    public function delete($id)
    {
        $product = $this->products->find($id);
        $product->delete();

        flash('Produto excluído com sucesso. - ' . $product->name);//flash message teste

        return redirect()->route('admin.products.index');
    }

    /**
     * processar dados do post e salvar em model
     */
    public function store(Requests\ProductRequest $request)
    {
        $input = $request->all();
        $product = $this->products->fill($input);//dados do request passados para o model
//        $product->recommend = $request->input('recommend',false);//preencher checkbox caso  = false outra solucao ao hidden
//        $product->featured = $request->input('featured',false);//preencher checkbox caso  = false

        $product->save();//persiste no banco

        $tagNames = explode(',', $input['tags']);
        $tagIds = $this->storeTags($tagNames, $product->id);//armazena novas tags e mantem as atuais

        flash('Produto salvo com sucesso. - ' . $product->name);//flash message teste

        return redirect()->route('admin.products.index');

    }

    /**
     * armazena tags e retorna array com as ids das tags
     * @param array $tagNames
     * @return array tagIds
     */
    private function storeTags(array $tagNames, $productId)
    {
        if(count($tagNames > 0)){
            foreach($tagNames as $tagName){
                $tag = Tag::firstOrCreate(array('name' => trim($tagName)));//cria se não existir
                $tagIds[] = $tag->id ;
            }
            $product = $this->products->find($productId);
            $product->tags()->sync($tagIds);//só mantén relacionadas as atuais
        }
    }

    /**
     exibe a listagem de imagens
    @param $id id de product
    */
    public function images($id)
    {
        $product = $this->products->find($id);
        return view('admin.products.images', compact('product'));
    }

    /**
    criar imagem para produto
    @param $id id de product
     */    public function createImage($id)
    {
        $product = $this->products->find($id);
        return view('admin.products.create_image', compact('product'));
    }

    /**
     * salvar imagem de produto
     */
    public function storeImage(Requests\ProductImageRequest $request, $id, ProductImage $productImage)
    {
        $file = $request->file('image');
       // var_dump($file); exit();
        $extension = $file->getClientOriginalExtension();
        $image = $productImage::create(['product_id' => $id, 'extension' => $extension]);//gravar no banco
        //var_dump($image);exit();
        //gravar no disco config/filesystem.php
        Storage::disk('public_local')->put($image->id . '.' . $extension, File::get($file));

        return redirect()->route('admin.products_images.index', $id);
    }

    public function deleteImage(ProductImage $productImage, $id)
    {
        $image = $productImage->find($id);
        $product = $image->product; //recuperar product

        if(file_exists(public_path(). '/uploads/' . $image->id . '.' . $image->extension))
            Storage::disk('public_local')->delete($image->id . '.' . $image->extension);//remover arquivo


        $image->delete();//remover imagem no banco
        return redirect(route('admin.products_images.index', ['id' => $product->id]));
    }
}