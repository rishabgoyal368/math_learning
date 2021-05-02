<?php
if (isset($app_setting_details)) {
    $title = 'Edit';
    $action = url('admin/app-setting/edit/' . $app_setting_details['id']);
} else {
    $title = 'Add';
    $action = url('admin/app-setting/add');
}
?>
@extends('Admin.Layout.app')
@section('title', $title.' App Setting')
@section('content')

<section class="admin-content">
    <div class="bg-dark">
        <div class="container  m-b-30">
            <div class="row">
                <div class="col-12 text-white p-t-40 p-b-90">

                    <h4 class=""> {{ $title }} App Setting</h4>

                </div>
            </div>
        </div>
    </div>

    <div class="container  pull-up">
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body ">
                        <form action="{{ $action }}" method="post" id="app_setting_form">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Max Number</label>
                                    <input type="number" class="form-control" name="max_number" value="{{ @$app_setting_details['max_number'] }}" placeholder="Max Number">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Table Number</label>
                                    <input type="number" class="form-control" name="table_number" value="{{ @$app_setting_details['table_number'] }}" placeholder="Table Number">
                                </div>
                            </div>
                            @csrf
                            <div class="form-group">
                                <input type="submit" value="Submit" class="btn btn-primary">
                                <a href="{{'/admin/app-setting'}}" class="btn btn-info">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
<script type="text/javascript">
    $('#app_setting_form').validate({
        rules: {
            table_number: {
                required: true,
            },
            max_number: {
                required: true,
            },
            type:{
                required:true,
            },
        },
    });
</script>
@endsection