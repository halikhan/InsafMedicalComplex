<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $fillable = [
        'category_name',
        'status'
    ];
    private static $category;

    // public static function saveCategory($request){
    //     self::$category = new Category();
    //     self::$category->category_name = $request->category_name;
    //     self::$category->status =$request->status;
    //     self::$category->save();
    // }
=======

    private static $category;
    use HasFactory;
    public static function saveCategory($request){
        self::$category = new Category();
        self::$category->category_name = $request->category_name;
        self::$category->status =$request->status;
        self::$category->save();
    }
>>>>>>> 4d0cdcbbad56ca35cf2064831b8fbef357107b1f

    public static function updateCategory($request,$id){
        self::$category = Category::find($id);
        self::$category->category_name = $request->category_name;
        self::$category->status =$request->status;
        self::$category->save();

    }
}
