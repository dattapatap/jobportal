$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#profileupload').submit(function(e) {
   e.preventDefault();
   let formData = new FormData(this);
   $('#image-input-error').text('');

   $.ajax({
      type:'POST',
    //   url: "{{route('recruiter.profile.upload')}}",
      url: "/recruiter/profile/upload",
      data: formData,
      contentType: false,
      processData: false,
      success: (response) => {
         console.log(response);
         if (response.success) {
           toastr.success(response.success);
           this.reset();
           location.reload();
         }else{
            toastr.warning(response.error);
         }
       },
       error: function(response){
             console.log(response);
            $('#image-input-error').text(response.responseJSON.errors.profile_pic);
       }
   });
});