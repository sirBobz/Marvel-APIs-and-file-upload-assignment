@extends('layouts.admin')
@section('styles')
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
@livewireStyles
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="float-right"><a href="{{ url('') }}"> <i class="fa fa-home"> Home</i></a> <i
                class="fa fa-angle-right" aria-hidden="true"></i> <i class="fa fa-file"> File upload</i>
        </div>

    </div>

    <div class="card-body">
        @if ($errors->count() > 0)
        <div class="alert alert-danger">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Trigger the file upload modal with a button -->
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#fileUploadModal"><i
                class="fa fa-upload" aria-hidden="true"></i> Upload
            file</button>

        <!-- Modal -->
        <div class="modal fade" id="fileUploadModal" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Please upload the Excel file</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <br>
                            @livewire('import')
                        <br><br>
                    </div>

                </div>

            </div>
        </div>

        <div class="table-responsive">
            {!! $dataTable->table(['class' => 'table table-bordered table-striped table-hover']) !!}
        </div>
    </div>
</div>

@endsection


@section('scripts')


<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>

<script src="/js/buttons.server-side.js"></script>
@livewireScripts

{!! $dataTable->scripts() !!}
@endsection
