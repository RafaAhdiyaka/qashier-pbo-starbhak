@extends('layouts.main')
@section('title', 'Activity Log')

@section('content')
<h1 class="text-center mb-4">Activity Log</h1>

<div class="container pt-5">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class='table table-hover' id="table1">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activities as $index => $row)
                            <tr>
                                <th scope="row">{{ $index + $activities->firstItem() }}</th>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->subject }}</td>
                                <td>{{ $row->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $activities->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
@endsection