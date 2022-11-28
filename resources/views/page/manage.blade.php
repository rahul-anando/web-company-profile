@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                @section('title')
                    Manage Page
                @endsection
                <h4>Manage Page</h4>
            </div>
            <div class="col-sm-6 offset-sm-3">
                <div class="card">
                    <div class="card-header text-danger">
                        <h4>Management Sections : </h4>
                        <h4 class="text-danger">{{ $pages->title }}</h4>
                    </div>

                    <div class="card-body">
                        @if (session()->has('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        {{-- @if ($sections->count()) --}}
                        @forelse ($pages->sections as $section)
                        <div class="section-list">
                            <div class="card">
                                <div class="card-body">
                                    {{-- <div class="d-inline-block mr-3">
                                        <a href="#">
                                            <i class="fa fa-arrow-up" class="text-secondary" width="15"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-arrow-down" class="text-secondary" width="15"></i>
                                        </a>
                                    </div> --}}
                                    {{-- Section {{ $section->index }} - --}}
                                    Section {{ $section->index }} -
                                    <span class="badge badge-warning">{{ $section->name }}</span>

                                    <div class="float-right">
                                        <a href="{{ route('sections.edit', $section->id) }}" class="btn">
                                            <i class="fa fa-edit text-primary" width="15"></i>
                                        </a>
                                        <form action="{{ route('sections.delete', $section->id) }}" onsubmit="return confirm('Yaqin mau dihapus qaqa ? ')"
                                            class="d-inline" method="POST">
                                            @csrf
                                            {{-- @method('DELETE') --}}
                                            <button type="submit" class="btn p-0">
                                                <i class="fa fa-trash text-danger" width="15"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                            <p class="text-center">No Section found</p>
                        @endforelse

                        {{-- @else
                            <p class="text-center">No Section found.</p>
                        @endif --}}

                        {{-- Modal  --}}
                        <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title">Choose Template</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('sections.add') }}" method="GET">
                                            <div class="card">
                                                <input type="hidden" name="page_id" value="{{ $pages->id }}">
                                                {{-- <input type="hidden" name="index" value="{{ $sections }}"> --}}
                                                {{-- <div class="form-group mb-3">
                                                    <label>Template</label>
                                                    <select class="form-control form-control-lg" name="template_id">
                                                        @foreach ( $templates as $template )
                                                        <option value="{{ $template->id }}">{{ $template->blade }}</option>
                                                        @endforeach
                                                    </select>
                                                </div> --}}
                                                <div class="rad_">
                                                    @foreach ( $templates as $template )
                                                    <div class="opt_">
                                                        <input type="radio" name="template_id" value="{{ $template->id }}">
                                                        <div class="tile">
                                                            <img src="https://pelindo.sevenpion.net/common/images/section-variants/Layout%205.jpeg" alt="" class="frame_">
                                                            <label for="template">{{ $template->blade }}</label>
                                                        </div>
                                                    </div>
                                                    {{-- <input type="hidden" name="template_id" value="{{ $template->id }}"> --}}
                                                        {{-- <div class="opt_">
                                                            <input type="radio" name="section_" id="">
                                                            <div class="tile">
                                                                <img src="https://pelindo.sevenpion.net/common/images/section-variants/Layout%205.jpeg" alt="" class="frame_">
                                                                <label for="1">section</label>
                                                            </div> --}}
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit"
                                                        class="btn btn-primary col-4 mb-3">Continue</button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Modal End --}}

                        {{-- Button Add --}}
                        <button type="button" class="btn btn-outline-primary btn-block" data-toggle="modal"
                            data-target="#modalCreate"> <i class="fas fa-plus mr-1"></i> Tambah Section</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
</script>

@endsection
