<!DOCTYPE html>
@if(\Illuminate\Support\Facades\App::getLocale() == 'ar')
    <html dir="rtl" lang="ar">
@else
<html lang="en">
@endif
@include('admin.layouts.components.head')
<!--
  HOW TO USE:
  data-theme: default (default), dark, light, colored
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-layout: default (default), compact
-->
<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="compact">
<div class="wrapper">
    @include('admin.layouts.components.sidebar')
    <div class="main">
        @include('admin.layouts.components.header')
        <main class="content">
            <div class="container-fluid p-0">
                @yield('page-header')
                @yield('content')
            </div>
        </main>
        @include('admin.layouts.components.footer')
    </div>
</div>
@include('admin.layouts.components.footer-scripts')
</body>
</html>
