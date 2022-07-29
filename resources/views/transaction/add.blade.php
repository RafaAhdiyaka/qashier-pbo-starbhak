@extends('layout.voler')

@section('title', 'Tambah Transaksi')

@section('content')

<div class="container">
    <h1 class="text-center mb-4">Transaksi</h1>
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body" style="width: 90%;">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            <input type="text" name="kategori" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('kategori')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection