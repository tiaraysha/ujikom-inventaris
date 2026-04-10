@extends('templates.sidebar')

@section('content')

@if (Session::get('success')) 
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('success') }}
        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::get('error')) 
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ Session::get('error') }}
        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="d-flex justify-content-between m-5">
    <div>
        <h6 class="text-black">Data of Category</h6>
        <p class="text-muted">Add and update Category</p>
    </div>
    <div>
        <button type="button" class="btn btn-success" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#exampleModal">Add</button>
    </div>
</div>

{{-- modal login --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="exampleModal">Login</h5>
                <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="close">
                </button>
            </div>
            
            <form action="{{ route('login') }}" method="POST">
                @csrf
            <div class="modal-body">
                <div class="mb-3">
                <label for="email" class="form-label text-black">email</label>
                <input type="text" id="email" name="email" class="form-control text-black" placeholder="Alat Dapur">
                    @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                <label for="password" class="form-label text-black">password</label>
                <input type="text" id="password" name="password" class="form-control text-black" placeholder="Masukkan password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="modal-footer">
            <button type="submit" class="btn btn-outline-primary">Login</button>
            </form>
            </div>
        </div>
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
                <td>{{$categories->count('item')}}</td>
                <td>
                    <button type="button" class="btn btn-warning" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#editModal{{$cat->id}}">Edit</button>
                </td> 
            </tr>
            {{-- edit tes --}}
            {{-- <form action="{{route('admin.category.update', $cat['id'])}}" method="POST">
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
            
                {{-- Modal Edit --}}
                <div class="modal fade" id="editModal{{$cat->id}}" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-black" id="editModal">Edit Category</h5>
                                <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="close">
                                </button>
                            </div>
                            
                            <form action="{{ route('admin.category.update', $cat['id']) }}" method="POST">
                                @csrf
                                @method('PUT')
                            <div class="modal-body">
                                <div class="mb-3">
                                <label for="name" class="form-label text-black">Name</label>
                                <input type="text" id="name" name="name" class="form-control text-black" placeholder="Alat Dapur" value="{{ old('name', $cat->name)}}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                <label for="division_pj" class="form-label text-black">Division PJ</label>
                                <select name="division_pj" id="division_pj" class="form-control text-black">
                                    <option value="" selected disabled class="hidden text-muted">Select Division PJ</option>
                                    <option value="Sarpras" {{ old('division_pj', $cat->division_pj) == 'Sarpras' ? 'selected' : ''}}>Sarpras</option>
                                    <option value="TU" {{ old('division_pj', $cat->division_pj) == 'TU' ? 'selected' : ''}}>Tata Usaha</option>
                                    <option value="Tefa" {{ old('division_pj', $cat->division_pj) == 'Tefa' ? 'selected' : ''}}>Tefa</option>
                                </select>
                                </div>
                            </div>
                
                            <div class="modal-footer">
                                    <button type="submit" class="btn btn-outline-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
    <label for="division_pj" class="form-label">Division PJ</label>
    <select class="form-select text-black" name="division_pj" id="division_pj" placeholder="Alat Dapur">
        <option value="" disabled selected>Select</option>
        <option value="Sarpras">Sarpras</option>
        <option value="Tefa">Tefa</option>
        <option value="TU">Tata Usaha</option>
    </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>

{{-- add modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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