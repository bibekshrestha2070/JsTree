<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/dist/jstree.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('assets/select2/dist/js/select2.min.js')}}"></script>
<script src = "{{asset('assets/Datatable/datatable.js')}}"></script>
<script>
    $(".select2").select2();

    function notify(type, text) {
        return '<div class="alert alert-' + type + ' alert-dismissible fade show callout" role="alert">\n' +
            '                <span class="alert-text">' + text + '</span>\n' +
            '                <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
            '                  <span aria-hidden="true">×</span>\n' +
            '                </button>\n' +
            '              </div>';

    }
</script>