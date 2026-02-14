@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="h-96 flex items-center justify-center bg-green-100">
    <div class="text-center">
        <h1 class="text-4xl font-bold text-green-900 mb-4">Selamat Datang di Greenhouse</h1>
        <p class="mb-6">Solusi pertanian modern untuk hasil maksimal.</p>
        <a onclick="comingSoon()"
           class="bg-green-600 text-white px-6 py-2 rounded shadow hover:bg-green-700 ">
            Leets GoIt
        </a>
    </div>
</div>
@endsection