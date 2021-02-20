@extends('recruiter.layout.layout')
@section('content')
<style>
    .dropdown-menu {
		border-radius: 0;
	}
	.multiselect-native-select {
		position: relative;
		select {
			border: 0 !important;
			clip: rect(0 0 0 0) !important;
			height: 1px !important;
			margin: -1px -1px -1px -3px !important;
			overflow: hidden !important;
			padding: 0 !important;
			position: absolute !important;
			width: 1px !important;
			left: 50%;
			top: 30px;
		}
	}
	.multiselect-container {
		position: absolute;
		list-style-type: none;
		margin: 0;
		padding: 0;
		.input-group {
			margin: 5px;
		}
		li {
			padding: 0;
			.multiselect-all {
				label {
					font-weight: 700;
				}
			}
			a {
				padding: 0;
				label {
					margin: 0;
					height: 100%;
					cursor: pointer;
					font-weight: 400;
					padding: 3px 20px 3px 40px;
					input[type=checkbox] {
						margin-bottom: 5px;
					}
				}
				label.radio {
					margin: 0;
				}
				label.checkbox {
					margin: 0;
				}
			}
		}
		li.multiselect-group {
			label {
				margin: 0;
				padding: 3px 20px 3px 20px;
				height: 100%;
				font-weight: 700;
			}
		}
		li.multiselect-group-clickable {
			label {
				cursor: pointer;
			}
		}
	}
	.btn-group {
		.btn-group {
				.multiselect.btn {
					border-top-left-radius: 4px;
					border-bottom-left-radius: 4px;
				}
		}
	}
	.form-inline {
		.multiselect-container {
			label.checkbox {
				padding: 3px 20px 3px 40px;
			}
			label.radio {
				padding: 3px 20px 3px 40px;
			}
			li {
				a {
					label.checkbox {
						input[type=checkbox] {
							margin-left: -20px;
							margin-right: 0;
						}
					}
					label.radio {
						input[type=radio] {
							margin-left: -20px;
							margin-right: 0;
						}
					}
				}
			}
		}
	}

</style>
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Candidates</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Candidate Lists</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class=" mb-lg-0">
                    <div class="">
                        <div class="item2-gl">
                            <div class=" mb-0">
                                <div class="">
                                    <div class="p-5 bg-white col-md-12">
                                        <form action="" class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Category</label>
                                                    <select name="category" id="category" class="form-control select2" style="width: 100%">
                                                        <option value=""> Select Category </option>
                                                        <option value="1"> Outstanding  </option>
                                                        <option value="2"> Excellent </option>
                                                        <option value="3"> Good  </option>
                                                        <option value="4"> Need Improvement </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Job Role</label>
                                                    <select  name="positions" id="positions" class="form-control select2" style="width: 100%">
                                                        <option value="" selected> Select Role</option>
                                                        @foreach ($positions as $item)
                                                            <option value="{{$item->id}}"> {{ $item->name}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Skills</label>
                                                    <select class="form-control"  id="skills" name="skills" multiple style="width: 100%">
                                                        @foreach ($skills as $item)
                                                                <option value="{{$item->id}}"> {{ $item->description}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group p-5">
                                                    <button class="btn btn-md btn-info"> Search </button>
                                                </div>
                                            </div>


                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content company-list">
                                <div class="tab-pane active" id="tab-11">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card overflow-hidden br-0 overflow-hidden">
                                                <div class="d-sm-flex card-body p-3">
                                                    <div class="p-0 m-0 mr-3">
                                                        <div class="">
                                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSO4bidN-dMh-M1mpxUSkBrIApF0KAqefSo1g&usqp=CAU" alt="img" class="w-9 h-9">
                                                        </div>
                                                    </div>
                                                    <div class="item-card9 mt-3 mt-md-5">
                                                        <a href="#" class="text-dark"><h5 class="font-weight-semibold mt-1">Harish Kumar V</h5></a>
                                                        <div class="mt-1">
                                                            <a class="text-dark"><h6 class="font-weight-semibold mt-1">Web Developer</h6></a>
                                                        </div>
                                                        <div class="mt-1">
                                                            <i class="fa fa-building mr-1"></i> OutStanding
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card overflow-hidden border-0 box-shadow-0 br-0 mb-0">
                                                    <div class="card-body table-responsive border-top">
                                                        <h4>Skills :</h4>
                                                        Html, Css, PHP
                                                        <div class="mt-3">
                                                            <a href="#" class="btn btn-info icons mt-1 mb-1 float-right" data-toggle="modal" data-target="#report">Show Interest</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="card overflow-hidden br-0 overflow-hidden">
                                                <div class="d-sm-flex card-body p-3">
                                                    <div class="p-0 m-0 mr-3">
                                                        <div class="">
                                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSO4bidN-dMh-M1mpxUSkBrIApF0KAqefSo1g&usqp=CAU" alt="img" class="w-9 h-9">
                                                        </div>
                                                    </div>
                                                    <div class="item-card9 mt-3 mt-md-5">
                                                        <a href="#" class="text-dark"><h5 class="font-weight-semibold mt-1">Harish Kumar V</h5></a>
                                                        <div class="mt-1">
                                                            <a class="text-dark"><h6 class="font-weight-semibold mt-1">Web Developer</h6></a>
                                                        </div>
                                                        <div class="mt-1">
                                                            <i class="fa fa-building mr-1"></i> OutStanding
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card overflow-hidden border-0 box-shadow-0 br-0 mb-0">
                                                    <div class="card-body table-responsive border-top">
                                                        <h4>Skills :</h4>
                                                        Html, Css, PHP
                                                        <div class="mt-3">
                                                            <a href="#" class="btn btn-info icons mt-1 mb-1 float-right" data-toggle="modal" data-target="#report">Show Interest</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="center-block text-center">

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('.select2').select2();

        $('#skills').multiselect({
            buttonWidth : '160px',
            includeSelectAllOption : true,
            nonSelectedText: 'Select an Option'
        });

    })


</script>
@endsection
