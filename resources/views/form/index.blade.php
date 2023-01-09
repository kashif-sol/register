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
        <h2 class="card-title">Fields in Form</h2>

    </div>
    <div class="card-body">

        <!-- start: page -->
        <button type="button" class="mb-1 mt-1 me-1 btn btn-default btn-lg btn-block addfields" data-toggle="modal" data-target="#addfield">
            Add Fields
          </button>
          <br>
        <table class="table table-bordered table-striped mb-0" id="datatable-editable">
          <thead>
            <tr>
              <th>FIeld Type</th>
              <th>Action</th>
              
            </tr>
          </thead>
          <tbody>
            @foreach($forms as $form)
            <tr >
              <td>{{$form->field_type}}</td>
              <td class="actions">
              <button class="on-default removerow" data-id="{{ $form->id }}" style="border: none;background: none;"><i class="far fa-trash-alt"></i></button>
              </td>
            </tr>
            @endforeach
           
          </tbody>
        </table>
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
                    <input type="hidden" name="form_id" id="form_id">
                            <div class=row>
                                {{-- <label for="titleID" class="form-label">Name:</label> --}}
                                <div class="input-group">
                                <input type="text" id="form_title" name="form_title" class="form-control" placeholder="name" required="" readonly>
                                {{-- <button type="button" class="btn btn-primary addfields" data-toggle="modal" data-target="#addfield">
                                    Launch demo modal
                                  </button> --}}
                                </div>
                            </div>
                            <br>
                           <table  class="table table-striped">
                            <tr>
                                <th scope="col">Field Type </th>
                                <th scope="col"> Action </th>
                            </tr>
                            <tr>
                                <td>hello</td>
                                <td><button class="btn btn-secondary">Edit</button> <button class="btn btn-info">Delete</button> </td>
                            </tr>
                           </table>
                  
                           
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
<div class="modal fade" id="addfield" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add fields to form</h5>
          {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> --}}
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Add Field</label>
                <select class="custom-select form-control btn btn-default dropdown-toggle show" id="edit_approve" name="sellers_permit"  required>

                    
                    
                    {{-- @foreach ($dataa as $data) --}}
                        <option selected>Select Field</option>
                        <option value="input-text" id="input-text">Input('text')</option>
                        <option value="textarea" id="textarea">textarea</option>
                        <option value="image" id="image">Image</option>
                        
                       
                   
                        {{-- <option value="textarea">textarea</option> --}}
                    {{-- @endforeach --}}
                    
                </select>
                <div class="fields"></div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary my-close" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary save-fields">Save</button>
        </div>
      </div>
    </div>
  </div>


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
     $(document).on("click", ".addfields", function() {
     $('#changestatusmodal').hide();
     $('.my-close').click(function() {
            window.location.reload();
        });
     });
</script>
<script>
 $('#edit_approve').on('change', function() {
  $('.modal-body .form-group .fields').empty();
  var value = $(this).val();
  // alert(value);
  if(value=='input-text'){
    $('.modal-body .form-group .fields').append("<br><label>Field label</label><br><br><input type='hidden' name='field_type' id='field_type' value='text' /><input type='text' class='form-control' name='field_label' id='field_label' placeholder='Enter Label' /><br><label>Field Name</label><br><br><input type='text' class='form-control' id='name' name='text' placeholder='Enter Name'/><br><label>Field Placeholder</label><br><br><input type='text'class='form-control' name='placeholder' id='placeholder' placeholder='Enter placeholder'/>")
    
    

  }
  if(value=='textarea'){
    $('.modal-body .form-group .fields').append("<br><label>TextField label</label><br><br><input type='hidden' name='field_type_two' id='field_type_two' value='textarea' /><input type='text' class='form-control' name='textarea_label' id='textarea_label' placeholder='Enter Label' /><br><label>Textfield Name</label><br><br><input type='text' class='form-control' id='textarea_tag' name='textarea' placeholder='Enter textarea name' />")
    
  }
  if(value=='image'){
    $('.modal-body .form-group .fields').append("<br><label>Image label</label><br><br><input type='hidden' name='field_type' id='field_type_three' value='img' /><input type='text' class='form-control' name='image_label' id='image_label' placeholder='Enter Label' /><br><label>Image</label><br><br><input type='text' class='form-control' id='image_tag' name='image' placeholder='Enter name' />")
    
  }
});


</script>
<script>
    $(document).on("click", ".save-fields", function() {
      var field_label = $('#field_label').val();
      var field_type = $('#field_type').val();
      var name = $('#name').val();
      var placeholder = $('#placeholder').val();
      var textarea_label=$('#textarea_label').val();
      var textarea_tag=$('#textarea_tag').val();
      var field_type_two = $('#field_type_two').val();
      var image_label=$('#image_label').val();
      var image_tag=$('#image_tag').val();
      var field_type_three = $('#field_type_three').val();


      console.log(field_label);
      console.log(field_type);
      console.log(name);
      console.log(placeholder);
      console.log(textarea_label);
      console.log(textarea_tag);
      console.log(field_type_two);
      console.log(image_label);
      console.log(image_tag);
      console.log(field_type_three);

      $.ajax({
                url: '{{route("form.save")}}',
                type: 'post',
                data: {
                    "field_type": field_type,
                    "field_lable": field_label,
                    "field_name": name,
                    "field_placeholder":placeholder,
                    "text_area":textarea_tag,
                    "textarea_label":textarea_label,
                    "field_type_two":field_type_two,
                    "image_label":image_label,
                    "image_tag":image_tag,
                    "field_type_three":field_type_three
                    
                },
                success: function(response) {
                    console.log(response);
                  


                  
                    }
                });
            });

  </script>
  <script>
    $(".removerow").click(function() {
            var id = $(this).data("id");
            console.log(id);


            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/form/" + id,
                type: 'DELETE',
                data: {
                    "id": id,
                },

                success: function(response) {
                    console.log(response);
                    window.location.reload();
                }
            });

        });
    </script>

@endsection
