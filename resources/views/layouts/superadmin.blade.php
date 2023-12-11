<x-layouts.superadmin.layout>
    {{-- <x-slot:pageTitle> @yield('pageTitle') </x-slot:pageTitle> --}}

    @yield('content')
    <!-- begin::User Panel-->
    @include('includes.superadmin.sidebar')
    <!-- end::User Panel-->
    @include('includes.superadmin.scrolltop')

    @include('includes.superadmin.scripts')
</x-layouts.layout>
