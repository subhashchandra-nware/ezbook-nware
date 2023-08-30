<x-layouts.layout>
    {{-- <x-slot:pageTitle> @yield('pageTitle') </x-slot:pageTitle> --}}

    @yield('content')
    <!-- begin::User Panel-->
    @include('includes.sidebar')
    <!-- end::User Panel-->
    @include('includes.scrolltop')
    {{-- @include('includes.demopanel') --}}
    {{-- @include('includes.modal') --}}
    @include('includes.scripts')
</x-layouts.layout>
