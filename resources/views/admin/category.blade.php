@extends('templates.sidebar')

@section('content')

<div class="d-flex justify-content-between m-5">
    <div>
        <h6 class="text-black">Data of Category</h6>
        <p class="text-muted">Add and update Category</p>
    </div>
    <div>
        <button type="button" class="btn btn-success" data-mdb-ripple-init data-mdb-modal data-mdb-target="#exampleModal">Add</button>
    </div>
</div>
    
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Division PJ</th>
            <th>Total Item</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($categories as $index => $cat)
        <tr>
                <td>{{$index +1}}</td>
                <td>{{$cat->name}}</td>
                <td>{{$cat->division_pj}}</td>
                <td></td>
                <td>
                    <button type="button" class="btn btn-warning">Edit</button>
                </td> 
            </tr>
            {{-- edit tes --}}
            {{-- <form action="{{route('category.update', $cat['id'])}}" method="POST">
                    @csrf
                    @method('PUT')
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
                
                <button type="submit" class="btn btn-primary">Edit</button>
                </form> --}}
            @endforeach
    </tbody>
</table>

{{-- add tes --}}
{{-- <form action="{{route('category.store')}}" method="POST">
        @csrf
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
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form> --}}

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