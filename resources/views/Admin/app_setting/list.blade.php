@extends('Admin.Layout.app')
@section('title', 'App Setting')
@section('content')

<section class="admin-content">
    <div class="bg-dark">
        <div class="container  m-b-30">
            <div class="row">
                <div class="col-10 text-white p-t-40 p-b-90">

                    <h4 class="">
                        App Setting
                    </h4>
                </div>
                @if(empty($app_setting))
                <div class="col-2 text-white p-t-40 p-b-90">
                    <a href="{{url('admin/app-setting/add/')}}" class="add_record">Add App Setting</a>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="container  pull-up">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                     <div class="row">
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
                     </div>
                        <div class="table-responsive p-t-10">
                            <table id="example" class="table " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Max Number</th>
                                        <th>Table Number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($app_setting))
                                        <tr>
                                            <td class="max_num">{{ ucfirst($app_setting['max_number']) }}</td>
                                            <td class="table_num"> {{ ucfirst($app_setting['table_number']) }}</td>
                                            <td class="edit_row">
                                                <a href="{{ url('admin/app-setting/edit/'.$app_setting['id']) }}" title="Edit"><i class="fa fa-edit"></i></a>
                                            </td>
                                        </tr>
                                      
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
</script>
@endsection