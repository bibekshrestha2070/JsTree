<script>

    $(function () {
        var user_id = "{{isset($user)?$user->id:''}}"
        $.ajax({
            async: true,
            type: "GET",
            url: "{{route('permissions.get')}}",
            data:{user_id:user_id},
            dataType: "json",
            success: function (json) {
                createJSTree(json);
            },

            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });
    /*$('#ajax').jstree({
        'core' : {
            'data' : {
                "url" : "./root.json",
                "dataType" : "json", // needed only if you do not supply JSON headers
                'data' : function (node) {
                  return { 'id' : node.id };
                }
            }
        }
    });*/
    function createJSTree(jsondata) {
        $('#SimpleJSTree').jstree({
            'core': {
                'data': jsondata
            },
            "search": {
                "case_insensitive": true,
                "show_only_matches" : true
            },

            plugins: ["search","checkbox"]
        });
    }
    $(document).on('keyup','#search',function(){
        $('#SimpleJSTree').jstree('search', $(this).val());
    });
</script>