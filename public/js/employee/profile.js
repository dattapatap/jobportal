$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
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
        var thisform = $(this);
        $('.alert-message', thisform).remove().text();
        $.ajax({
                url: "/employee/profile/updateprofile",
                type:'POST',
                data: $('.frmProfile').serialize(),
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
                error:function(error){
                    console.log(error);
                    $('#first_nameError').text(error.responseJSON.errors.first_name);
                    $('#last_nameError').text(error.responseJSON.errors.last_name);
                    $('#dobError').text(error.responseJSON.errors.dob);
                    $('#genderError').text(error.responseJSON.errors.gender);
                    $('#emailError').text(error.responseJSON.errors.email);
                    $('#mobileError').text(error.responseJSON.errors.mobile);
                    $('#addressError').text(error.responseJSON.errors.address);
                }
        });

    })


    $('.btn-addCareer').click(function(){
        $('#careerDetails').modal('show');
    });
    $('.btn-addEducation').click(function(){
        $('#educationDetails').modal('show');
    });
    $('.btn-addExperience').click(function(){
        $('#expDetails').modal('show');
    });
    $('.btn-addSkills').click(function(){
        $('#skillDetails').modal('show');
    });
    $('.btn-addResume').click(function(){
        $('#resume').modal('show');
    });
    $('.btn-addProfile').click(function(){
        $('#profilepic').modal('show');
    });
    


    let Education_row_number = 0;
    let Experiance_row_number = 0;
    $('.btn-addeducation').click(function(e) {
        e.preventDefault();

        Education_row_number++;
        console.log(Education_row_number);
        var educationRow = '<tr id="2"><td><div class="card"><div class="card-header"><div class="card-options">'+
            '<a class="btn btn-light btn-sm btn-removeeducation" href="javascript(0);"><i class="fa fa-remove"></i></a></div></div><div class="card-body">' +
            '<div class="row"><div class="form-group col-6"><label class="form-label text-dark">Institude Name</label>'+
            '<input type="text" class="form-control" name="txtInstitude_'+ Education_row_number +'" id="txtInstitude_'+ Education_row_number +'" name="txtInstitude" required></div> <div class="form-group col-6">' +
            '<label class="form-label text-dark"> Qualification </label> <input type="text" class="form-control" name="txtQualification_'+ Education_row_number +'" id="txtQualification_'+ Education_row_number +'" required>' +
            '</div></div><div class="row"><div class="form-group col-6"><label class="form-label text-dark">From</label>' +
            '<input type="text" name="txtFrom_'+ Education_row_number+'" id="txtFrom_'+ Education_row_number+'" class="form-control txtFrom"></div><div class="form-group col-6">' +
            '<label class="form-label text-dark">To</label> <input type="text" name="txtTo_'+ Education_row_number+'" id="txtTo_'+ Education_row_number+'" class="form-control txtTo"></div></div>' +
            '<div class="row"><div class ="form-group col-6"> <label class="form-label text-dark">University</label> ' +
            '<input type="text" id="board_'+Education_row_number+'" name="board_'+Education_row_number+'" class="form-control"> </div> <div class="form-group col-6" > <label class="form-label text-dark">Total Percent</label>' +
            '<input type="number" id="percent_'+Education_row_number+'" name="percent_'+Education_row_number+'" step="0.01" class="form-control">' +
            '</div> </div></div></div></td></tr>';

        $('.educations tbody:last').append(educationRow);
        $(".txtTo" ).datepicker({format: "mm-yyyy", startView: "months", minViewMode: "months"});
        $('.txtFrom').datepicker({format: "mm-yyyy", startView: "months", minViewMode: "months"});

    });
    $(document).on('click','.btn-removeeducation', function(e){
            e.preventDefault();
            $(this).closest('tr').remove();
    });
    $(document).on('click','.btn-removeExperience', function(e){
        e.preventDefault();
        $(this).closest('tr').remove();
    });

    $('.addExperiance').click(function(e){
        e.preventDefault();

        Experiance_row_number++;

        var experianceRow = '<tr><td><div class="card"> <div class="card-body"><div class="card-header"><div class="card-options">'+
        '<a class="btn btn-light btn-sm btn-removeExperience" href="javascript(0);"><i class="fa fa-remove"></i></a></div></div> <div class="row"> <div class="form-group col-6">'+
        '<label class="form-label text-dark">Company Name</label> <input type="text" name="txtCompanyName_'+Experiance_row_number+'" id="txtCompanyName_'+Experiance_row_number+'"  class="form-control" required>'+
        '</div> <div class="form-group col-6"> <label class="form-label text-dark">Position/Role</label> <input type="text"  id="txtPositionName_'+Experiance_row_number+'" name="txtPositionName_'+Experiance_row_number+'" '+
        'class="form-control" required> </div> </div> <div class="form-group" style="margin-bottom: 10px;"> <div class="row"> <div class="form-group col-2">'+
        '<label class="form-label text-dark">Current Company ?</label> <label class="custom-control custom-checkbox mt-2 ml-5">'+
        '<input type="checkbox" class="custom-control-input expCheckBox" id="isCurrent_'+ Experiance_row_number +'" name="isCurrent_'+ Experiance_row_number +'" > <span class="custom-control-label">Yes</span> </label>'+
        '</div> <div class="form-group col-5"> <label class="form-label text-dark">From</label> <input type="text" id="txtExpFrom_'+ Experiance_row_number+'" name="txtExpFrom_'+ Experiance_row_number+'"   class="form-control txtExpFrom">'+
        '</div> <div class="form-group col-5"> <label class="form-label text-dark">To</label> <input type="text" id="txtExpTo_'+ Experiance_row_number+'" name="txtExpTo_'+ Experiance_row_number+'" class="form-control txtExpTo"> </div>'+
        '</div> </div> <div class="row"> <div class="form-group col-12"> <label class="form-label text-dark">Location</label> <input type="text"  id="txtExpLocation_'+ Experiance_row_number+'"  name="txtExpLocation_'+ Experiance_row_number+'" '+
        'class="form-control" required> </div> </div> </div> </div> </td> </tr>';

        $('.profile-experience tbody:last').append(experianceRow);
        $(".txtExpFrom" ).datepicker({format: "mm-yyyy", startView: "months", minViewMode: "months"});
        $('.txtExpTo').datepicker({format: "mm-yyyy", startView: "months", minViewMode: "months"});


    })
    $(document).on('click','.expCheckBox', function(e){
            var isChecked = $(this).is(':checked');
            if(isChecked){
                $(this).closest('div').parent('div').find('.txtExpTo').prop('disabled', true);
                $(this).closest('div').parent('div').find('.txtExpTo').val('Present');
            }  else{
                $(this).closest('div').parent('div').find('.txtExpTo').prop('disabled', false);
                $(this).closest('div').parent('div').find('.txtExpTo').datepicker({format: "mm-yy", startView: "months", minViewMode: "months"});
                $(this).closest('div').parent('div').find('.txtExpTo').val($.datepicker.formatDate("mm-yy", new Date()));
            }
    });
    $(".txtTo" ).datepicker({ format: "mm-yyyy", startView: "months", minViewMode: "months" });
    $('.txtFrom').datepicker({format: "mm-yyyy", startView: "months", minViewMode: "months" });
    $(".txtExpFrom" ).datepicker({format: "mm-yyyy", startView: "months", minViewMode: "months"});
    $('.txtExpTo').datepicker({format: "mm-yyyy", startView: "months", minViewMode: "months"});


    $('.frmProfile').submit(function(e){
        e.preventDefault();

        // var employee = {};
        // employee["emp_id"] = $("#emp_id").val();
        // employee["first_name"] = $("#txtfirstname").val();
        // employee["proffesion"] = $("#txtproffession").val();
        // employee["email"] = $("#txnemail").val();
        // employee["currentctc"] = $("#txtcurrentctc").val();
        // employee["locationPref"] = $("#txtlocationprefered").val();
        // employee["last_name"] = $("#txtlastname").val();
        // employee["expYear"] = $("#expYear").val();
        // employee["expMonth"] = $("#expMonth").val();
        // employee["phone"] = $("#txtphone").val();
        // employee["expectedctc"] = $("#txtexpectedctc").val();
        // employee["noticeperiod"] = $("#txtnoticeperiod").val();

        // education_array = [];
        // var educations = 0;
        // $(".educations tbody tr").each(function(val=0) {
        //     education = {};
        //     education["education_id"] = $(this).closest('tr').attr('educatiuonId');
        //     education["institude"] = $(this).find('#txtInstitude_'+educations).val();
        //     education["qualification"] = $(this).find('#txtQualification_'+educations).val();
        //     education["from"] = $(this).find('#txtFrom_'+educations).val();
        //     education["to"] = $(this).find('#txtTo_'+educations).val();
        //     education["university"] = $(this).find('#board_'+educations).val();
        //     education["percent"] = $(this).find('#percent_'+educations).val();
        //     education_array.push(education);            
        //     educations++;
        // });

        // workExp_array = [];
        // var experienceCount = 0;
        // $(".profile-experience tbody tr").each(function() {
        //     experience = {};
        //     experience["experience_id"] = $(this).closest('tr').attr('experiance');
        //     experience["company"] = $(this).find('#txtCompanyName_'+experienceCount).val();
        //     experience["position"] = $(this).find('#txtPositionName_'+experienceCount).val();
        //     experience["is_cuttent"] = $(this).find('#isCurrent_'+experienceCount).is(':checked')

        //     experience["from"] = $(this).find('#txtExpFrom_'+experienceCount).val();
        //     experience["to"] = $(this).find('#txtExpTo_'+experienceCount).val();
        //     experience["expLocation"] = $(this).find('#txtExpLocation_'+experienceCount).val();

        //     workExp_array.push(experience);            
        //     experienceCount++;
        // });


        // var selectedVal = $('#skills').val();
        // if (selectedVal.length > 0) {
        //     employee['skills'] = selectedVal;
        //     // console.log(selectedVal);
        // }else{
        //     console.log('Skills Not Selected');
        // }

        // employee['educations'] = education_array;
        // employee['experience'] = workExp_array;
        // var emp = JSON.stringify(employee);
        // console.log(emp);
        // var fm =new FormData();
        // fm.append('profile', emp);
        // fm.append('avtar', $('#avatar').prop('files')[0]);
        // fm.append('resume', $('#file-upload').prop('files')[0]);
        // console.log(fm);

        // $.ajax({
        //         url: '/employee/profile/updateProfile',
        //         type: 'POST',         
        //         data: fm,
        //         cache:false,
        //         contentType: false,
        //         processData: false,
        //         dataType: 'json',         
        //         success: (data) => {
        //             console.log(data);            
        //         },
        //         error: function(err) {                    
        //             console.log(err.responseText);                
        //         },
        // });


    });

});