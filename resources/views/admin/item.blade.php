@extends('templates.sidebar')

@section('content')

<div class="d-flex justify-content-between m-5">
    <div>
        <h6 class="text-black">Data of Items</h6>
        <p class="text-muted">Add and update item</p>
    </div>
    <div>
        <form action="{{route('admin.items.export')}}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-success">Export Excel</button>
        </form>
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
            <th>Repair</th>
            <th>Lending</th>
            <th>Action</th>
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
                <td>
                    <button type="button" class="btn btn-warning">Edit</button>
                </td> 
            </tr>
            {{-- edit tes --}}
            {{-- <form action="{{route('admin.items.update', $item['id'])}}" method="POST">
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
            <button type="submit" class="btn btn-primary">Edit</button>
            </form> --}}
            @endforeach
    </tbody>
</table>

{{-- add tes --}}
<form action="{{route('admin.category.store')}}" method="POST">
        @csrf
<div class="d-flex flex-column m-5">
<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @endError" name="name" id="name" placeholder="Alat Dapur">
    </div>

    <div class="mb-3">
    <label for="category" class="form-label">Category</label>
    <select class="form-select text-black" name="category_id" id="category">
        <option value="" disabled selected>Select</option>
        @foreach ($categories as $cat)
        <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
    </select>
    </div>
    
    <div class="mb-3">
    <label for="total" class="form-label">total</label>
    <input type="text" class="form-control @error('total') is-invalid @endError" name="total" id="total" placeholder="Alat Dapur">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
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