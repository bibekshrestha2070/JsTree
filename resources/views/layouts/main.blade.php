<!DOCTYPE html>
<html>

@include('layouts.main.head')
@stack('styles')
<style>
    .invalid-feedback{
        display: block!important;
    }
    .has-error{
        color: #d92550;

    }
    .has-error .form-control{
        border-color: #d92550;
    }
</style>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

    @include('layouts.main.header')
    <div class="app-main">
    @include('layouts.main.sidebar')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-home icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>@yield('title')
                            <div class="page-title-subheading"></div>
                        </div>
                    </div>
                    <div class="page-title-actions">

                    </div>
                </div>
            </div>
            @yield('content')
        </div>
        @include('layouts.main.footer')
    </div>

    </div>

</div>

@include('layouts.main.scripts')

<script>
    var appUrl = "{{ url('/') }}";
</script>
<script>
    var pgurl = window.location.href;

    $(".app-sidebar__inner ul a").each(function(){

        var a_url = $(this).attr("href");
        if(String(a_url) === String(pgurl)) {
            $(this).addClass("mm-active");
            $(this).closest('li').addClass('mm-active');

        }
    })


</script>
<script>
    function slugify(text)
    {
        return text.toString().toLowerCase()
            .replace(/\s+/g, '-')           // Replace spaces with -
            .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
            .replace(/\-\-+/g, '-')         // Replace multiple - with single -
            .replace(/^-+/, '')             // Trim - from start of text
            .replace(/-+$/, '');            // Trim - from end of text
    }

    $(function(){
        $('body').on('keyup','#name', function(){

            if($('#slug')){
                $('#slug').val(slugify($('#name').val()));
            }

        }) ;
    });



</script>
@stack('scripts')

</body>

</html>