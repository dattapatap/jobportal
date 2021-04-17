$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('select2').select2();


    $('#empskills,#empaudits, #emporgs').select2({
        placeholder: "Select an option",
        allowClear: true
    })

    $("#passingyear").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
    });


    $('.editPersonal').click(function(e){
        e.preventDefault();
        var profileId = $(this).attr('id');
        $.ajax({
            url: '/employee/profile/editprofile/'+profileId,
            type: "GET",
            success: function(response) {
                console.log(response);
                if(response) {
                    $('#first_name').val(response.first_name);
                    $('#last_name').val(response.last_name);
                    $('#dob').val(response.dob);
                    $('#gender option[value="' + response.gender + '"]').prop('selected', true);
                    $('#email').val(response.email);
                    $('#mobile').val(response.mobile);
                    $('#address').val(response.address);
                    $("#emp_id").val(response.id);
                    $(".btn-saveprofile").val('Update');
                    $('#personalDetails').modal('show');
                }
            },
            error:function(error){
                console.log(error);
            }
        });
    });
    $('.frmProfile').submit(function(e){
        e.preventDefault();
        let formData = $(this).serializeArray();
        $(".invalid-feedback").children("strong").text("");
        $(".frmProfile input").removeClass("is-invalid");
        $.ajax({
                url: "/employee/profile/updateprofile",
                type:'POST',
                data: formData,
                success: function(data) {
                    console.log(data);
                    if(data.code == 200) {
                        $('.frmProfile')[0].reset();
                        toastr.success(data.message);
                        $('#personalDetails').modal('hide');
                        location.reload();
                    }else{
                        if(data.code ==203){
                            toastr.warning(data.message);
                        }else{
                            toastr.warning(data.message);
                        }
                    }
                },
                error: (response) => {
                    console.log(response);
                    if(response.status === 422) {
                        let errors = response.responseJSON.errors;
                        Object.keys(errors).forEach(function (key) {
                            console.log(key);
                            $("#" + key + "Input").addClass("is-invalid");
                            $("#" + key + "Error").children("strong").text(errors[key][0]);
                        });
                    }
                    else {
                        window.location.reload();
                    }
                }
        });

    })

    $('.btn-addCareer').click(function(){
        $('#careerDetails').modal('show');
    });
    $('.frmcareerdetail').submit(function(e){
        e.preventDefault();
        let formData = $(this).serializeArray();
        $(".invalid-feedback").children("strong").text("");
        $(".frmcareerdetail input").removeClass("is-invalid");
        $.ajax({
                url: "/employee/profile/addCareer",
                type:'POST',
                data: formData,
                success: function(data) {
                    console.log(data);
                    if(data.code == 200) {
                        $('.frmProfile')[0].reset();
                        toastr.success(data.message);
                        $('#careerDetails').modal('hide');
                        location.reload();
                    }else{
                        if(data.code ==203){
                            toastr.warning(data.message);
                        }else{
                            toastr.warning(data.message);
                        }
                    }
                },
                error: (response) => {
                    console.log(response);
                    if(response.status === 422) {
                        let errors = response.responseJSON.errors;
                        Object.keys(errors).forEach(function (key) {
                            console.log(key);
                            $("#" + key + "Input").addClass("is-invalid");
                            $("#" + key + "Error").children("strong").text(errors[key][0]);
                        });
                    }
                }
        });

    })

    $('.editCareer').click(function(e){
        e.preventDefault();
        var CareerId = $(this).attr('id');
        $.ajax({
            url: '/employee/profile/editCareer/'+CareerId,
            type: "GET",
            success: function(response) {
                console.log(response);
                if(response.status) {
                    var data = response.data;
                    $('#industry').val(data.industry).trigger('change');
                    $('#position').val(data.position).trigger('change');
                    $('#jobtype').val(data.job_type).trigger('change');
                    $('#year').val(data.experience_year);
                    $('#month').val(data.experience_month);
                    $('#currctc').val(data.current_ctc);
                    $("#expctc").val(data.expected_ctc);
                    $("#location").val(data.location_prefered).trigger('change');

                    $("#career_id").val(data.id);

                    $(".btnCareer").text('Update');
                    $('#careerDetails').modal('show');
                }
            },
            error:function(error){
                console.log(error);
            }
        });
    })


// Educations Details
    $('.btn-addEducation').click(function(){
        $('.frmEducation')[0].reset();
        $('#educationDetails').modal('show');
    });
    $('#education').change(function(){
        var education =  $(this).val();
        $('#qualification option').remove();
        $.ajax({
            url: "/employee/profile/getAllCoursesByEducation",
            type:'GET',
            data: {'edu':education},
            dataType:'json',
            success: function(response) {
                console.log(response);
                if(response.status==true){
                   var courses = response.data;
                   $('#qualification').append('<option selected value=""> select course </option>');
                   for(ctr=0; ctr<courses.length; ctr++){
                       console.log(courses[ctr]);
                        $('#qualification').append('<option value="'+ courses[ctr].id +'">'+ courses[ctr].name +'</option>')
                   }
                }
            },
            error: (response) => {
                console.log(response);
            }
        });
    });

    $('#qualification').change(function(){
        var education =  $(this).val();
        $('#specification option').remove();
        $.ajax({
            url: "/employee/profile/getAllSpecByCourses",
            type:'GET',
            data: {'course':education},
            dataType:'json',
            success: function(response) {
                console.log(response);
                if(response.status==true){
                   var spec = response.data;
                   $('#specification').append('<option selected value=""> select specifications </option>');
                   for(ctr=0; ctr<spec.length; ctr++){
                        $('#specification').append('<option value="'+ spec[ctr].id +'">'+ spec[ctr].name +'</option>')
                   }
                }
            },
            error: (response) => {
                console.log(response);
            }
        });
    });

    $('.frmEducation').submit(function(e){
        e.preventDefault();
        let formData = $(this).serializeArray();
        $(".invalid-feedback").children("strong").text("");
        $(".frmEducation input").removeClass("is-invalid");
        $.ajax({
                url: "/employee/profile/addEducations",
                type:'POST',
                data: formData,
                success: function(data) {
                    console.log(data);
                    if(data.code == 200) {
                        $('.frmEducation')[0].reset();
                        toastr.success(data.message);
                        $('#educationDetails').modal('hide');
                        location.reload();
                    }else{
                        if(data.code ==203){
                            toastr.warning(data.message);
                        }else{
                            toastr.warning(data.message);
                        }
                    }
                },
                error: (response) => {
                    console.log(response);
                    if(response.status === 422) {
                        let errors = response.responseJSON.errors;
                        Object.keys(errors).forEach(function (key) {
                            console.log(key);
                            $("#" + key + "Input").addClass("is-invalid");
                            $("#" + key + "Error").children("strong").text(errors[key][0]);
                        });
                    }
                }
        });

    })
    $('.btn-editEducation').click(function(e){
        e.preventDefault();
        var EduId = $(this).attr('id');
        $.ajax({
            url: '/employee/profile/editEducations/'+EduId,
            type: "GET",
            success: function(response) {
                console.log(response);
                if(response.status) {
                    var data = response.data;
                    $('#education').val(data.education).trigger('change');
                    $('#qualification').val(data.qualification).trigger('change');
                    $('#specification').val(data.specification).trigger('change');
                    $('#institude').val(data.institude);
                    $('#courseType').val(data.coursetype);
                    $('#passingyear').val(data.passingyear);
                    $("#percent").val(data.percent);

                    $("#edu_id").val(data.id);

                    $(".btneducations").text('Update');
                    $('#educationDetails').modal('show');
                }
            },
            error:function(error){
                console.log(error);
            }
        });
     })


    // Educations Details
    $('.datepicker').datepicker({format: "dd-mm-yyyy"});
    $('.btn-addExperience').click(function(){
        $('.frmExp')[0].reset();
        $('#expDetails').modal('show');
    });
    $('.frmExp').submit(function(e){
        e.preventDefault();
        let formData = $(this).serializeArray();
        $(".invalid-feedback").children("strong").text("");
        $(".frmExp input").removeClass("is-invalid");
        $.ajax({
                url: "/employee/profile/addExperience",
                type:'POST',
                data: formData,
                success: function(data) {
                    console.log(data);
                    if(data.code == 200) {
                        $('.frmExp')[0].reset();
                        toastr.success(data.message);
                        location.reload();
                    }else{
                        if(data.code ==203){
                            toastr.warning(data.message);
                        }else{
                            toastr.warning(data.message);
                        }
                    }
                },
                error: (response) => {
                    console.log(response);
                    if(response.status === 422) {
                        let errors = response.responseJSON.errors;
                        Object.keys(errors).forEach(function (key) {
                            console.log(key);
                            $("#" + key + "Input").addClass("is-invalid");
                            $("#" + key + "Error").children("strong").text(errors[key][0]);

                        });
                    }
                }
        });

    })
    $('.btn-editExperience').click(function(e){
        e.preventDefault();
        var EduId = $(this).attr('id');
        $.ajax({
            url: '/employee/profile/editExperince/'+EduId,
            type: "GET",
            success: function(response) {
                console.log(response);
                if(response.status) {
                    var data = response.data;
                    $('#company').val(data.company_name);
                    $('#expposition').val(data.position);
                    $('#iscutrrent').prop('checked',data.is_current);
                    $('#from').val(data.from_date);
                    $('#to').val(data.to_date);
                    $('#explocation').val(data.location).trigger('change');

                    $("#exp_id").val(data.id);

                    $(".addexp").text('Update');
                    $('#expDetails').modal('show');
                }
            },
            error:function(error){
                console.log(error);
            }
        });
     })



    // Skill Details
    $('.btn-addSkills').click(function(){
        $('#frmSkills')[0].reset();
        $('#skillDetails').modal('show');
    });
    $('#frmSkills').submit(function(e){
        e.preventDefault();
        let formData = $(this).serializeArray();
        $(".invalid-feedback").children("strong").text("");
        $("#frmSkills input").removeClass("is-invalid");
        $.ajax({
                url: "/employee/profile/addSkills",
                type:'POST',
                data:{'skills': formData},
                success: function(data) {
                    console.log(data);
                    if(data.code == 200) {
                        $('#frmSkills')[0].reset();
                        toastr.success(data.message);
                        location.reload();
                    }else{
                        if(data.code ==203){
                            toastr.warning(data.message);
                        }else{
                            toastr.warning(data.message);
                        }
                    }
                },
                error: (response) => {
                    console.log(response.responseText);
                }
        });

    })

    $('.skilldelete').click(function(e){
       var skill =  $(this).attr('id');
        $.ajax({
            url: "/employee/profile/deleteSkill",
            type:'POST',
            data:{'skillid': skill },
            success: function(data) {
                if(data.status == true) {
                    toastr.success(data.message);
                }
            },
            error: (response) => {
                console.log(response.responseText);
            }
        });
        $(this).parent('i').remove();
    })

    // Audit Details
    $('.btn-addAudits').click(function(){
        $('#frmAudit')[0].reset();
        $('#auditDetails').modal('show');
    });
    $('#frmAudit').submit(function(e){
        e.preventDefault();
        let formData = $(this).serializeArray();
        $(".invalid-feedback").children("strong").text("");
        $("#frmAudit input").removeClass("is-invalid");
        $.ajax({
                url: "/employee/profile/addAudits",
                type:'POST',
                data:{'audits': formData},
                success: function(data) {
                    console.log(data);
                    if(data.code == 200) {
                        $('#frmAudit')[0].reset();
                        toastr.success(data.message);
                        location.reload();
                    }else{
                        if(data.code ==203){
                            toastr.warning(data.message);
                        }else{
                            toastr.warning(data.message);
                        }
                    }
                },
                error: (response) => {
                    console.log(response.responseText);
                }
        });

    })

    $('.auditdelete').click(function(e){
        var aud =  $(this).attr('id');
        $.ajax({
            url: "/employee/profile/deleteaudit",
            type:'POST',
            data:{'auditid': aud },
            success: function(data) {
                if(data.status == true) {
                    toastr.success(data.message);
                }
            },
            error: (response) => {
                console.log(response.responseText);
            }
        });
        $(this).parent('i').remove();
    })

    //Organisations
    $('.btn-addorg').click(function(){
        $('#frmOrg')[0].reset();
        $('#organisation').modal('show');
    });
    $('#frmOrg').submit(function(e){
        e.preventDefault();
        let formData = $(this).serializeArray();
        $(".invalid-feedback").children("strong").text("");
        $("#frmOrg input").removeClass("is-invalid");
        $.ajax({
                url: "/employee/profile/addOrganisations",
                type:'POST',
                data:{'orgs': formData},
                success: function(data) {
                    console.log(data);
                    if(data.code == 200) {
                        $('#frmOrg')[0].reset();
                        toastr.success(data.message);
                        location.reload();
                    }else{
                        if(data.code ==203){
                            toastr.warning(data.message);
                        }else{
                            toastr.warning(data.message);
                        }
                    }
                },
                error: (response) => {
                    console.log(response.responseText);
                }
        });

    })

    $('.orgdelete').click(function(e){
        var org =  $(this).attr('id');
        $.ajax({
            url: "/employee/profile/deleteOrgs",
            type:'POST',
            data:{'orgid': org },
            success: function(data) {
                if(data.status == true) {
                    toastr.success(data.message);
                }
            },
            error: (response) => {
                console.log(response.responseText);
            }
        });
        $(this).parent('i').remove();
    })








    //Resume Upload
    $('.btn-addResume').click(function(){
        $('#resumeModel').modal('show');
    });
    $('#frmResume').submit(function(e){
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        $(".invalid-feedback").children("strong").text("");
        $("#frmSkills input").removeClass("is-invalid");
        $.ajax({
                url: "/employee/profile/uploadResume",
                type:'POST',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    if(data.code == 200) {
                        $('#frmSkills')[0].reset();
                        toastr.success(data.message);
                        location.reload();
                    }else{
                        if(data.code ==203){
                            toastr.warning(data.message);
                        }else{
                            toastr.warning(data.message);
                        }
                    }
                },
                error: (response) => {
                    console.log(response);
                    if(response.status === 422) {
                        let errors = response.responseJSON.errors;
                        Object.keys(errors).forEach(function (key) {
                            console.log(key);
                            $("#" + key + "Input").addClass("is-invalid");
                            $("#" + key + "Error").children("strong").text(errors[key][0]);
                        });
                    }
                }
        });

    })

    //Profile
    $('.btnProfilePic').click(function(){
        $('#profilepic').modal('show');
    });
    $('#profileupload').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        $('#image-input-error').text('');

        $.ajax({
           type:'POST',
           url: "/employee/profile/profilpicupload",
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
              console.log(response);
              if (response.success) {
                this.reset();
                toastr.success(response.success);
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





    $(document).on('click','.expCheckBox', function(e){
            var isChecked = $(this).is(':checked');
            if(isChecked){
                $(this).closest('div').parent('div').find('#to').prop('disabled', true);
                $(this).closest('div').parent('div').find('#to').val('Present');
                $(this).closest('div').parent('div').find('#to').removeClass("datepicker");
            }  else{
                $(this).closest('div').parent('div').find('#to').prop('disabled', false);
                $(this).closest('div').parent('div').find('#to').datepicker({format: "dd-mm-yy"});
                $(this).closest('div').parent('div').find('#to').val($.datepicker.formatDate("dd-mm-yy", new Date()));
            }
    });

});
