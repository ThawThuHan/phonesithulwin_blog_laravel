@extends('layouts.admin_panel_master')

@section('title', 'Orders')

@section('content')
    <div class="col-10 px-2">
        <h3 class="py-2">Orders</h3>
            <table class="table">
                <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Customer Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Address</th>
                      <th scope="col">Payment Screenshot</th>
                      <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if($orders)
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->address }}</td>
                                <td>
                                  <a href="{{ asset('storage/payment_screenshot/'.$order->payment_screenshot) }}">
                                    <img src="{{ asset('storage/payment_screenshot/'.$order->payment_screenshot) }}" class="image-thumbnail" style="width: 80px; height: 100px" alt="">
                                  </a>
                                </td>
                                <td>
                                    <a href="/admin-panel/orders/{{ $order->id }}/confirm" class="btn btn-outline-primary">confirm</a>
                                    <a href="/admin-panel/orders/{{ $order->id }}/cancel" class="btn btn-outline-danger mt-2">cancel</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                  </tbody>
            </table>         
    </div>
    
@endsection