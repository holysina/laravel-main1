<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class listing extends Model
{
    protected $fillable = ['title', 'company', 'email', 'location', 'description', 'tag', 'url'];
    protected $table = 'posts';

    public static function index()
    {
        $showAll = DB::table('posts')->paginate(4);

        return $showAll;


    }

    public static function show($id)
    {

        $show = DB::connection('mysql')->select("SELECT * FROM `posts` where id =$id");

        if ($show != null) {
            return $show;
        } else {
            abort('404');
        }
    }

    public static function scopeFilter(array $tags)
    {
        DB::table('posts')->where('tag', $tags)->get();
    }

    public static function search(array $request)
    {
        $title = $request['search'];
        $search = DB::table('posts')->Where('title', $title)->orWhere('tag', $title)->orWhere('description', $title)->get();
        return $search;

    }

    public static function store($formFields)
    {
        $resultInsert = [$formFields];
        $insert = DB::table('posts')->insert($resultInsert);
        return $insert;
    }

    public static function updateTheFild($options, $id)
    {
        $update = DB::table('posts')->find($id)->update($options);

        return $update;
    }

    public static function mange($id)
    {
        $request = DB::table('posts')->where('user_id', $id)->get();

        return $request;

    }

}

