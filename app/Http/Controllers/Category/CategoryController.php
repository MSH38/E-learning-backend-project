<?php


namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;


use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories=Category::all();
        return view('adminDashboard.Categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Categories.create
        return view('AdminDashboard.Categories.create');
    }
    public function getSubCategories(Category $category){
$subcategories=$category->subCategories;
        return view('subcategories.index',compact('subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate( [
            'name'=>'required|min:3',
            'slug'=>'required|min:5',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);
//        $image = $request->image;
//        $input['file'] = time().'.'.$image->getClientOriginalExtension();
//
//        $destinationPath = public_path('/assets/dist/img/Category-images');
//        $imgFile = Image::make($image->getRealPath());
//        $imgFile->resize(150, 150, function ($constraint) {
//            $constraint->aspectRatio();
//        })->save($destinationPath.'/'.$input['file']);
//        $destinationPath = public_path('/uploads');
//        $image->move($destinationPath, $input['file']);
        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/dist/img/Category-images/'), $imageName);


        }
        Category::create([
           'name'=>$request->name,
           'slug'=>$request->slug,
           'image'=>$imageName,
        ]);

    return redirect()->route('Category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
