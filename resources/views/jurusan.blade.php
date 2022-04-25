
@extends('templates.master')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row mb-4">
                        <h6>Jurusan Pilihan Peserta</h6>
                    </div>

                    <div class="row">
                        <div class="col-md-12"><p>Silahkan pilih jurusan, Jurusan bisa lebih dari satu!</p></div>
                    </div>

                    <div class="row">
                        <form action="{{route('storePostJurusan')}}" method="POST">
                            {{csrf_field()}}
                            <h5 class="mt-4">Daftar Jurusan yang tersedia</h5>
                            <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">

                            @foreach($postJurusan as $pj)
                                <input type="hidden" name="id[]" value="{{$pj->id}}">
                            @endforeach

                            @if (session('error') === '')
                                <div class="mt-2 alert alert-success">
                                    <i class="link-icon" data-feather="check-circle"></i> Berhasil menyimpan data!
                                </div>
                            @elseif(session('error') == 1)
                                <div class="mt-2 alert alert-danger">
                                    <i class="link-icon" data-feather="alert-circle"></i> Gagal saat mencoba menyimpan data, silahkan coba kembali!
                                </div>
                            @endif

                            @for($x=0; $x <3; $x++)
                                <div class="mb-3 mt-4">
                                    <label for="jurusan" class="form-label text-muted">Jurusan {{$x+1}}<span class="text-danger">*</span></label>
                                    <select class="form-control" name="jurusan[]">
                                        <option value="0">Pilih Jurusan</option>
                                        @php
                                            $selectedID = "";
                                            if(!empty($postJurusan) && count($postJurusan) > $x){
                                                $selectedID = $postJurusan[$x]['jurusan_id'];
                                            }
                                        @endphp

                                        @foreach($jurusan as $datajurusan)
                                            <option value="{{$datajurusan->id}}" {{$datajurusan->id == $selectedID ? 'selected=true':''}}>{{$datajurusan->jurusan_name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            @endfor





                            <div class="mt-1">
                                <button type="submit" class="btn btn-sm btn-danger me-2 mb-2">
                                    <i class="btn-icon-prepend" data-feather="link"></i>
                                    Simpan Jurusan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
