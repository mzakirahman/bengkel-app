<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="brand" data-topbar-color="light">

<head>
    @include('backend/item/css')
</head>

<body class="bg-primary d-flex justify-content-center align-items-center min-vh-100 p-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-md-5">
                <div class="card">
                    <div class="card-body p-4">

                        <div class="text-center w-75 mx-auto auth-logo mb-4">
                            <a href="index.html" class="logo-dark">
                                <span><img src="{{ asset('assets/logo.png') }}" alt="" height="70"></span>
                            </a>

                            <a href="index.html" class="logo-light">
                                <span><img src="{{ asset('assets/logo.png') }}" alt="" height="70"></span>
                            </a>
                        </div>
                        <p align="center">{{ master()->judul }}</p>

                        <form action="{{ url('regisAct') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <label for="" class="form-label">Nama Lengkap</label>
                                        <input type="text" name="nama" class="form-control" placeholder="Ketik..." required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <label for="" class="form-label">No. HP</label>
                                        <input type="text" name="hp" class="form-control" placeholder="Ketik..." required>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <label for="" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Ketik..." required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Ketik..." required>
                                    </div>
                                </di>
                            </div>
    
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <label class="form-label">Kecamatan</label>
                                        <select name="kec_id" id="kec_id" class="form-select" required>
                                            <option value="">Pilih Kecamatan</option>
                                            @foreach ($kec as $h)
                                            <option value="{{ $h->id }}">{{ $h->kec }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <label class="form-label">Desa/Kelurahan</label>
                                        <select name="kel_id" id="kel_id" class="form-select" required>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <label for="" class="form-label">Alamat</label>
                                        <textarea type="text" name="alamat" class="form-control" placeholder="Ketik..." required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <label class="form-label">Gambar</label>
                                        <input type="file" name="gambar" class="form-control" placeholder="Ketik...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p>Sudah punya akun? <a href="{{ url('auth') }}" class=" font-weight-medium ms-1">Login</a></p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>

    @include('backend/item/js')
    @push('js')
<script>
    
    $(document).ready(function(){
        $("#kec_id").change(function(event){
                var id = $(this).val();
                if(id!=''){
                    id = $(this).val();
                }else{
                    id = 0;
                }
                div ='';  
                $.getJSON("{{ url('kel') }}/"+id, function(jsonData){
                    
                        $.each(jsonData, function(i,opt){ 
                            div += '<option value="'+opt.id+'">'+opt.kel+'</option>';
                                
                        });
                        $("#kel_id").html(div);
                    
                });
            
        });  
    });


</script>


</body>

</html>