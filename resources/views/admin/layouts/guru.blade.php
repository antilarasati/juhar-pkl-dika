@extends('admin.layouts.app')
@section('title','Guru')
@section('content') 

<div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Data Guru</h6>
                            <div class="table-responsive">
                                <a href="{{route('admin.guru.create')}}"></a>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">NIP</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Nama_Guru</th>
                                            <th scope="col">ftp_set_option</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($gurus as $guru)
                                        <tr>
                                            <th scope="row">{{ $loop->interation }}</th>
                                            <td>
                                                
                                                <img src="('')" alt="">
                                                <a href="" class=""btn btn->></a>
                                            </td>
                                        </tr>
                                        $endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                