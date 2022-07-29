@extends('starter')
@section('judul','Home')

@section('isi')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center">Catatan Perjalanan</h1>

                    @if($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                    @endif

                    <!-- table -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Lokasi</th>
                                <th scope="col">Suhu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataMurid as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->waktu }}</td>
                                <td>{{ $item->lokasi }}</td>
                                <td>{{ $item->suhu }}</td>
                            </tr>
                                                        
                            @endforeach
                        </tbody>
                        
                    </table>
                    <a href="{{ url('create') }}" class="btn btn-success">Isi Catatan Perjalanan</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection