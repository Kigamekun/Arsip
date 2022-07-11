@extends('layouts.base')

@section('content')
    @if (Auth::user()->role == 0)

    @else
        <div class="container">

            <div class="card p-5">
                <form action="{{ route('cari-surat') }}" method="get">
                    <center>
                        <h4>Cari No Surat</h4>
                        <input type="text" name="search" class="form-control" id="search">
                        <br>
                        <button class="btn btn-primary">Submit</button>
                    </center>
                </form>
            </div>
        </div>
    @endif
@endsection
