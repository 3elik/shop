<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $roots = Category::roots();

        return view('admin.category.index', compact('roots'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'parent_id' => 'integer',
            'name' => 'required|max:100',
            'slug' => 'required|max:100|unique:categories,slug|alpha_dash',
            'image' => 'mimes:jpeg,jpg,png|max:5000',
        ]);

        $category = Category::create($request->all());
        return redirect()
            ->route('admin.category.show', ['category' => $category->id])
            ->with('success', 'Category successfully created');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $parents = Category::roots();
        return view('admin.category.create', compact('parents'));
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function edit(Category $category)
    {
        $parents = Category::roots();
        return view('admin.category.edit', compact('parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return Response
     */
    public function update(Request $request, Category $category)
    {
        $id = $category->id;
        $this->validate($request, [
            'parent_id' => 'integer',
            'name' => 'required|max:100',
            /*
             * Проверка на уникальность slug, исключая эту категорию по идентифкатору:
             * 1. categories — таблица базы данных, где проверяется уникальность
             * 2. slug — имя колонки, уникальность значения которой проверяется
             * 3. значение, по которому из проверки исключается запись таблицы БД
             * 4. поле, по которому из проверки исключается запись таблицы БД
             * Для проверки будет использован такой SQL-запрос к базе данныхЖ
             * SELECT COUNT(*) FROM `categories` WHERE `slug` = '...' AND `id` <> 17
             */
            'slug' => 'required|max:100|unique:categories,slug,' . $id . ',id|alpha_dash',
            'image' => 'mimes:jpeg,jpg,png|max:5000',
        ]);

        $category->update($request->all());
        return redirect()
            ->route('admin.category.show', ['category' => $category->id])
            ->with('success', 'Category successfully saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Response
     */
    public function destroy(Category $category)
    {
        if ($category->children->count()) {
            $errors[] = 'You cannot remove category with children category.';
        }
        if ($category->products->count()) {
            $errors[] = 'You cannot remove category with products';
        }
        if (!empty($errors)) {
            return back()->withErrors($errors);
        }

        $category->delete();

        return redirect()
            ->route('admin.category.index')
            ->with('success', 'Category successfully deleted');
    }
}
