@extends('layouts.base')


@section('content')
    <div class="container">
        <div class="card p-5">
            <center>
                <h5> Yeay Surat dengan kode <b>{{ $data->kode_surat }}</b> tersedia ! silahkan unduh file dengan menekan
                    tombol dibawah ini
                </h5>
            </center>
            <br>
            <br>

            <a class="btn btn-warning" href="{{ route('admin.surat_masuk.download', ['id' => $data->id]) }}">Download</a>

        </div>
    </div>
@endsection
