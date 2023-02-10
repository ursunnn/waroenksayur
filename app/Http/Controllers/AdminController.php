<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{

    public function create()
    {
        $categories= Category::all();
        return view('admin.add-product',[
            'categories'=> $categories
        ]);
    }

    public function add_music(Request $request){
        $request->validate([
            'image'=>'required|file|image|mimes:jpeg,png,jpg',
            'title'=>'required|min:5',
            'description'=>'required|min:15|max:500',
            'price'=>'required|integer|min:1000|max:10000000',
            'stock'=>'required|integer|min:1|max:10000',
            'category'=>'required'
        ]);
            $image = $request->file('image');
		    $image_name = time()."_".$image->getClientOriginalName();
		    $file_path = 'data_file';
		    $image->move($file_path, $image_name);

            $newContent = new Product();
            $newContent->title = $request->input('title');
            $newContent->description = $request->input('description');
            $newContent->image = $image_name;
            $newContent->category_id = $request->input('category');
            $newContent->price = $request->input('price');
            $newContent->stock = $request->input('stock');
            $newContent->save();

            return redirect()->route('music_list')->with('alert','Success Creating Product');
    }



    public function showDetail($id){
       $content = Product::find($id);
       return view('admin.edit-content', [
           'product'=>$content
       ]);
    }
    public function edit($id, Request $request){
        $request->validate([
            'image'=>'required|file|image|mimes:jpeg,png,jpg',
            'description'=>'required|min:15|max:500',
            'price'=>'required|integer|min:1000|max:10000000',
            'stock'=>'required|integer|min:1|max:10000'
        ]);
            $content = Product::find($id);
            $content->description = $request->input('description');
            $content->price = $request->input('price');
            $content->stock = $request->input('stock');

            // if($request->hasFile('image')){
                $dir = 'data_file/'.$content->image;
                File::delete($dir);
                $image = $request->file('image');
		        $image_name = time()."_".$image->getClientOriginalName();
		        $file_path = 'data_file';
                $image->move($file_path, $image_name);
                $content->image = $image_name;
            // }

            $content->save();
            return redirect()->route('music_list')->with('alert','Success Updating Product');

    }

    public function delete($id)
    {
        $product = Product::all()->find($id);
        $dir = 'data_file/'.$product->image;
        File::delete($dir);
        $product->delete();
        return redirect()->back()->with('alert','Success Remove Product');
    }

    public function create_category(){
        $categories = Category::all();
        return view('admin.add-category', ['categories'=>$categories]);
    }

    public function add_category(Request $request){
        $request->validate([
            'name'=>'required|alpha|unique:categories,name'
        ]);
        $content = new Category();
        $content->name = $request->input('name');
        $content->save();
        return redirect()->back()->with('alert','Success Adding Category');
    }

}
