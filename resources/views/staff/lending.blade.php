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
            <th>Item</th>
            <th>Total</th>
            <th>Name</th>
            <th>Ket.</th>
            <th>Date</th>
            <th>Returned</th>
            <th>Edited By</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($lendings as $index => $item)
        <tr>
                <td>{{$index + 1}}</td>
                <td>{{$item->item->name}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->total}}</td>
                <td>{{$item->repair}}</td>
                <td>{{$item->lending}}</td>
                <td>
                    <button type="button" class="btn btn-warning">Edit</button>
                </td> 
            </tr>
            {{-- edit tes --}}
            {{-- <form action="{{route('items.update', $item['id'])}}" method="POST">
                @csrf
                @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @endError" name="name" id="name" placeholder="Alat Dapur">
            </div>

                <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select text-black" name="category_id" id="category_id">
                    <option value="" disabled selected>Select</option>
                    @foreach ($categories as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
                </div>
                
                <div class="mb-3">
                <label for="total" class="form-label">total</label>
                <input type="integer" class="form-control @error('total') is-invalid @endError" name="total" id="total" placeholder="Alat Dapur">
                </div>

                <div class="mb-3">
                <label for="brokeItem" class="form-label">New Broke Item</label>
                <input type="integer" class="form-control @error('brokeItem') is-invalid @endError" name="brokeItem" id="brokeItem" placeholder="Alat Dapur">
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form> --}}
            @endforeach
    </tbody>
</table>

{{-- tes add --}}
<form action="{{route('items.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="borrower_name" class="form-label">Name</label>
        <input type="text" class="form-control @error('borrower_name') is-invalid @endError" name="borrower_name" id="borrower_name" placeholder="Alat Dapur">
    </div>

    <div class="mb-3">
    <label for="item_id" class="form-label">Items</label>
    <select class="form-select text-black" name="item_id_id" id="item_id">
        <option value="" disabled selected>Select</option>
        @foreach ($items as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
    </div>
    
    <div class="mb-3">
    <label for="total" class="form-label">total</label>
    <input type="number" class="form-control @error('total') is-invalid @endError" name="total" id="total" placeholder="Alat Dapur">
    </div>

    <div class="mb-3">
    <label for="description" class="form-label">Ket.</label>
    <textarea type="text" class="form-control @error('description') is-invalid @endError" name="description" id="borrower_name" placeholder="Alat Dapur"></textarea>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
    

{{-- add modal --}}
<div class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" id="exampleModal" aria-hidden="true">
    <div class="modal-content">
        <div class="modal-dialog">
            <div class="modal-header">
                <h6 class="text-black">Add Category Forms</h6>
                <p>Please fill all the field</p>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @endError" name="name" id="name" placeholder="Alat Dapur">
                </div>

                <div class="mb-3">
                <label for="division_pj" class="form-label">Division PJ</label>
                <select class="form-select text-black" name="division_pj" id="division_pj" placeholder="Alat Dapur">
                    <option value="" disabled selected>Select</option>
                    <option value="Sarpras">Sarpras</option>
                    <option value="Tefa">Tefa</option>
                    <option value="TU">Tata Usaha</option>
                </select>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-mdb-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>

@endsection