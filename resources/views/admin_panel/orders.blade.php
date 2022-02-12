@extends('layouts.admin_panel_master')

@section('title', 'Orders')

@section('content')
    <div class="col-10 px-2">
        <h3 class="py-2">Orders</h3>
            <table class="table">
                <thead>
                    <tr>
                      <th scope="col">#</th>
                        <th>Order</th>
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
                                <td>
                                    @php
                                        $images = json_decode($order->book->images);
                                        $image = $images[0];
                                    @endphp
                                    <a href="{{ asset('storage/book_images/'.$image) }}">
                                        <img src="{{ asset('storage/book_images/'.$image) }}" class="image-thumbnail" style="width: 80px; height: 100px" alt="">
                                    </a>
                                </td>
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
                                    @if ($order->confirm === 1)
                                        <p class="btn btn-success disabled">Confirmed</p>
                                    @elseif ($order->confirm === 0)
                                        <p class="btn btn-danger disabled">Canceled</p>
                                    @else
                                        <a href="/admin-panel/orders/{{ $order->id }}/confirm" class="btn btn-outline-primary">confirm</a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-outline-danger mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        cancel
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                  </tbody>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="/admin-panel/orders/{{ $order->id }}/confirm" id="send_message" method="POST">
                            @csrf
                            <h3>Reply Message to</h3>
                            <textarea name="message" class="form-control" ></textarea>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" onclick="event.preventDefault(); document.querySelector('#send_message').submit();" class="btn btn-primary">Send Message</button>
                      </div>
                    </div>
                  </div>
                </div>
            </table>         
    </div>
    
@endsection