@extends('admin.layout.app')

@section('title', 'Dashboard')

@section('content')

<div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 text-center p-3">
                        <h3>Hi, {{ Auth::guard('guru')->user()->nama_guru}}</h3>
                    </div>
                </div>


@endsection


