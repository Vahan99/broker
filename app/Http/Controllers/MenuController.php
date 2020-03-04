<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use Auth;
use App\Halls;

class MenuController extends Controller
{
    public function getCategories()
    {
        return DB::table('categories')->get();
    }

    public function index()
    {
        if (Auth::check()) {
            $categories = DB::table('categories')->get();
            $halls = DB::table('halls')->get();
            foreach ($categories as $key => $category) {
                foreach ($halls as $key => $hall) {
                    if($hall->id === $category->hall_id){
                        $category->hall_id = $hall->name;
                    }   
                };
            };
            return view('admin.menu.category', ['categories' => $categories ]);
        } else {
            return redirect('/achtamar_admin_panel');
        }
        
    }

    public function updateCatBlade($id)
    {
        $edit = true;
        if (Auth::check()) {
            $halls = DB::table('halls')->get();
            $categories = DB::table('categories')->where('id', $id)->get();
            return view('admin.menu.add-category', ['category' => $categories[0],'halls' => $halls, 'edit'=>$edit, 'error'=>false ]);
        } else {
            return redirect('/achtamar_admin_panel');
        }
        

    }

    public function updateCatPost($id,Request $request )
    {
        $error = false;
        if (Auth::check()) {
            $saved = DB::table('categories')
                    ->where('id', $id)
                    ->update(['name' => $request->input('catName'), 'hall_id' => $request->input('hall_id')]);
            if($saved) {
                $categories = DB::table('categories')->get();
                $halls = DB::table('halls')->get();
                foreach ($categories as $key => $category) {
                    foreach ($halls as $key => $hall) {
                        if($hall->id === $category->hall_id){
                            $category->hall_id = $hall->name;
                        }   
                    };
                };
                return view('admin.menu.category', ['categories' => $categories ]);
            }else{
                $error = true;
                $edit = true;

                $halls = DB::table('halls')->get();
                $categories = DB::table('categories')->where('id', $id)->get();
                return view('admin.menu.add-category', ['category' => $categories[0],'halls' => $halls, 'edit'=>$edit, 'error'=>$error ]);
            }
        } else {
            return redirect('/achtamar_admin_panel');
        } 
    }

    public function deleteCat($id)
    {
        if(Auth::check()) {
            $delete = Db::table('categories')->where('id', $id)->delete();
            if($delete) {
                $categories = DB::table('categories')->get(); 
                return view('admin.menu.category', ['categories' => $categories] );
            }else {
                $error = true;
                $categories = DB::table('categories')->get(); 
                return view('admin.menu.category', ['categories' => $categories, 'error' => $error] );
            }
        }else{
            return redirect('/achtamar_admin_panel');
        }
    }

    public function addCatBlade()
    {
        if (Auth::check()) {
            $halls = DB::table('halls')->get();
    	    return view('admin.menu.add-category', ['halls' => $halls, 'edit'=>false, 'error'=>false ]);
        } else {
            return redirect('/achtamar_admin_panel');
        }    
    }

    public function addCatPost(Request $request)
    {
        if (Auth::check()) {
            $saved = DB::table('categories')->insert(
                ['name' => $request->input('catName'), 'hall_id' => $request->input('hall_id')]
            );

            if(!$saved) {
                return view('admin.menu.add-category', ['halls' => $halls, 'error-message' => 'Problem on saving data please try again later']);
            }else{
                return redirect('/menu/cat-list');
            }
        } else {
           return redirect('/achtamar_admin_panel');
        }
        
    }

    // subcategories

    public function getSubCategories()
    {
        return DB::table('sub_categories')->get();
    }

    public function subCategoryList()
    {
        if (Auth::check()) {
            $subCategories = DB::table('sub_categories')->get();
            $categories = DB::table('categories')->get();
            $halls = DB::table('halls')->get();
            foreach ($categories as $key => $category) {
                foreach ($halls as $key => $hall) {
                    if($hall->id === $category->hall_id){
                        $category->name = $category->name.' '.$hall->name;
                    }   
                };
            };
            foreach ($subCategories as $key => $subCategory) {
                foreach ($categories as $key => $category) {
                    if($category->id === $subCategory->cat_id){
                        $subCategory->cat_id = $category->name;
                    }   
                };
            };

            return view('admin.menu.sub-category', ['subCategories' => $subCategories ]);
        } else {
            return redirect('/achtamar_admin_panel');
        }
        
    }

    public function updateSubCatBlade($id)
    {
        $edit = true;
        if (Auth::check()) {
            $categories = DB::table('categories')->get();
            $subCategories = DB::table('sub_categories')->where('id', $id)->get();
            $halls = DB::table('halls')->get();
            foreach ($categories as $key => $category) {
                foreach ($halls as $key => $hall) {
                    if($hall->id === $category->hall_id){
                        $category->name = $category->name.' '.$hall->name;
                    }   
                };
            };
            return view('admin.menu.add-subcategory', ['subCategory' => $subCategories[0],'categories' => $categories, 'edit'=>$edit, 'error'=>false ]);
        } else {
            return redirect('/achtamar_admin_panel');
        }
        

    }

    public function updateSubCatPost($id,Request $request )
    {
        $error = false;
        if (Auth::check()) {
            $saved = DB::table('sub_categories')
                    ->where('id', $id)
                    ->update(['name' => $request->input('subCatName'), 'cat_id' => $request->input('cat_id')]);
            if($saved) {
                $subCategories = DB::table('sub_categories')->get();
                $categories = DB::table('categories')->get();
                $halls = DB::table('halls')->get();
                foreach ($categories as $key => $category) {
                    foreach ($halls as $key => $hall) {
                        if($hall->id === $category->hall_id){
                            $category->name = $category->name.' '.$hall->name;
                        }   
                    };
                };
                foreach ($subCategories as $key => $subCategory) {
                    foreach ($categories as $key => $category) {
                        if($category->id === $subCategory->cat_id){
                            $subCategory->cat_id = $category->name;
                        }   
                    };
                };
                return view('admin.menu.sub-category', ['subCategories' => $subCategories ]);
            }else{
                $error = true;
                $edit = true;

                $categories = DB::table('categories')->get();
                $subCategories = DB::table('sub_categories')->where('id', $id)->get();
                return view('admin.menu.add-subcategory', ['subCategory' => $subCategories[0],'categories' => $categories, 'edit'=>$edit, 'error'=>$error ]);
            }
        } else {
            return redirect('/achtamar_admin_panel');
        } 
    }

    public function deleteSubCat($id)
    {
        if(Auth::check()) {
            $delete = Db::table('sub_categories')->where('id', $id)->delete();
            if($delete) {
                $subCategories = DB::table('sub_categories')->get(); 
                return view('admin.menu.sub-category', ['subCategories' => $subCategories] );
            }else {
                $error = true;
                $subCategories = DB::table('sub_categories')->get(); 
                return view('admin.menu.sub-category', ['subCategories' => $subCategories, 'error' => $error] );
            }
        }else{
            return redirect('/achtamar_admin_panel');
        }
    }

    public function addSubCatBlade()
    {
        if (Auth::check()) {
            $categories = DB::table('categories')->get();
            $halls = DB::table('halls')->get();
                foreach ($categories as $key => $category) {
                    foreach ($halls as $key => $hall) {
                        if($hall->id === $category->hall_id){
                            $category->name = $category->name.' '.$hall->name;
                        }   
                    };
                };
            return view('admin.menu.add-subcategory', ['categories' => $categories, 'edit'=>false, 'error'=>false ]);
        } else {
            return redirect('/achtamar_admin_panel');
        }    
    }

    public function addSubCatPost(Request $request)
    {
        if (Auth::check()) {
            $categories = DB::table('categories')->get();
            $saved = DB::table('sub_categories')->insert(
                ['name' => $request->input('subCatName'), 'cat_id' => $request->input('cat_id')]
            );

            if(!$saved) {
                return view('admin.menu.add-subcategory', ['categories' => $categories, 'error-message' => 'Problem on saving data please try again later']);
            }else{
                return redirect('/menu/subcat-list');
            }
        } else {
            return redirect('/achtamar_admin_panel');
        }
        
    }


    // products

    public function productList($cat_id, $sub_cat_id)
    {
        if (Auth::check()) {
            $products = DB::table('products')->where('cat_id', $cat_id)->where('sub_cat_id', $sub_cat_id)->paginate(10);
            $subCategories = DB::table('sub_categories')->get();
            $categories = DB::table('categories')->get();
            $halls = DB::table('halls')->get();
            foreach ($categories as $key => $category) {
                foreach ($halls as $key => $hall) {
                    if($hall->id === $category->hall_id){
                        $category->name = $category->name.' '.$hall->name;
                    }   
                };
            };
            foreach ($products as $key => $product) {
                foreach ($categories as $key => $category) {
                    if($category->id === $product->cat_id){
                        $product->cat_id = $category->name;
                    }   
                };
            };
            foreach ($products as $key => $product) {
                foreach ($subCategories as $key => $subCategory) {
                    if($subCategory->id === $product->sub_cat_id){
                        $product->sub_cat_id = $subCategory->name;
                    }   
                };
            };


            return view('admin.menu.product', ['products' => $products,'categories' => $categories,'subCategories' => $subCategories  ]);
        } else {
            return redirect('/achtamar_admin_panel');
        }
        
    }

    public function updateProductBlade($id)
    {
        $edit = true;
        if (Auth::check()) {
            $products = DB::table('products')->where('id', $id)->get();
            $subCategories = DB::table('sub_categories')->get();
            $categories = DB::table('categories')->get();
            $halls = DB::table('halls')->get();
            foreach ($categories as $key => $category) {
                foreach ($halls as $key => $hall) {
                    if($hall->id === $category->hall_id){
                        $category->name = $category->name.' '.$hall->name;
                    }   
                };
            };
            foreach ($products as $key => $product) {
                foreach ($categories as $key => $category) {
                    if($category->id === $product->cat_id){
                        $product->cat_id = $category->name;
                    }   
                };
            };
            foreach ($products as $key => $product) {
                foreach ($subCategories as $key => $subCategory) {
                    if($subCategory->id === $product->sub_cat_id){
                        $product->sub_cat_id = $subCategory->name;
                    }   
                };
            };


            return view('admin.menu.add-product', ['product' => $products[0],'categories' => $categories,'subCategories' => $subCategories,'error'=>false, 'edit'=>$edit  ]);
        } else {
            return redirect('/achtamar_admin_panel');
        }
        

    }

    public function updateProductPost($id,Request $request )
    {
        $error = false;
        if (Auth::check()) {
            $prod = DB::table('products')->where('id', $id)->get();
            if (strlen($request->file('prod_image')) > 0) {
                unlink(storage_path('app/public/'.$prod[0]->image));
                $saved = DB::table('products')
                    ->where('id', $id)
                    ->update(
                        ['name' => $request->input('prod_name'),
                        'cat_id' => $request->input('cat_id'),
                        'price' => $request->input('prod_price'),
                        'sub_cat_id' => $request->input('sub_cat_id'),
                        'description' => $request->input('prod_descr'),
                        'image' => date("Ymdgis").'.'.$request->file('prod_image')->getClientOriginalExtension()]
                    );
                    $request->prod_image->storeAs('public', date("Ymdgis").'.'.$request->file('prod_image')->getClientOriginalExtension());
                if($saved) {
                    return redirect('/menu/product-list');
                }else{
                    $error = true;
                    $edit = true;

                    $categories = DB::table('categories')->get();
                    $subCategories = DB::table('sub_categories')->where('id', $id)->get();
                    return view('admin.menu.add-product', ['product' => $prod[0],'categories' => $categories,'subCategories' => $subCategories, 'edit'=>$edit,  'error'=>$error ]);
                }    
            }else{
                $saved = DB::table('products')
                    ->where('id', $id)
                    ->update(
                        ['name' => $request->input('prod_name'),
                        'cat_id' => $request->input('cat_id'),
                        'price' => $request->input('prod_price'),
                        'sub_cat_id' => $request->input('sub_cat_id'),
                        'description' => $request->input('prod_descr')]
                    );
                if($saved) {
                    return redirect('/menu/product-list');
                }else{
                    $error = true;
                    $edit = true;

                    $categories = DB::table('categories')->get();
                    $subCategories = DB::table('sub_categories')->where('id', $id)->get();
                    return view('admin.menu.add-product', ['product' => $prod[0],'categories' => $categories,'subCategories' => $subCategories, 'edit'=>$edit,  'error'=>$error ]);
                }
            }
        } else {
            return redirect('/achtamar_admin_panel');
        } 
    }

    public function deleteProduct($id)
    {
        if(Auth::check()) {
            $product = DB::table('products')->where('id', $id)->get();
            unlink(storage_path('app/public/'.$product[0]->image));
            $delete = Db::table('products')->where('id', $id)->delete();
            if($delete) {
                $products = DB::table('products')->get();
            $subCategories = DB::table('sub_categories')->get();
            $categories = DB::table('categories')->get();
            $halls = DB::table('halls')->get();
            foreach ($categories as $key => $category) {
                foreach ($halls as $key => $hall) {
                    if($hall->id === $category->hall_id){
                        $category->name = $category->name.' '.$hall->name;
                    }   
                };
            };
            foreach ($products as $key => $product) {
                foreach ($categories as $key => $category) {
                    if($category->id === $product->cat_id){
                        $product->cat_id = $category->name;
                    }   
                };
            };
            foreach ($products as $key => $product) {
                foreach ($subCategories as $key => $subCategory) {
                    if($subCategory->id === $product->sub_cat_id){
                        $product->sub_cat_id = $subCategory->name;
                    }   
                };
            };


            return view('admin.menu.product', ['products' => $products,'categories' => $categories,'subCategories' => $subCategories, 'error' => false  ]);
            }else {
                $error = true;
                $products = DB::table('products')->get();
            $subCategories = DB::table('sub_categories')->get();
            $categories = DB::table('categories')->get();
            $halls = DB::table('halls')->get();
            foreach ($categories as $key => $category) {
                foreach ($halls as $key => $hall) {
                    if($hall->id === $category->hall_id){
                        $category->name = $category->name.' '.$hall->name;
                    }   
                };
            };
            foreach ($products as $key => $product) {
                foreach ($categories as $key => $category) {
                    if($category->id === $product->cat_id){
                        $product->cat_id = $category->name;
                    }   
                };
            };
            foreach ($products as $key => $product) {
                foreach ($subCategories as $key => $subCategory) {
                    if($subCategory->id === $product->sub_cat_id){
                        $product->sub_cat_id = $subCategory->name;
                    }   
                };
            };


            return view('admin.menu.product', ['products' => $products,'categories' => $categories,'subCategories' => $subCategories, 'error' => $error  ]);
            }
        }else{
            return redirect('/achtamar_admin_panel');
        }
    }

    public function addProductBlade()
    {
        if (Auth::check()) {
            $categories = DB::table('categories')->get();
            $subCategories = DB::table('sub_categories')->get();
            $halls = DB::table('halls')->get();
                foreach ($categories as $key => $category) {
                    foreach ($halls as $key => $hall) {
                        if($hall->id === $category->hall_id){
                            $category->name = $category->name.' '.$hall->name;
                        }   
                    };
                };
            return view('admin.menu.add-product', ['categories' => $categories,'subCategories' => $subCategories, 'edit'=>false, 'error'=>false ]);
        } else {
            return redirect('/achtamar_admin_panel');
        }    
    }

    public function addProductPost(Request $request)
    {
        // dd(date("Ymdgis"),$request->file('prod_image'));
        if (Auth::check()) {
            $categories = DB::table('categories')->get();
            $subCategories = DB::table('sub_categories')->get();
            $halls = DB::table('halls')->get();
            foreach ($categories as $key => $category) {
                foreach ($halls as $key => $hall) {
                    if($hall->id === $category->hall_id){
                        $category->name = $category->name.' '.$hall->name;
                    }   
                };
            };
            $saved = DB::table('products')->insert(
                ['name' => $request->input('prod_name'),
                'cat_id' => $request->input('cat_id'),
                'price' => $request->input('prod_price'),
                'sub_cat_id' => $request->input('sub_cat_id'),
                'description' => $request->input('prod_descr'),
                'image' => date("Ymdgis").'.'.$request->file('prod_image')->getClientOriginalExtension()]
            );

            $request->prod_image->storeAs('public', date("Ymdgis").'.'.$request->file('prod_image')->getClientOriginalExtension());

            if(!$saved) {
                return view('admin.menu.add-product', ['categories' => $categories, 'error-message' => 'Problem on saving data please try again later']);
            }else{
                return redirect('/menu/product-list');
            }
        } else {
           return redirect('/achtamar_admin_panel');
        }
        
    }
}
