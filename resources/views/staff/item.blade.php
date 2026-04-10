@extends('templates.sidebar')

@section('content')

<div class="d-flex justify-content-between m-5">
    <div>
        <h6 class="text-black">Data of Items</h6>
        <p class="text-muted">Add and update item</p>
    </div>
    <div>
        <button class="btn btn-success" type="button">Export Excel</button>
        <button type="button" class="btn btn-primary" data-mdb-ripple-init data-mdb-modal data-mdb-target="#exampleModal">+ Add</button>
    </div>
</div>
    
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Category</th>
            <th>Name</th>
            <th>Total</th>
            <th>Available</th>
            <th>Lending Total</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($items as $index => $item)
        <tr>
                <td>{{$index + 1}}</td>
                <td>{{$item->category->name}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->total}}</td>
                <td>{{$item->repair}}</td>
                <td>{{$item->lending}}</td> 
            </tr>
            @endforeach
    </tbody>
</table>

@endsection