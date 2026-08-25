<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryUpdateRequest;
use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    protected $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository){
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $category = $this->categoryRepository->index();

        return view('category.index', compact('category'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' =>'required|string',
            'image' => 'nullable'
        ]);

        $imageName = time() . '.' . $request->image->extension();
        if($request->hasFile('image')) {
            $request->image->move(public_path('categoryImages'), $imageName);
        }
        $this->categoryRepository->store([
            'name' => $request->name,
            'image' => $imageName,
        ]);


        return redirect()->route('categories.index');
    }

   public function edit($id)
{
    $category = Category::findOrFail($id);

    return view('category.edit', compact('category'));
}

   public function update(CategoryUpdateRequest $request)
{
    $category = $this->categoryRepository->show($request->id);

    $category->update([
        'name' => $request->name
    ]);

    return redirect()
        ->route('categories.index')
        ->with('success', 'Category updated successfully.');
}
    public function delete($id)
    {
        $category = $this->categoryRepository->show($id);

        $category->delete();

        return redirect()->route('categories.index');
    }
}
