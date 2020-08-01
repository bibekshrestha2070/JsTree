
    $(function () {


        $.ajax({
            async: true,
            type: "GET",
            url:  appUrl+'/permissions/get-permissions',
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

function createJSTree(jsondata) {
    alert(jsondata)
    $('#SimpleJSTree').jstree({
        'core': {
            'data': jsondata
        }
    });
}
