@extends('starter')
@section('judul','Home')

@section('isi')

<div class="row">
    <div class="col-12">
    <div class="col-lg-12 margin-tb">
        <a class="btn btn-primary" href="{{ url('/user') }}"> Back</a>
    </div>
        <div class="card bg-white shadow p-3">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf      
                <div class="form-group">
                        <label class="form-label">Tanggal</label>
                        <input type="text" name=""  class="form-control" aria-describedby="emailHelp">
                </div>
                    <div class="form-group">
                        <label class="form-label">Waktu</label>
                        <input type="text" name=""  class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Lokasi</label>
                        <input type="text" name=""  class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Suhu</label>
                        <input type="text" name=""  class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                </div>       
            </form>
        </div>
    </div>
</div>

@endsection