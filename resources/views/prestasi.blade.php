
@extends('templates.master')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row mb-4">
                        <h6>Daftar Prestasi</h6>
                    </div>

                    <div class="row">
                        <div class="col-md-12"><p>Silahkan isi prestasi berdasarkan nama dan tingkat jika ada!</p></div>
                    </div>

                    <div class="row">
                        <form action="{{route('storePrestasi')}}" method="POST">
                            {{csrf_field()}}
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

                            @php
                                $strPrestasi = isset($prestasi[$x]) ? $prestasi[$x]->prestasi:'';
                                $strTingkat = isset($prestasi[$x]) ? $prestasi[$x]->tingkat:'';
                            @endphp
                                <div class="mb-3 mt-4">
                                    <input type="hidden" name="id[]" value="{{$prestasi[$x]->id??0}}">
                                    <label for="prestasi" class="form-label text-muted">Prestasi {{$x+1}}</label>
                                    <div class="row mb-3">
                                        <div class="col-sm-5">
                                            <input name="prestasi[]" type="text" class="form-control" value="{{$strPrestasi}}">
                                        </div>

                                        <div class="col-sm-7">
                                            <select class="form-control" name="tingkat[]">
                                                <option value="0">Pilih Tingkat</option>
                                                @php
                                                    $optTingkat = [
                                                        'Tingkat Nasional',
                                                        'Tingkat Provinsi',
                                                        'Tingkat Kabupaten'
                                                    ];
                                                @endphp
                                                @for ($opt=0; $opt < count($optTingkat); $opt++)
                                                    <option value="{{$optTingkat[$opt]}}" {{$optTingkat[$opt] == $strTingkat ? 'selected=true' : ''}}>{{$optTingkat[$opt]}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                            @endfor

                            <div class="mt-1">
                                <button type="submit" class="btn btn-sm btn-danger me-2 mb-2">
                                    <i class="btn-icon-prepend" data-feather="link"></i>
                                    Simpan Semua Prestasi
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
