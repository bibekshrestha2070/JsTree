@extends('layouts.main')
@section('title', 'Add User')
@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card notify">
                <div class="card-body">

                    {!!Form::open(array('route'=>'store.user','class' => 'form-horizontal form-left'))!!}

                    @include('User::form')
                    <input class="mt-1 btn btn-primary btn-submit" type="submit" value="Submit">
                    {!!Form::close()!!}
                </div>
            </div>
        </div>

    </div>

@endsection



@push('scripts')
    @include('layouts.main.common-script-js-tree')
    <script type="text/javascript">
        $(document).on('submit','.form-horizontal',function(e) {


            e.preventDefault();
            var form = $(this);

            var doing = false;
            form.find('.btn-submit').val('Sending...');
            form.find('.btn-submit').attr('disabled', true);

            form.find('.has-error').removeClass('has-error');
            form.find('div.invalid-feedback').remove();
            form.find('.callout').remove();

            var formData = form.serializeArray();
            var formAction = form.attr('action');
            var selectedElmsIds = [];
            var selectedElms = $('#SimpleJSTree').jstree("get_selected", true);

            $.each(selectedElms, function() {
                if(this.parent != '#'){
                    selectedElmsIds.push(this.id);
                }

            });
            formData.push({name: 'permissions',value:selectedElmsIds});
            if (doing == false) {
                doing = true;

                $.ajax({
                    url: formAction,
                    type: 'POST',
                    data: formData,
                    dataType: 'json'
                })
                    .done(function (response) {
                        if (response.status == 0) {

                            $.each(response.data.errors, function (i, v) {
                                $('.form-left').find('#' + i).after('<div class="invalid-feedback">' + v + '</div>').closest('.form-group').addClass('has-error');
                            });

                        }

                        if (response.status == 1) {
                            $('.notify').before(notify('success', response.data.message));
                            setTimeout(function () {
                                $('.callout').remove()
                            }, 2500);
                            window.location.href = appUrl+'/users';
                        } //success
                    })
                    .fail(function () {
                        $('.notify').before(notify('danger', 'Something went wrong'));
                        setTimeout(function () {

                            $('.callout').remove()
                        }, 2500);
                    })
                    .always(function () {
                        doing = false;
                        form.find('.btn-submit').removeAttr('disabled');
                        form.find('.btn-submit').val('Submit');
                    });
            }

        });
    </script>
@endpush


