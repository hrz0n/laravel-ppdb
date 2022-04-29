
@extends('templates.master')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row mb-4">
                        <h6>Daftar Nilai</h6>
                    </div>

                    <div class="row">
                        <div class="col-md-12"><p>Silahkan isi nilai sesuai dengan nama pelajaran masing-masing!</p></div>
                    </div>

                    <div class="row">
                        <form action="{{route('storePostNilai')}}" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">

                            @foreach($postnilai as $pn)
                                <input type="hidden" name="id[]" value="{{$pn->id}}">
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

                            <table class="table table-bordered table-responsive-sm">
                                <thead>
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Nama Pelajaran</th>
                                    <th colspan="5" class="text-center">Data Nilai</th>
                                </tr>
                                <tr>
                                    <th>Semester 1</th>
                                    <th>Semester 2</th>
                                    <th>Semester 3</th>
                                    <th>Semester 4</th>
                                    <th>Semester 5</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($nilai as $index => $val)
                                    <input type="hidden" name="nilai_id[]" value="{{$val->id}}">
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$val->nilai_name}}</td>
                                        <td><input name="s1[]" class="form-control" type="text" value="{{(isset($postnilai[$index]->score_s1)) ? $postnilai[$index]->score_s1 : 0}}"></td>
                                        <td><input name="s2[]" class="form-control" type="text" value="{{(isset($postnilai[$index]->score_s2)) ? $postnilai[$index]->score_s2 : 0}}"></td>
                                        <td><input name="s3[]" class="form-control" type="text" value="{{(isset($postnilai[$index]->score_s3)) ? $postnilai[$index]->score_s3 : 0}}"></td>
                                        <td><input name="s4[]" class="form-control" type="text" value="{{(isset($postnilai[$index]->score_s4)) ? $postnilai[$index]->score_s4 : 0}}"></td>
                                        <td><input name="s5[]" class="form-control" type="text" value="{{(isset($postnilai[$index]->score_s5)) ? $postnilai[$index]->score_s5 : 0}}"></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="mt-1">
                                <button type="submit" class="btn btn-sm btn-danger me-2 mb-2">
                                    <i class="btn-icon-prepend" data-feather="link"></i>
                                    Simpan Nilai
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
