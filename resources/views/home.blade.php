@extends('starter')
@section('judul','Home')

@section('isi')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card mt-5">
                <div class="card-body">
                    <h1>Selamat Datang Ahmad Ridho di aplikasi Peduli Diri</h1>
                    <div class="pull-right">
                        <a class="btn btn-success mb-2" href="{{ url('add') }}"> Create New Catatan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection