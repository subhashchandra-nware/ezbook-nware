<!-- resources/views/components/layouts/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
@include('includes.head')

<body id="kt_body" class="header-fixed header-mobile-fixed header-bottom-enabled page-loading">
    {{ $slot }}
</body>

</html>
