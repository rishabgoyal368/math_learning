@extends('Admin.Layout.app')
@section('title',  'MCQs Questions')
@section('content')

<section class="admin-content">
    <div class="bg-dark">
        <div class="container  m-b-30">
            <div class="row">
                <div class="col-10 text-white p-t-40 p-b-90">

                    <h4 class="">
                        MCQ's Questions
                    </h4>
                </div>
                <div class="col-2 text-white p-t-40 p-b-90">
                    <a href="{{url('admin/mcq/add/')}}" class="add_record">Add Question</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container  pull-up">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                  <!--    <div class="row">
                         <div class="col-sm-4">
                            <select class="form-control" name="type" id="type_search">
                                <option value="1">Addition</option>
                                <option value="2">Substraction</option>
                                <option value="3">Multiplication</option>
                                <option value="4">Division</option>
                                <option value="5">Square Root</option>
                            </select>
                         </div>
                            <a href="{{ url('admin/app-setting') }}" class="btn btn-primary">Reset</a>
                     </div> -->
                        <div class="table-responsive p-t-10">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    $(document).on('change','#type_search',function(){
        var ths     = $(this);
        var type_id = $(this).val();
        $.ajax({
            type:'post',
            url:"{{ url('/admin/app-setting/change-type') }}",
            data:{type_id:type_id,'_token':"{{ csrf_token()}}"},
            success:function(resp){
                if(resp.status == 'true'){
                    $('.max_num').text(resp.data.max_number);
                    $('.table_num').text(resp.data.table_number);
                    var id = resp.data.id;
                    var url = "http://127.0.0.1:8000/admin/app-setting/edit/"+id; 
                    $('.edit_row').html('<a href='+url+' title="Edit"><i class="fa fa-edit"></i></a>');
                }else{
                    swal("Error", resp.msg , "warning");
                    
              }
            }
        }); 

    })
</script> -->
@endsection