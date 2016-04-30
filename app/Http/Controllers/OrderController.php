<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Routing\Controller;

class OrderController extends Controller
{
  /**
   * Display a listing of orders.
   * @SWG\Get(
  tags={"orders"},
  path="/orders",
  summary="List of orders",
  description="Returns a list of orders. Private endpoint",
  @SWG\Response(response=200, ref="#/responses/success_object")
  )
   */
  public function index()
  {
    $orders = Order::all();
    return response()->json($orders);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $order = new Order();
    $order->customer_id = $request->customer_id;
    $order->provider_id = $request->provider_id;
    $order->paid = $request->paid;
    $order->price = $request->price;
    $order->save();
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $order = Order::with('orderItems')->find($id);
    return response()->json($order);
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
    $order = Order::find($id);
    $order->customer_id = $request->customer_id;
    $order->provider_id = $request->provider_id;
    $order->paid = $request->paid;
    $order->price = $request->price;
    $order->save();
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $order = Order::find($id);
    $order->delete();
  }
}
