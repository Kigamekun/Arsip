@extends('layouts.base')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
        integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <style>
        .dropify-wrapper .dropify-message p {
            font-size: 14px;
        }
    </style>


<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="d-flex justify-content-end">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createData">
                    Create surat_keluar
                </button>
            </div>
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>surat_keluar table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-5">
                            <table id="example" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Kode Surat</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No Urut</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tanggal</th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Perihal</th>
                                        <th class="text-secondary opacity-7">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td class="align-middle ">
                                                <span class="text-secondary text-xs ms-3 font-weight-bold">
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#surat_keluar" data-id="{{ $item->id }}">
                                                        {{ $item->kode_surat }}
                                                    </button>
                                                </span>
                                            </td>
                                            <td class="align-middle ">
                                                <span
                                                    class="text-secondary text-xs ms-3 font-weight-bold">{{ $item->no_urut }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item->tanggal }}</span>
                                            </td>

                                            <td class="align-middle">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item->perihal }}</span>
                                            </td>
                                            <td style="width: 20%">

                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#updateData" data-id="{{ $item->id }}"
                                                    data-kepada="{{ $item->kepada }}"

                                                    data-pengirim="{{ $item->pengirim }}"
                                                    data-perihal="{{ $item->perihal }}"
                                                    data-file="{{ url('file/'.$item->file) }}"

                                                    data-url="{{ route('admin.surat_keluar.update', ['id' => $item->id]) }}">
                                                    Update
                                                </button>
                                                <a class="btn btn-danger"
                                                    href="{{ route('admin.surat_keluar.delete', ['id' => $item->id]) }}">Hapus</a>
                                                    <a class="btn btn-warning"
                                                    href="{{ route('admin.surat_keluar.download', ['id' => $item->id]) }}">Download</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="updateData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="updateDataLabel" aria-hidden="true">
        <div class="modal-dialog" id="updateDialog">
            <div id="modal-content" class="modal-content">
                <div class="modal-body">
                    Loading..
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="createData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="createDataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div id="modal-content" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Create surat_keluar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.surat_keluar.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="kepada" class="form-label">kepada</label>
                            <input type="text" class="form-control" id="kepada" name="kepada"
                                placeholder="isi kepada">
                        </div>


                        <div class="mb-3">
                            <label for="pengirim" class="form-label">pengirim</label>
                            <input type="text" class="form-control" id="pengirim" name="pengirim"
                                placeholder="isi pengirim">
                        </div>



                        <div class="mb-3">
                            <label for="perihal" class="form-label">perihal</label>
                            <textarea name="perihal" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>



                        <div class="mb-3">
                            <label for="operator" class="form-label">operator</label>
                            <select name="operator" id="operator" class="form-select">
                                <option value="" selected>Select operator Product</option>
                                @foreach (DB::table('users')->get() as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="file" class="form-label">file</label>
                            <input type="file" class="form-control dropify" id="file" name="file"
                                placeholder="isi file">
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.dropify').dropify();
    </script>




    <script>
        $('#updateData').on('shown.bs.modal', function(e) {
            var html = `

                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Data Karyawaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="${$(e.relatedTarget).data('url')}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                    <div class="mb-3">
                            <label for="kepada" class="form-label">kepada</label>
                            <input type="text" class="form-control" id="kepada" name="kepada"
                                placeholder="isi kepada" value="${$(e.relatedTarget).data('kepada')}">
                        </div>


                        <div class="mb-3">
                            <label for="pengirim" class="form-label">pengirim</label>
                            <input type="text" class="form-control" id="pengirim" name="pengirim"
                                placeholder="isi pengirim" value="${$(e.relatedTarget).data('pengirim')}">
                        </div>



                        <div class="mb-3">
                            <label for="perihal" class="form-label">perihal</label>
                            <textarea name="perihal" id="" cols="30" rows="10" class="form-control">${$(e.relatedTarget).data('perihal')}</textarea>
                        </div>




                        <div class="mb-3">
                            <label for="file" class="form-label">file</label>
                            <input type="file" class="form-control dropify" id="file" data-default-file="${$(e.relatedTarget).data('file')}" name="file"
                                placeholder="isi file">
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                `;

            $('#modal-content').html(html);
            $('.dropify').dropify();

        });
    </script>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
@endsection
