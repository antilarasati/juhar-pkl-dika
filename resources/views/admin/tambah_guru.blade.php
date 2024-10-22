@extends('admin.layouts.app')
@section('title', 'Tambah Guru')
@section('content')
<div class="row g-4">
    <div class="col-12"></div>
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Tambah Guru</h6>
                            <form>
                                @csrf
                                <div class="mb-3">
                                    <label for="nip" class="form-label">NIP</label>
                                    <input type="text" class="form-control" id="nip" name="nip">
                                    <div class="text-denger">
                                        $error('nip')
                                        {{ $message }}
                                        $enderror
                                    </div>
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                    </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="password" class="form-control" id="email" name="email">
                                        $error('email')
                                        {{ $message }}
                                        $enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                        $error('password')
                                        {{ $message }}
                                        $enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Nama Guru</label>
                                    <input type="password" class="form-control" id="nama_guru" name="nama_guru">
                                        $error('nama_guru')
                                        {{ $message }}
                                        $enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Foto</label>
                                    <input type="password" class="form-control" id="foto" name="foto">
                                        $error('foto')
                                        {{ $message }}
                                        $enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                    
                    @endsection