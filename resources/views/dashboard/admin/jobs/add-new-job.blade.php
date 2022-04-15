@extends('dashboard.admin.layouts.app')

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Add New Job</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content-main')
<div class="row">
    <div class="col-lg-12">
        <form method="POST" action="{{ route('admin.jobs.store') }}">
            @csrf
            @method('POST')
            <div class="form-group">
                <h5>Choose Employer<span class="text-danger">*</span></h5>
                <div class="controls">
                    <select name="employer_id" class="form-control" required>
                        <option>-- Select Employer --</option>
                        @foreach($employers as $employer)
                            <option value="{{ $employer->id }}">{{ $employer->org_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <h5>Job Title <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="title" class="form-control" required placeholder="job title"
                            data-validation-required-message="This field is required">
                    <div class="help-block"></div>
                </div>
            </div>
            <div class="form-group">
                <h5>Job Location<span class="text-danger">*</span></h5>
                <div class="controls">
                    <select name="location_id" class="form-control" required>
                        <option>-- Select Job Location --</option>
                        @foreach($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <h5>Job Industry<span class="text-danger">*</span></h5>
                <div class="controls">
                    <select name="industry_id" class="form-control" required>
                        <option>-- Select Industry --</option>
                        @foreach($industries as $industry)
                            <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <h5>Job Description</h5>
                <div class="controls">
                    <textarea name="description" id="editor1" class="form-control textarea"
                              aria-invalid="false"></textarea>
                    <div class="help-block"></div>
                </div>
            </div>
            <div class="form-group">
                <h5>Job Responsibility</h5>
                <div class="controls">
                    <textarea name="responsibility" id="editor2" class="form-control textarea"
                              aria-invalid="false"></textarea>
                    <div class="help-block"></div>
                </div>
            </div>
            <div class="form-group">
                <h5>Job Requirements</h5>
                <div class="controls">
                    <textarea name="requirement" id="editor3" class="form-control textarea"
                              aria-invalid="false"></textarea>
                    <div class="help-block"></div>
                </div>
            </div>
            <div class="form-group">
                <h5>Application Email<span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="email" name="application_email" class="form-control" required
                            data-validation-required-message="This field is required" placeholder="email">
                    <div class="help-block"></div>
                </div>
            </div>
            <div class="form-group">
                <h5>Application URL
                    <h5>
                        <div class="controls">
                            <input type="text" class="form-control" name="application_url"
                                    placeholder="https://">
                        </div>
            </div>
            <div class="form-group">
                <h5>Job type<span class="text-danger">*</span></h5>
                <div class="controls">
                    <select class="form-control" name="job_type" required>
                        <option value>Select Type</option>
                        <option value="Fulltime">Full Time</option>
                        <option value="Parttime">Part Time</option>
                        <option value="Internship">Internship</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <h5>Status<span class="text-danger">*</span></h5>
                <div class="controls">
                    <select class="form-control" name="status" required>
                        <option value>Status</option>
                        <option value="Pending">Pending</option>
                        <option value="Active">Published</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <h5>Experience</h5>
                <div class="controls">
                    <input type="text" name="experience" class="form-control">
                    <div class="help-block"></div>
                </div>
            </div>            
            <div class="form-group">
                <h5>Openings <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="number" name="openings" class="form-control" required>
                    <div class="help-block"></div>
                </div>
            </div>
            <div class="form-group">
                <h5>skills</h5>
                <div class="control">
                    @foreach ($skills as $skill)
                        <input type="checkbox" id="checkbox_skill{{$skill->name}}" name="skills[]"
                                value="{{$skill->name}}">
                        <label for="checkbox_skill{{$skill->name}}">{{$skill->name}}</label>

                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <h5>Closing date <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="last_date" class="form-control" id="lastdate" required>
                    <div class="help-block"></div>
                    <div class="form-control-feedback">
                        <small>&nbsp; Deadline for new applicants.</small>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <h5>Salary <span class="text-danger">*</span></h5>
                <div class="controls">
                    @if ($errors->has('min_salary'))
                    <span class="text-danger">{{ $errors->first('min_salary') }}</span>
                    @endif
                    <div class="row">

                        <div class="col-lg-6">
                            <input class="form-control" name="min_salary" type="number"
                                    placeholder="minimum salary" required>
                        </div>         
                        <div class="col-lg-6">
                            <input class="form-control" name="max_salary" type="number"
                            placeholder="maximum salary">
                        </div>   
                    </div>
                </div>
            </div>
            <div class="form-group">
                <h5>featured Job</h5>
                <div class="controls">
                    <input type="checkbox" id="checkbox_featured_job" name="featured" value="1">
                    <label for="checkbox_featured_job"></label>
                </div>
            </div>

            @can('create-jobs')
            <div class="text-xs-right">
                <button type="submit" class="btn btn-info">Add Job</button>
            </div>
            @endcan
        </form>

    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<script src="{{ asset('vendor/plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript">
$(function () {
    //Date range picker
    $('#lastdate').daterangepicker({        
        singleDatePicker: true,
        showDropdowns: true,
        autoApply: true,
        minYear: 2020,
        locale: {
            format: 'YYYY-MM-DD'
        }           
    })    
});
</script>
@endsection
