<x-layouts.admin.layout>
    {{-- <x-slot:pageTitle> @yield('pageTitle') </x-slot:pageTitle> --}}

    @yield('content')
    <!-- begin::User Panel-->
    @include('includes.admin.sidebar')
    <!-- end::User Panel-->
    @include('includes.admin.scrolltop')

    @include('includes.admin.scripts')
</x-layouts.layout>
