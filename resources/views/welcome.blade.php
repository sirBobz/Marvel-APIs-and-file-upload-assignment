@extends('layouts.admin')
@section('styles')

@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-right"><a href="{{ url('') }}"> <i class="fa fa-home"> Home</i></a>
            </div>

        </div>

        <div class="card-body">
            <p>This is a simple Laravel Application demonstrating two things:</p>
            <br>
           <ul>
               <li>1. How to work with an external api with json, in this case displaying data of characters from <a href="https://developer.marvel.com/"> Marvel API. </a></li>
               <li>2. Demonstrates how to upload a large Excel/CSV file into a database.</li>
           </ul>
        </div>
    </div>

@endsection


@section('scripts')

@endsection
