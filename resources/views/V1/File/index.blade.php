@extends('layouts.admin')
@section('styles')

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
            <form role="form" method="POST" action="{{ route('files.store') }}"
            enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="row">
              <div class="col-md-6">
                  <div class="input-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroupFileAddon01"></span>
                      </div>
                      <div class="custom-file">
                          <input type="file" required="required"
                                 title="Please upload a CSV file with phone_number amount" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                 name="import_file" class="custom-file-input" id="import_file">
                          <label class="custom-file-label" for="import_file">Upload file</label>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-2">
                  <input type="submit" class="btn btn-primary px-4" value="Submit">
              </div>
          </div>
      </form>
        </div>
    </div>

@endsection


@section('scripts')

@endsection
