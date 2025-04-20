<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Application</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    .active{
        font-weight: 500;
    }
</style>

</head>

<body>

    {{-- Navbar --}}
    @include('custom-nav')


    {{-- Main content --}}
    <div class="container">
        <h1>Customer Form Edit</h1>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{route("customer.update",$user->id)}}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" value="{{$user->name}}" class="form-control" name="name" placeholder="Customer name">
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" value="{{$user->email}}" class="form-control" id="email" name="email" placeholder="name@example.com">
                <span id="liveEmail"></span>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" value="{{$user->address}}" class="form-control" name="address" placeholder="Address">
                @error('address')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" id="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
    <!-- Bootstrap 5.3 JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
</html>
