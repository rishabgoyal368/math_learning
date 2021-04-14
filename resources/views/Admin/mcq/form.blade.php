<?php
    if (isset($question_details)) {
        $title = 'Edit';
        $action = url('admin/mcq/edit/' . @$question_details['id']);
    } else {
        $title = 'Add';
        $action = url('admin/mcq/add/');
    }
?>
@extends('Admin.Layout.app')
@section('title', $title.' Question')
@section('content')
<style type="text/css">
    .radio_btn_adj{
        position: absolute;
        right: 4pc;
        top: 0pc;
    }
    .set-pos-radio{
        margin-bottom: 30px;
    }
</style>
<section class="admin-content">
    <div class="bg-dark">
        <div class="container  m-b-30">
            <div class="row">
                <div class="col-12 text-white p-t-40 p-b-90">
                    <h4 class=""> {{ $title }} Question</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="container  pull-up">
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body ">
                        <form method="post" action="{{ $action }}"  id="add_edit_question">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Type</label>
                                    <?php 
                                        if(@$question_details){
                                            $disabled = "disabled";
                                        } else{
                                            $disabled = " ";
                                        }
                                    ?>
                                    <select name="type" class="form-control" {{@$disabled}}>
                                        <option disabled selected>Select Type</option>
                                        <option  value="1" <?php if(@$question_details['type'] == '1'){ echo "selected"; } ?>>Addition</option>
                                        <option  value="2" <?php if(@$question_details['type'] == '2'){ echo "selected"; } ?>>Substruction</option>
                                        <option  value="3" <?php if(@$question_details['type'] == '3'){ echo "selected"; } ?>>Multiplication</option>
                                        <option value="4" <?php if(@$question_details['type'] == '4'){ echo "selected"; } ?>>Division</option>
                                        <option value="5" <?php if(@$question_details['type'] == '5'){ echo "selected"; } ?>>Square Root</option>
                                    </select>
                                    
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Question</label>
                                    <textarea class="form-control" cols="6" rows="6" name="question">{{ @$question_details['question']}}</textarea>
                                </div>
                                <div class="form-group col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="inputEmail4">Option 1</label>
                                            <input type="text" class="form-control" name="option_1" value="{{ @$question_details['option_1']}}">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="inputEmail4">Option 2</label>
                                            <input type="text" class="form-control" name="option_2" value="{{ @$question_details['option_2']}}">
                                        </div>    
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="inputEmail4">Option 3</label>
                                            <input type="text" class="form-control" name="option_3" value="{{ @$question_details['option_3']}}">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="inputEmail4">Option 4</label>
                                            <input type="text" class="form-control" name="option_4" value="{{ @$question_details['option_4']}}">
                                        </div>    
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <h3><b>Correct Option</b></h3>
                                    <div class="row">
                                        <div class="col-sm-4 set-pos-radio">
                                            <label for="inputEmail4">Option 1</label>
                                            <input type="radio" class="form-control radio_btn_adj" name="correct_option" value="option_1" <?php if(@$question_details['correct_option_no'] == 'option_1'){echo "checked";} ?>>
                                        </div>
                                        <div class="col-sm-4 set-pos-radio">
                                            <label for="inputEmail4">Option 2</label>
                                            <input type="radio" class="form-control radio_btn_adj" name="correct_option" value="option_2" <?php if(@$question_details['correct_option_no'] == 'option_2'){echo "checked";} ?>>
                                        </div>    
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 set-pos-radio">
                                            <label for="inputEmail4">Option 3</label>
                                            <input type="radio" class="form-control radio_btn_adj" name="correct_option" value="option_3" <?php if(@$question_details['correct_option_no'] == 'option_3'){echo "checked";} ?>>
                                        </div>
                                        <div class="col-sm-4 set-pos-radio">
                                            <label for="inputEmail4">Option 4</label>
                                            <input type="radio" class="form-control radio_btn_adj" name="correct_option" value="option_4" <?php if(@$question_details['correct_option_no'] == 'option_4'){echo "checked";} ?>>
                                        </div>    
                                    </div>
                                    <label id="correct_option-error" class="error" for="correct_option"></label>
                                </div>
                            </div>   
                            <div class="form-group">
                                <input type="submit" value="Submit" class="btn btn-primary">
                                <a href="{{url('/admin/mcq')}}" class="btn btn-info">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
<script type="text/javascript">
    $('#add_edit_question').validate({
        rules: {
            type:{
                required:true,
            },
            question: {
                required: true,
                minlength: 5,
                maxlength: 1000,
            },
            option_1:{
                required:true,
            },
            option_2:{
                required:true,
            },
            option_3:{
                required:true,
            },
            option_4:{
                required:true,
            },
            correct_option:{
                required:true,
            },
        },
    });
</script>
@endsection