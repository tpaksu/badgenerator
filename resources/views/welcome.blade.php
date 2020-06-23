@extends('layouts.app')

@section('content')
<style>
    html {
        font-size: 12px;
        font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }
</style>
<div class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
    <div class="flex items-center justify-center">
        <div class="flex flex-col justify-around">
            <div class="space-y-3 text-lg">
                <h1 class="font-extrabold tracking-tight text-center" style="font-size: 80px; color: #44BE16">
                    <small style="color: #000000; font-weight: 900; font-size: 60px;">BADGE</small>nerator
                </h1>
                @livewire("repository-input")
            </div>
            <br>
            <div class="mx-auto text-gray-400">Currently supports <a href="https://github.com/" target="_blank">github.com</a> repositories, others will be
                added soon.</div>
        </div>
    </div>
</div>
@endsection
