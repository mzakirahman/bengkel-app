@extends('frontend/item/layout')
@section('content')
<style>
    .rating {
  display: inline-block;
  position: relative;
  height: 50px;
  line-height: 50px;
  font-size: 50px;
}

.rating label {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  cursor: pointer;
}

.rating label:last-child {
  position: static;
}

.rating label:nth-child(1) {
  z-index: 5;
}

.rating label:nth-child(2) {
  z-index: 4;
}

.rating label:nth-child(3) {
  z-index: 3;
}

.rating label:nth-child(4) {
  z-index: 2;
}

.rating label:nth-child(5) {
  z-index: 1;
}

.rating label input {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}

.rating label .icon {
  float: left;
  color: transparent;
}

.rating label:last-child .icon {
  color: #000;
}

.rating:not(:hover) label input:checked ~ .icon,
.rating:hover label:hover input ~ .icon {
  color: orange;
}

.rating label input:focus:not(:checked) ~ .icon:last-child {
  color: #000;
  text-shadow: 0 0 5px orange;
}
</style>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table" width="100%">
                        <tr>
                            <th width="20%">Nama Bengkel</th>
                            <td>: {{$data->nm_bengkel}}</td>
                        </tr>
                        <tr>
                            <th>Pemilik</th>
                            <td>: {{$data->pemilik}}</td>
                        </tr>
                        <tr>
                            <th>Kecamatan</th>
                            <td>: {{$data->kec}}</td>
                        </tr>
                        <tr>
                            <th>Desa/Kelurahan</th>
                            <td>: {{$data->kel}}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>: {{$data->alamat}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body" style="overflow-x: scroll">           
                            <div class="row">
                                <div class="col-lg-12">
                                    @if (Session::get('success'))
                                    <div class="alert alert-success" role="alert">
                                        <a data-bs-dismiss="alert"><span aria-bs-hidden="true">&times;</span><span class="sr-only"></span></a>
                                        <strong>Selamat!</strong> {{ Session::get('success') }}
                                    </div>
                                    @endif

                                    @if (Session::get('error'))
                                    <div class="alert alert-danger" role="alert">
                                        <a data-bs-dismiss="alert"><span aria-bs-hidden="true">&times;</span><span class="sr-only"></span></a>
                                        <strong>Maaf!</strong> {{ Session::get('error') }}
                                    </div>
                                    @endif

                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="{{ url('app/ratingAct') }}" method="POST" enctype="multipart/form-data" role="form" class="rating">
                                        @csrf
                                        <input type="hidden" name="bengkel_id" value="{{$data->id}}">
                                        <h3>Penilaian Layanan</h3>
                                        @if(!empty($data->rating))
                                        <p style="font-size: 12px !important;">({{$data->tgl_komentar}})</p>
                                        @endif
                                        <div class="rating">
                                            <label>
                                              <input type="radio" name="rating" @if($data->rating>='1') checked @endif value="1" />
                                              <span class="icon">★</span>
                                            </label>
                                            <label>
                                              <input type="radio" name="rating" @if($data->rating>='2') checked @endif value="2" />
                                              <span class="icon">★</span>
                                              <span class="icon">★</span>
                                            </label>
                                            <label>
                                              <input type="radio" name="rating" @if($data->rating>='3') checked @endif value="3" />
                                              <span class="icon">★</span>
                                              <span class="icon">★</span>
                                              <span class="icon">★</span>   
                                            </label>
                                            <label>
                                              <input type="radio" name="rating" @if($data->rating>='4') checked @endif value="4" />
                                              <span class="icon">★</span>
                                              <span class="icon">★</span>
                                              <span class="icon">★</span>
                                              <span class="icon">★</span>
                                            </label>
                                            <label>
                                              <input type="radio" name="rating" @if($data->rating>='5') checked @endif value="5" />
                                              <span class="icon">★</span>
                                              <span class="icon">★</span>
                                              <span class="icon">★</span>
                                              <span class="icon">★</span>
                                              <span class="icon">★</span>
                                            </label>
                                        </div>
                                        <textarea name="komentar" id="" cols="30" rows="5" placeholder="Komentar...">{{$data->komentar}}</textarea>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <button type="submit" class="btn btn-primary">Kirim</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container -->

@endsection



@push('js')
<script type="text/javascript">
$(':radio').change(function() {
  console.log('New star rating: ' + this.value);
});
    </script>
@endpush