<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function search(Request $request)
    {
        $name_array_count = count($request->name);
        $name = $request->name;
        $search_dress = $name[$name_array_count - 1];

        $products = DB::select(DB::raw("SELECT * FROM `pdtable` WHERE MATCH(name) AGAINST('$search_dress') GROUP BY group_id LIMIT 0,20"));
        return $products;
        return response()->json($products);
    }

    public function loadmore(Request $request)
    {
        $products = DB::select(DB::raw("SELECT * FROM `pdtable` WHERE MATCH(name) AGAINST('$request->name') GROUP BY group_id LIMIT $request->start,20"));
        return response()->json($products);
    }
    public function comdata(Request $request)
    {
        $sort_way = $request['sort'];
        $search_input = $request->filters;
        $query = DB::table('pdtable')->where('name', 'LIKE', '%' . $request->name . '%');
        if ($search_input['gender']) {
            $query->whereIn('gender', $search_input['gender']);
        }
        if ($search_input['fit']) {
            $query->whereIn('fit', $search_input['fit']);
        }

        if ($search_input['color']) {
            $query->whereIn('color_family', $search_input['color']);
        }

        if ($search_input['price']) {
            $price_arr_size = count($search_input['price']);
            if ($price_arr_size == 1) {

                $start = $search_input['price'][0];
                $end = $search_input['price'][0] + 500;
                $query->whereBetween('selling_price', [$start, $end]);
            } else {
                $max_val = 0;

                foreach ($search_input['price'] as $price_range) {
                    $min_val = $search_input['price'][0];
                    if ($max_val <= $price_range) {
                        $max_val = $price_range;
                    }
                    if ($min_val >= $price_range) {
                        $min_val = $price_range;
                    }
                }
                $max_val = $max_val + 500;
                $query->whereBetween('selling_price', [$min_val, $max_val]);
            }
        }

        if ($search_input['discount']) {
            $discount_min_val = $search_input['discount'][0];
            foreach ($search_input['discount'] as $discount) {
                if ($discount_min_val >= $discount) {
                    $discount_min_val = $discount;
                }
            }
            $query->where('discount', '>=', $discount_min_val);
        }
        if ($sort_way) {

            if ($sort_way == 1) {
                $query->orderBy('selling_price','asc');
               
            } elseif ($sort_way == 2) {
                $query->orderBy('selling_price','desc');
             
            }
        }
       
        $count = $query->count();
        $products = $query->offset(0)->limit(30)->groupBy('group_id')->get();
        return response()->json([$products, $count]);
    }
}

 // DB::statement('ALTER TABLE pdtable ADD FULLTEXT(name)');
 // foreach ($search_input['price'] as $range) {
            //     $check_price = explode(',', $range);
            //     $query->whereBetween('price', $check_price);
            // }

        // $products=[];
        // $search_datas = $request->filters;
        // // $query = DB::table('pdtable')->where('name', 'LIKE', '%' . $request->name . '%')->offset(0)->limit(30)->get();
        // $query = DB::table('pdtable')->where('name', 'LIKE', '%' . $request->name . '%');
        // if ($search_datas) {
        //     foreach ($search_datas as $data) {

        //         if ($data == '39' || $data == '40' || $data == '42' || $data == '44') {
        //            $query->where('size',$data);
        //         } elseif ($data == 'slim fit' || $data == 'regular fit') {
        //             $query->where('fit',$data);
        //         } elseif ($data == 'men' || $data == 'women') {
        //             $query->where('gender',$data);
        //     }
        //     array_push($arr, "dataif");
        // }

        //    $query= $query= DB::table('pdtable')->where('name', 'LIKE', '%' . $request->name . '%');
        // $products = DB::select(DB::raw("SELECT * FROM `pdtable` WHERE MATCH(name) AGAINST('$request->name') AND gender ='' LIMIT 0,20"));
        // return response()->json($products);
