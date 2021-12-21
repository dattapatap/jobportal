$(document).ready(function() {
    $('#question_category').select2();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', "input:checkbox", function() {
        var $iscorrect = $(this);
        if ($iscorrect.is(":checked")) {
            var group = "input:checkbox[name='" + $iscorrect.attr("name") + "']";
            $(group).prop("checked", false);
            $iscorrect.prop("checked", true);
        } else {
            $iscorrect.prop("checked", false);
        }
    });

    $('#questions').submit(function(e) {
        e.preventDefault();

        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        var category = $('#question_category').val();
        var question_type = $('#question_type').val();
        var questions = $('#question').val();
        var id = $('#question_id').val();

        var arrayOpt = [];
        $('input[name^="opt"]').each(function() {
            arrayOpt.push($(this).val());
        })

        var opt_Ids = [];
        $('input[name^="optionsId"]').each(function() {
            opt_Ids.push($(this).val());
        })
        var arrayScores = [];
        $('input[name^="marks"]').each(function() {
            if ($(this).prop("checked")) {
                isCheked = 1;
            } else {
                isCheked = 0;
            }
            arrayScores.push(isCheked);
        })
        options = JSON.stringify(arrayOpt);
        nasweres = JSON.stringify(arrayScores);
        options_ids = JSON.stringify(opt_Ids);
        $.ajax({
            url: "/admin/questions/create/new",
            type: "POST",
            data: { q_id: id, cat: category, quest: question_type, question: questions, option: options, ans: nasweres, opts: options_ids },
            dataType: "json",
            success: function(data) {
                console.log(data);
                if (data.code == 200) {
                    location.reload();
                } else {
                    if (data.code == 202) {
                        toastr.warning(data.message);
                    } else {
                        toastr.warning(data.message);
                    }
                }
            },
            error: function(errors) {
                console.log(errors.responseText);
            }
        });
    });

    $('#questionsupdate').submit(function(e) {
        e.preventDefault();
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        var category = $('#question_category').val();
        var question_type = $('#question_type').val();
        var questions = $('#question').val();
        var id = $('#question_id').val();

        var arrayOpt = [];
        $('input[name^="opt"]').each(function() {
            console.log($(this).val());
            arrayOpt.push($(this).val());
        })
        var opt_Ids = [];
        $('input[name^="uniqueId"]').each(function() {
            opt_Ids.push($(this).val());
        })

        var arrayScores = [];
        $('input[name^="marks"]').each(function() {
            if ($(this).prop("checked")) {
                isCheked = 1;
            } else {
                isCheked = 0;
            }
            arrayScores.push(isCheked);
        })
        options = JSON.stringify(arrayOpt);
        nasweres = JSON.stringify(arrayScores);
        options_ids = JSON.stringify(opt_Ids);

        $.ajax({
            url: "/admin/questions/update",
            type: "POST",
            data: { q_id: id, cat: category, quest: question_type, question: questions, option: options, ans: nasweres, opts: options_ids },
            dataType: "json",
            success: function(data) {
                console.log(data);
                if (data.code == 200) {
                    location.reload();
                } else {
                    if (data.code == 202) {
                        toastr.warning(data.message);
                    } else {
                        toastr.warning(data.message);
                    }
                }
            },
            error: function(errors) {
                console.log(errors.responseText);
            }
        });
    });



});
