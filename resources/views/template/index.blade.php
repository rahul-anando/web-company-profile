@extends('layouts.admin')
@section('content')

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    @section('title')
                        Management Templates
                    @endsection
                    <h4>Management Templates</h4>
                </div>
                <div class="card-body">
                    {{-- <a href="{{ route('templates.create') }}" class="btn btn-primary float-right mb-3">Tambah Data</a> --}}
                    {{-- <button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal"
                        data-target="#myModal">Tambah Data</button> --}}
                    <button class="btn btn-primary float-right mb-3" id="btn-tambah " onclick="tambah()">Tambah
                        Data</button>
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tr>
                                <th>No</th>
                                <th>Blade</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            @php $no = 1; @endphp
                            @foreach ($templates as $template)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $template->blade }}</td>
                                    <td><img src="{{ asset('uploads/' . $template->image) }}" alt=""
                                            style="width: 60px"></td>
                                    <td class="d-flex">
                                        {{-- <a class="btn btn-outline-success mr-2"
                                            href="{{ route('templates.edit', $template->id) }}">Edit</a> --}}

                                        <button class="btn btn-outline-success mr-2" id="btn-tambah "
                                            onclick="edit()">Edit</button>

                                        <form action="{{ route('templates.delete', $template->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger" type="submit"
                                                onclick="return confirm('Yakin mau dihapus qaqa?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>

                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div class="card-footer text-right">
                    <nav class="d-inline-block">
                        <ul class="pagination mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1"><i
                                        class="fas fa-chevron-left"></i></a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1 <span
                                        class="sr-only">(current)</span></a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="page">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function tambah() {
        $.get("{{ route('templates.create') }}", {}, function(data, status) {
            $("#exampleModalLabel").html('Add Templates');
            $("#page").html(data);
            $("#exampleModal").modal('show');
        });
    }
    function edit() {
        $.get("{{ route('templates.edit', $template->id) }}", {}, function(data, status) {
            $("#exampleModalLabel").html('Edit Templates');
            $("#page").html(data);
            $("#exampleModal").modal('show');
        });
    }
</script>
@endsection
