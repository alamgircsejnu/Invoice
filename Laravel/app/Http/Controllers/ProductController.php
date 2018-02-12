<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use Input;
use App\Image;
use View;
use Auth;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('Pages.Product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pages.Product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//         dd($request);
        if (Input::has('priceTax') && Input::has('amountTax')) {
            $price = $request->price;
            $taxPrice = round(($price/11),2);
            $request->offsetSet('gst_price', $taxPrice);
            $expense = $request->amount;
            $taxExpense = round(($expense/11),2);
            $request->offsetSet('gst_exp', $taxExpense);
            $gst_payable = round(($taxPrice-$taxExpense),2);
            $request->offsetSet('gst_payable', $gst_payable);
            $finalPrice = round(($price- - $taxPrice),2);
            $request->offsetSet('price', $finalPrice);
            $finalAmount = round(($expense - $taxExpense),2);
            $request->offsetSet('amount', $finalAmount);
            $profit = round(($finalPrice - $finalAmount),2);
            $request->offsetSet('profit', $profit);
        } elseif (Input::has('priceTax')) {
            $price = $request->price;
            $taxPrice = round(($price/11),2);
            $request->offsetSet('gst_price', $taxPrice);
            $expense = $request->amount;
            $taxExpense = round(($expense * .1),2);
            $request->offsetSet('gst_exp', $taxExpense);
            $gst_payable = round(($taxPrice-$taxExpense),2);
            $request->offsetSet('gst_payable', $gst_payable);
            $finalPrice = round(($price - $taxPrice),2);
            $request->offsetSet('price', $finalPrice);
            $profit = round(($finalPrice - $expense),2);
            $request->offsetSet('profit', $profit);
        } elseif (Input::has('amountTax')) {
            $price = $request->price;
            $taxPrice = round(($price * .1),2);
            $request->offsetSet('gst_price', $taxPrice);
            $expense = $request->amount;
            $taxExpense = round(($expense/11),2);
            $request->offsetSet('gst_exp', $taxExpense);
            $gst_payable = round(($taxPrice-$taxExpense),2);
            $request->offsetSet('gst_payable', $gst_payable);
            $finalAmount = round(($expense - $taxExpense),2);
            $request->offsetSet('amount', $finalAmount);
            $profit = round(($price - $finalAmount),2);
            $request->offsetSet('profit', $profit);

        } else {
            $price = $request->price;
            $taxPrice = round(($price * .1),2);
            $request->offsetSet('gst_price', $taxPrice);
            $expense = $request->amount;
            $taxExpense = round(($expense * .1),2);
            $request->offsetSet('gst_exp', $taxExpense);
            $gst_payable = round(($taxPrice-$taxExpense),2);
            $request->offsetSet('gst_payable', $gst_payable);
            $profit = round(($price - $expense),2);
            $request->offsetSet('profit', $profit);
        }
        $product = Product::create($request->all());
        $productId = $product->id;
//        --------------------- Save Images ----------------------------
        if (isset($request->images) && !empty($request->images)) {
            $images = explode(',', $request->images);
//        dd($images);
            $path = "images";
            foreach ($images as $image) {
                $imgData = new Image();
                $imgData->image_name = $image;
                $imgData->image_path = $imagePath = $path . '/' . $image;
                $imgData->product_id = $productId;
                $imgData->save();
            }
        }
        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editProduct = Product::with('images')->find($id);
        $editProduct->price = $editProduct->price+$editProduct->gst_price;
        $editProduct->amount = $editProduct->amount+$editProduct->gst_exp;
        return view('Pages.Product.edit', compact('editProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        dd($request);
        $updateProduct = Product::find($id);
        //dd($updateArticle);
        $updateProduct->productId         = $request->productId;
        $updateProduct->productName     = $request->productName;
        $updateProduct->productCategory       = $request->productCategory;
        $updateProduct->quantity       = $request->quantity;
        $updateProduct->supplier  = $request->supplier;
        $updateProduct->expenseType  = $request->expenseType;
        $updateProduct->recProduct  = $request->recProduct;
        if (Input::has('gst_price') && Input::has('gst_exp')) {
            $price = $request->price;
            $taxPrice = $price * (10 / 110);
            $updateProduct->gst_price =$taxPrice;
            $expense = $request->amount;
            $taxExpense = $expense * (10 / 110);
            $updateProduct->gst_exp = $taxExpense;
            $profit = $price - $expense;
            $updateProduct->profit = $profit;
            $finalPrice = $price - $taxPrice;
            $updateProduct->price = $finalPrice;
            $finalAmount = $expense - $taxExpense;
            $updateProduct->amount = $finalAmount;
        } elseif (Input::has('gst_price')) {
            $price = $request->price;
            $taxPrice = $price * (10 / 110);
            $updateProduct->gst_price = $taxPrice;
            $expense = $request->amount;
            $taxExpense = $expense * .1;
            $updateProduct->gst_exp = $taxExpense;
            $finalExpense = $expense + $taxExpense;
            $profit = $price - $finalExpense;
            $updateProduct->profit = $profit;
            $finalPrice = $price - $taxPrice;
            $updateProduct->price =$finalPrice;
        } elseif (Input::has('gst_exp')) {
            $price = $request->price;
            $taxPrice = $price * .1;
            $updateProduct->gst_price = $taxPrice;
            $finalPrice = $price + $taxPrice;
            $expense = $request->amount;
            $taxExpense = $expense * (10 / 110);
            $updateProduct->gst_exp = $taxExpense;
            $profit = $finalPrice - $expense;
            $updateProduct->profit =$profit;
            $finalAmount = $expense - $taxExpense;
            $updateProduct->amount = $finalAmount;
        } else {
            $price = $request->price;
            $taxPrice = $price * .1;
            $updateProduct->gst_price = $taxPrice;
            $finalPrice = $price + $taxPrice;
            $expense = $request->amount;
            $taxExpense = $expense * .1;
            $updateProduct->gst_exp = $taxExpense;
            $finalExpense = $expense + $taxExpense;
            $profit = $finalPrice - $finalExpense;
            $updateProduct->profit = $profit;
        }
        $updateProduct->update();

if (isset($request->imagesWithDropzone) && !empty($request->imagesWithDropzone)){
        $images = explode(',', $request->imagesWithDropzone);
//        dd($images);
        $path = "images";
        foreach ($images as $image) {
            $imgData = new Image();
            $imgData->image_name = $image;
            $imgData->image_path = $imagePath = $path . '/' . $image;
            $imgData->product_id = $id;
            $imgData->save();
        }
}
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteProduct = Product::find($id);
        foreach ($deleteProduct->images as $productImage) {
            if (isset($productImage->image_name) && !empty($productImage->image_name)) {
                unlink($productImage->image_path);
                $productImage->delete();
            }
        }
        $deleteProduct->delete();

        return redirect('products');
    }

    public function productsForInvoice()
    {
        $products = Product::get();
        return response()->json(['success'=>$products]);
    }
    public function productForInvoiceModal($id)
    {
        $product = Product::find($id);
        return response()->json(['success'=>$product]);
    }


}
