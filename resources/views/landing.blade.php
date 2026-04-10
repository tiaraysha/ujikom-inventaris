<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventaris</title>

    <link rel="stylesheet" href="/assets/Bootstrap/css/mdb.min.css">
</head>
<body>

 <button type="submit" class="btn outline-primary">Login</button>

<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="mb-3">
    <label for="email" class="form-label text-black">email</label>
    <input type="text" id="email" name="email" class="form-control text-black" placeholder="Email">
        @error('email')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="mb-3">
    <label for="password" class="form-label text-black">password</label>
    <input type="password" id="password" name="password" class="form-control text-black" placeholder="Masukkan password">
        @error('password')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

<button type="submit" class="btn btn-outline-primary">Login</button>
</form>

<script src="{{  asset('/assets/Bootstrap/js/mdb.umd.min.js.map') }}"></script>

</body>
</html>