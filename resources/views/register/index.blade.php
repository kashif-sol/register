@extends('website')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>

@section('content')
<section role="main" class="content-body content-body-modern mt-0">
<div class="card card-modern card-modern-table-over-header">
    <div class="card-header">
        <div class="card-actions">
            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
        </div>
        <h2 class="card-title">All Registrations</h2>

    </div>
    <div class="card-body">

        <!-- start: page -->
        <table class="table table-ecommerce-simple table-borderless table-striped mb-0"
            id="datatable-ecommerce-list" >

            <thead>
                <tr>
                    <th >ID</th>
                    <th >Name</th>
                    <th >Email</th>
                    {{-- <th >Phone</th>
                    <th >Tax</th> --}}
                    <th >Seller's Permit</th>
                    <th >Action Approve</th>
                    {{-- <th >City</th>
                    <th >Company Name</th>
                    <th >password</th>
                    <th >Confirm Password</th> --}}
                    {{--<th width="28%"></th>
                    <th width="28%"></th> --}}

                </tr>
            </thead>
            <tbody>
                @foreach ($registers as $register)
                    <tr>
                        <td>{{ $register->id }}</td>
                        <td>{{ $register->name}}</td>
                        <td>{{ $register->email }}</td>
                        {{-- <td>{{ $register->phone }}</td>
                        <td>{{ $register->tax }}</td> --}}
                        <td>{{ $register->sellers_permit }}</td>
                        <td><button type="button" class="btn btn-primary btn-sm button"
                            onclick="changestatus({{$register->id}})">Change
                        Status</button></td>
                        {{-- <td>{{ $register->city }}</td>
                        <td>{{ $register->company_name }}</td>
                        <td>{{ $register->password }}</td>
                        <td>{{ $register->confirm_password }}</td> --}}
                        

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade prod bd-example-modal-lg" id="changestatusmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Staus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form >
                  
                            <div class="alert alert-danger print-error-msg" style="display:none">
                                <ul></ul>
                            </div>
                    <input type="hidden" name="id" id="edit_id">
                            <div class="mb-3">
                                <label for="titleID" class="form-label">Name:</label>
                                <input type="text" id="edit_name" name="name" class="form-control" placeholder="name" required="" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="titleID" class="form-label">Email:</label>
                                <input type="text" id="edit_email" name="customer_email" class="form-control" placeholder="customer_email" required="" readonly>
                            </div>
                  
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Change Status</label>
                                <select class="custom-select my-1 mr-sm-2" id="edit_approve" name="sellers_permit"  required>
    
                                    
                                    
                                    {{-- @foreach ($dataa as $data) --}}
                                        <option value="A" >Approved</option>
                                        <option value="P">Pending</option>
                                    {{-- @endforeach --}}
                                    
                                </select>
                            </div>
                            <div class="mb-3">
                               <input type="hidden" name="id" value="" id="edit_id">
                            </div>
                     
                            <div class="mb-3 text-center">
                                <button class="btn btn-success btn-edit" style="margin-top: 81px">Submit</button>
                            </div>
                    
                        </form>
                      </div>
                    </div>
                  </div>
            </div>
</section>

<script>

     function changestatus(id_data) {
        $('#changestatusmodal').modal('show');
        var id = id_data;
console.log(id);
$.ajax({
       type:'GET',
       url:"{{ route('register.edit') }}",
       data:{id:id},
       success:function(data){
            if($.isEmptyObject(data.error)){
                console.log(data);
                // location.reload();
                $('#edit_id').append().val(data.id);
                $('#edit_email').append().val(data.email);
                $('#edit_name').append().val(data.name);
                $('#edit_approve').append().val(data.sellers_permit);
            }else{
                printErrorMsg(data.error);
            }
       }
    });
    
    


    }
</script>
<script>
     $(".btn-edit").click(function(e){
    
    e.preventDefault();
    var id = $("#edit_id").val();
    var email = $("#edit_email").val();
    var name = $("#edit_name").val();
    var sellers_permit = $("#edit_approve").val();
//  console.log(customer_email);
    $.ajax({
       type:'POST',
       url:"{{ route('register.update') }}",
       data:{id:id,email:email, name:name,sellers_permit:sellers_permit},
       headers: {'XSRF-TOKEN': $('meta[name="_token"]').attr('content')},
       success:function(data){
        console.log(data);
            if($.isEmptyObject(data)){
                console.log(data);
                location.reload();
            }else{
                printErrorMsg(data.error);
            }
       }
    });

});
</script>
@endsection