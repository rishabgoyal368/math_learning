 @extends('Admin.Layout.app')
@section('title', 'MCQs')
@section('content')
<style type="text/css">
    .set-question-ui{
        border: 22px solid;
        padding: 18px;  
    }
    .edit-delete-btn-setting{
        float: right;
    }
</style>
<section class="admin-content">
    <div class="bg-dark">
        <div class="container  m-b-30">
            <div class="row">
                <div class="col-10 text-white p-t-40 p-b-90">

                    <h4 class="">
                        MCQs 
                    </h4>
                </div>
                <div class="col-2 text-white p-t-40 p-b-90">
                    <a href="{{ url('admin/mcq/add')}}" class="add_record">Add question</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container  pull-up">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="addition-tab" data-toggle="tab" href="#addition" role="tab" aria-controls="addition" aria-selected="true">Addition</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="substraction-tab" data-toggle="tab" href="#substraction" role="tab" aria-controls="substraction" aria-selected="false">Substraction</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="multiple-tab" data-toggle="tab" href="#multiple" role="tab" aria-controls="multiple" aria-selected="false">Multiplication</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="division-tab" data-toggle="tab" href="#division" role="tab" aria-controls="division" aria-selected="false">Division</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="square_root-tab" data-toggle="tab" href="#square_root" role="tab" aria-controls="square_root" aria-selected="false">Square Root</a>
                            </li>
                        </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="addition" role="tabpanel" aria-labelledby="addition-tab">
                                <div class="table-responsive p-t-10">
                                    @if(!empty($addtion_questions))
                                        @foreach($addtion_questions as $key=>$question)
                                            <div class="form-row set-question-ui">
                                                <div class="form-group col-md-12">
                                                    <h5>
                                                        <label for="inputEmail4">Question {{$key+1}} . </label>  {{ ucfirst($question['question']) }}</h5>
                                                </div>
                                               
                                                <div class="form-group col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <h6>
                                                                <label for="inputEmail4"> 1) </label>
                                                                {{ ucfirst($question['option_1']) }}
                                                            </h6>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <h6>
                                                                <label for="inputEmail4"> 2) </label>
                                                                {{ ucfirst($question['option_2']) }}
                                                            </h6>
                                                        </div>    
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <h6>
                                                                <label for="inputEmail4"> 3) </label>
                                                                {{ ucfirst($question['option_3']) }}
                                                            </h6>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <h6>
                                                                <label for="inputEmail4"> 4) </label>
                                                                {{ ucfirst($question['option_4']) }}
                                                            </h6>
                                                        </div>    
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <?php 
                                                        if($question['correct_option_no'] == 'option_1'){
                                                            $option_no = '1';
                                                        }elseif($question['correct_option_no'] == 'option_2'){
                                                            $option_no = '2';
                                                        }elseif($question['correct_option_no'] == 'option_3'){
                                                            $option_no = '3';
                                                        }elseif($question['correct_option_no'] == 'option_4'){
                                                            $option_no = '4';
                                                        }
                                                    ?>
                                                    <div class="faq_container">
                                                        <div class="faq">
                                                            <div class="">
                                                                <div class="faq_answer">
                                                                    <div class="row">
                                                                        <div class="col-sm-12" style="padding: 25px;">
                                                                            <span class="show_ans" ><h4>Answer</h4>
                                                                                <div class="ful_ansr" style="border-left: 5px solid ">
                                                                                    <span class="" style="margin-left: 15px;">{{ $option_no }}.) {{ ucfirst($question['correct_answer']) }}</span>
                                                                                </div>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>        
                                                        </div>
                                                        <div class="faq_question">
                                                            <buton type="button" class="btn btn-primary show_que view_ans" >Show Answer</buton>
                                                        </div>
                                                    </div>
                                                    <div class="edit-delete-btn-setting">
                                                        <a href="{{ url('admin/mcq/edit/'.$question['id']) }}" title="Edit Question"><i class="fa fa-edit"></i></a>
                                                        <a href="{{ url('admin/mcq/delete/'.$question['id'])}}" class="del_btn" title="Delete Question"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                    <div class="text-center">
                                        <h3><b>No Question Found</b></h3>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="substraction" role="tabpanel" aria-labelledby="substraction-tab">
                                 <div class="table-responsive p-t-10">
                                    @if(!empty($subtract_questions))
                                        @foreach($subtract_questions as $key=>$question)
                                            <div class="form-row set-question-ui">
                                                <div class="form-group col-md-12">
                                                    <h5>
                                                        <label for="inputEmail4">Question {{$key+1}} . </label>  {{ ucfirst($question['question']) }}</h5>
                                                </div>
                                               
                                                <div class="form-group col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <h6>
                                                                <label for="inputEmail4"> 1) </label>
                                                                {{ ucfirst($question['option_1']) }}
                                                            </h6>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <h6>
                                                                <label for="inputEmail4"> 2) </label>
                                                                {{ ucfirst($question['option_2']) }}
                                                            </h6>
                                                        </div>    
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <h6>
                                                                <label for="inputEmail4"> 3) </label>
                                                                {{ ucfirst($question['option_3']) }}
                                                            </h6>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <h6>
                                                                <label for="inputEmail4"> 4) </label>
                                                                {{ ucfirst($question['option_4']) }}
                                                            </h6>
                                                        </div>    
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <?php 
                                                        if($question['correct_option_no'] == 'option_1'){
                                                            $option_no = '1';
                                                        }elseif($question['correct_option_no'] == 'option_2'){
                                                            $option_no = '2';
                                                        }elseif($question['correct_option_no'] == 'option_3'){
                                                            $option_no = '3';
                                                        }elseif($question['correct_option_no'] == 'option_4'){
                                                            $option_no = '4';
                                                        }
                                                    ?>
                                                    <div class="faq_container">
                                                        <div class="faq">
                                                            <div class="">
                                                                <div class="faq_answer">
                                                                    <div class="row">
                                                                        <div class="col-sm-12" style="padding: 25px;">
                                                                            <span class="show_ans" ><h4>Answer</h4>
                                                                                <div class="ful_ansr" style="border-left: 5px solid ">
                                                                                    <span class="" style="margin-left: 15px;">{{ $option_no }}.) {{ ucfirst($question['correct_answer']) }}</span>
                                                                                </div>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>        
                                                        </div>
                                                        <div class="faq_question">
                                                            <buton type="button" class="btn btn-primary show_que view_ans" >Show Answer</buton>
                                                        </div>
                                                    </div>
                                                    <div class="edit-delete-btn-setting">
                                                        <a href="{{ url('admin/mcq/edit/'.$question['id']) }}" title="Edit Question"><i class="fa fa-edit"></i></a>
                                                        <a href="{{ url('admin/mcq/delete/'.$question['id'])}}" class="del_btn" title="Delete Question"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                    <div class="text-center">
                                        <h3><b>No Question Found</b></h3>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="multiple" role="tabpanel" aria-labelledby="multiple-tab">
                                 <div class="table-responsive p-t-10">
                                    @if(!empty($multication_questions))
                                        @foreach($multication_questions as $key=>$question)
                                            <div class="form-row set-question-ui">
                                                <div class="form-group col-md-12">
                                                    <h5>
                                                        <label for="inputEmail4">Question {{$key+1}} . </label>  {{ ucfirst($question['question']) }}</h5>
                                                </div>
                                               
                                                <div class="form-group col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <h6>
                                                                <label for="inputEmail4"> 1) </label>
                                                                {{ ucfirst($question['option_1']) }}
                                                            </h6>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <h6>
                                                                <label for="inputEmail4"> 2) </label>
                                                                {{ ucfirst($question['option_2']) }}
                                                            </h6>
                                                        </div>    
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <h6>
                                                                <label for="inputEmail4"> 3) </label>
                                                                {{ ucfirst($question['option_3']) }}
                                                            </h6>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <h6>
                                                                <label for="inputEmail4"> 4) </label>
                                                                {{ ucfirst($question['option_4']) }}
                                                            </h6>
                                                        </div>    
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <?php 
                                                        if($question['correct_option_no'] == 'option_1'){
                                                            $option_no = '1';
                                                        }elseif($question['correct_option_no'] == 'option_2'){
                                                            $option_no = '2';
                                                        }elseif($question['correct_option_no'] == 'option_3'){
                                                            $option_no = '3';
                                                        }elseif($question['correct_option_no'] == 'option_4'){
                                                            $option_no = '4';
                                                        }
                                                    ?>
                                                    <div class="faq_container">
                                                        <div class="faq">
                                                            <div class="">
                                                                <div class="faq_answer">
                                                                    <div class="row">
                                                                        <div class="col-sm-12" style="padding: 25px;">
                                                                            <span class="show_ans" ><h4>Answer</h4>
                                                                                <div class="ful_ansr" style="border-left: 5px solid ">
                                                                                    <span class="" style="margin-left: 15px;">{{ $option_no }}.) {{ ucfirst($question['correct_answer']) }}</span>
                                                                                </div>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>        
                                                        </div>
                                                        <div class="faq_question">
                                                            <buton type="button" class="btn btn-primary show_que view_ans" >Show Answer</buton>
                                                        </div>
                                                    </div>
                                                    <div class="edit-delete-btn-setting">
                                                        <a href="{{ url('admin/mcq/edit/'.$question['id']) }}" title="Edit Question"><i class="fa fa-edit"></i></a>
                                                        <a href="{{ url('admin/mcq/delete/'.$question['id'])}}" class="del_btn" title="Delete Question"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                    <div class="text-center">
                                        <h3><b>No Question Found</b></h3>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="division" role="tabpanel" aria-labelledby="division-tab">
                                 <div class="table-responsive p-t-10">
                                    @if(!empty($division_questions))
                                        @foreach($division_questions as $key=>$question)
                                            <div class="form-row set-question-ui">
                                                <div class="form-group col-md-12">
                                                    <h5>
                                                        <label for="inputEmail4">Question {{$key+1}} . </label>  {{ ucfirst($question['question']) }}</h5>
                                                </div>
                                               
                                                <div class="form-group col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <h6>
                                                                <label for="inputEmail4"> 1) </label>
                                                                {{ ucfirst($question['option_1']) }}
                                                            </h6>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <h6>
                                                                <label for="inputEmail4"> 2) </label>
                                                                {{ ucfirst($question['option_2']) }}
                                                            </h6>
                                                        </div>    
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <h6>
                                                                <label for="inputEmail4"> 3) </label>
                                                                {{ ucfirst($question['option_3']) }}
                                                            </h6>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <h6>
                                                                <label for="inputEmail4"> 4) </label>
                                                                {{ ucfirst($question['option_4']) }}
                                                            </h6>
                                                        </div>    
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <?php 
                                                        if($question['correct_option_no'] == 'option_1'){
                                                            $option_no = '1';
                                                        }elseif($question['correct_option_no'] == 'option_2'){
                                                            $option_no = '2';
                                                        }elseif($question['correct_option_no'] == 'option_3'){
                                                            $option_no = '3';
                                                        }elseif($question['correct_option_no'] == 'option_4'){
                                                            $option_no = '4';
                                                        }
                                                    ?>
                                                    <div class="faq_container">
                                                        <div class="faq">
                                                            <div class="">
                                                                <div class="faq_answer">
                                                                    <div class="row">
                                                                        <div class="col-sm-12" style="padding: 25px;">
                                                                            <span class="show_ans" ><h4>Answer</h4>
                                                                                <div class="ful_ansr" style="border-left: 5px solid ">
                                                                                    <span class="" style="margin-left: 15px;">{{ $option_no }}.) {{ ucfirst($question['correct_answer']) }}</span>
                                                                                </div>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>        
                                                        </div>
                                                        <div class="faq_question">
                                                            <buton type="button" class="btn btn-primary show_que view_ans" >Show Answer</buton>
                                                        </div>
                                                    </div>
                                                    <div class="edit-delete-btn-setting">
                                                        <a href="{{ url('admin/mcq/edit/'.$question['id']) }}" title="Edit Question"><i class="fa fa-edit"></i></a>
                                                        <a href="{{ url('admin/mcq/edit/'.$question['id'])}}" class="del_btn" title="Delete Question"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                    <div class="text-center">
                                        <h3><b>No Question Found</b></h3>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="square_root" role="tabpanel" aria-labelledby="square_root-tab">
                                 <div class="table-responsive p-t-10">
                                    @if(!empty($square_root_questions))
                                        @foreach($square_root_questions as $key=>$question)
                                            <div class="form-row set-question-ui">
                                                <div class="form-group col-md-12">
                                                    <h5>
                                                        <label for="inputEmail4">Question {{$key+1}} . </label>  {{ ucfirst($question['question']) }}</h5>
                                                </div>
                                               
                                                <div class="form-group col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <h6>
                                                                <label for="inputEmail4"> 1) </label>
                                                                {{ ucfirst($question['option_1']) }}
                                                            </h6>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <h6>
                                                                <label for="inputEmail4"> 2) </label>
                                                                {{ ucfirst($question['option_2']) }}
                                                            </h6>
                                                        </div>    
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <h6>
                                                                <label for="inputEmail4"> 3) </label>
                                                                {{ ucfirst($question['option_3']) }}
                                                            </h6>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <h6>
                                                                <label for="inputEmail4"> 4) </label>
                                                                {{ ucfirst($question['option_4']) }}
                                                            </h6>
                                                        </div>    
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <?php 
                                                        if($question['correct_option_no'] == 'option_1'){
                                                            $option_no = '1';
                                                        }elseif($question['correct_option_no'] == 'option_2'){
                                                            $option_no = '2';
                                                        }elseif($question['correct_option_no'] == 'option_3'){
                                                            $option_no = '3';
                                                        }elseif($question['correct_option_no'] == 'option_4'){
                                                            $option_no = '4';
                                                        }
                                                    ?>
                                                    <div class="faq_container">
                                                        <div class="faq">
                                                            <div class="">
                                                                <div class="faq_answer">
                                                                    <div class="row">
                                                                        <div class="col-sm-12" style="padding: 25px;">
                                                                            <span class="show_ans" ><h4>Answer</h4>
                                                                                <div class="ful_ansr" style="border-left: 5px solid ">
                                                                                    <span class="" style="margin-left: 15px;">{{ $option_no }}.) {{ ucfirst($question['correct_answer']) }}</span>
                                                                                </div>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>        
                                                        </div>
                                                        <div class="faq_question">
                                                            <buton type="button" class="btn btn-primary show_que view_ans" >Show Answer</buton>
                                                        </div>
                                                    </div>
                                                    <div class="edit-delete-btn-setting">
                                                        <a href="{{ url('admin/mcq/edit/'.$question['id']) }}" title="Edit Question"><i class="fa fa-edit"></i></a>
                                                        <a href="{{ url('admin/mcq/delete/'.$question['id'])}}" class="del_btn" title="Delete Question"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                    <div class="text-center">
                                        <h3><b>No Question Found</b></h3>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function() {
        $('.faq').hide();
        $('.view_ans').on('click',function(){
            var ths =$(this);
            var text =$(this).text(); 
            if(text == 'Show Answer'){
                ths.text('Hide Answer');
                ths.closest('.faq_container').find('.faq').slideDown('slow');
            }else{
                ths.closest('.faq_container').find('.faq').slideUp('slow');
                ths.text('Show Answer');
            }
        })
    });
</script>
@endsection()
