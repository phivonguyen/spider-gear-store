<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogCategoriesResource;
use App\Models\User;
use App\Models\Blog;
use App\Models\BlogCategories;
use App\Models\BlogComments;
use App\Http\Controllers\Services\BlogsController;
use Illuminate\Support\Facades\Validator;
use App\Http\Payload;

use Illuminate\Http\Request;

class AdminBlogCategoriesController extends Controller
{
    private function returnData($blog_category)
    {
        if ($blog_category->count() === 0) {
            return Payload::toJson(null, 'Data Not Found', 404);
        }

        return Payload::toJson(BlogCategoriesResource::collection($blog_category), 'Ok', 200);
    }

    public function index()
    {
        $blog_categories = $this->returnData(BlogCategories::all());

        return view('admin.category-list.index',['blog_categories'=> $blog_categories['data']]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add-blog-category.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(),[
            'b_category_id' => 'required',
            'name' => 'required',
        ]);
        if ($validatedData->fails()) {
            return redirect()
                ->back()
                ->withErrors($validatedData)
                ->withInput();
        }
        $blog_category = new BlogCategories();
        $blog_category->b_category_id = $request->input('b_category_id');
        $blog_category->name = $request->input('name');
        $blog_category->save();
        return redirect()->route('category-list.index')->with('alert','New Blog category was updated successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog_category = $this-> returnData(BlogCategories::where('b_category_id','=',$id));
        return view('admin.edit-blog-category.index',['blog_category' => $blog_category['data']]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $validatedData = Validator::make($request->all(),[
            'b_category_id' => 'required',
            'name' => 'required',
        ]);
        if ($validatedData->fails()) {
            return redirect()
                ->back()
                ->withErrors($validatedData)
                ->withInput();
        }
        $blog_categories = BlogCategories::where('b_category_id', '=', $id)->update($request->validate([
            'b_category_id' => 'required',
            'name' => 'required',
        ]));
        return redirect()->route('category-list.index')->with('alert','Blog Category was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog_categories = BlogCategories::where('b_category_id', '=', $id)->delete();
        return redirect()->route('category-list.index')->with('alert', 'That category was deleted successfully!');
    }
}
