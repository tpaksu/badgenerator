@extends('layouts.app')

@section('content')
<div class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
    <div class="flex items-center justify-center">
        <div class="flex flex-col justify-around px-5">
            <div class="space-y-3 text-lg">
                <h1 class="font-extrabold tracking-tight text-center logo" style="color: #44BE16">
                    <small style="color: #000000; font-weight: 900; font-size: 75%;">BADGE</small>nerator
                </h1>
                @livewire("repository-input")
            </div>
            <div class="my-10 mx-auto text-gray-400">Currently supports <a href="https://github.com/" target="_blank">github.com</a> repositories, others will be
                added soon.</div>
        </div>
    </div>
</div>
<footer class="inset-x-0 bottom-0 p-4 fixed bg-white text-center"><div class="mx-auto text-sm text-gray-600">Copyright ©{{\Carbon\Carbon::now()->year}} Taha PAKSU</div></footer>
@endsection
