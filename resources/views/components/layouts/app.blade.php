<!DOCTYPE html>
<html lang="pt-br"  data-topbar-color="dark">
    @include('components.layouts.includes.head')
    <body>
        <div id="wrapper">
            @include('components.layouts.includes.sidebar')

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                @include('components.layouts.includes.top-head')
                <div class="content">
                    {{ $slot }}
                </div>
                @include('components.layouts.includes.footer')
            </div>


            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
        </div>
        @include('components.layouts.includes.endbody')
        @stack('scripts')
        @livewireScripts
    </body>
</html>
