@extends('layouts.app-bv4')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
                You are logged in!
        </div>            
    </div>

    <div class="row" id="app">
        <!-- vue implemntation  -->
    </div>



    <div class="row">
        <div class="col-md-2"></div>

        <div class="col-md-2">
            <div class="card">
                <div style='padding: 0' class="card-body department">
                    <div class="d-flex flex-row ">
                        <div class="card-icon">
                          <span class="fa fa-building fa-lg white"></span>
                            <p class="card-text text-sm-left">DEPARTMENTS</p>
                        </div>
                        <div class="card-stats">
                            <p class="data">{{$departments->count()}}</p>
                        </div>
                    </div>

                </div>
                   <br> <a style='text-align:center' href="{{route('department.index')}}">View</a> 
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <div style='padding: 0' class="card-body student">
                    <div class="d-flex flex-row ">
                        <div class="card-icon">
                          <span class="fa fa-graduation-cap fa-lg white"></span>
                            <p class="card-text text-sm-left">STUDENTS</p>
                        </div>
                        <div class="card-stats">
                            <p class="data">{{$students->count()}}</p>
                        </div>
                    </div>

                </div>
                   <br> <a style='text-align:center' href="{{route('students.index')}}">View</a> 
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <div style='padding: 0' class="card-body teacher">
                    <div class="d-flex flex-row ">
                        <div class="card-icon">
                          <span class="fas fa-book fa-lg white"></span>
                            <p class="card-text text-sm-left">TEACHERS</p>
                        </div>
                        <div class="card-stats">
                            <p class="data">{{$teachers->count()}}</p>
                        </div>
                    </div>

                </div>
                   <br> <a style='text-align:center' href="{{route('teacher.index')}}">View</a> 
            </div>
        </div>

        <div class="col-md-2">
            <div class="card">
                <div style='padding: 0' class="card-body course">
                    <div class="d-flex flex-row ">
                        <div class="card-icon">
                          <span class="fas fa-folder-open fa-lg white"></span>
                            <p class="card-text text-sm-left">COURSES</p>
                        </div>
                        <div class="card-stats">
                            <p class="data">{{$courses->count()}}</p>
                        </div>
                    </div>

                </div>
                   <br> <a style='text-align:center' href="{{route('course.index')}}">View</a> 
            </div>
        </div>

        <div class="col-md-2">
            <div class="card">
                <div style='padding: 0' class="card-body score_sheet">
                    <div class="d-flex flex-row ">
                        <div class="card-icon">
                          <span class="fas fa-chart-bar fa-lg white"></span>
                            <p class="card-text text-sm-left">SCORE SHEET</p>
                        </div>
                        <div class="card-stats">
                            <p class="data">{{$score_sheets->count()}}</p>
                        </div>
                    </div>

                </div>
                   <br> <a style='text-align:center' href="{{route('score_sheet.index')}}">View</a> 
            </div>
        </div>
        
    </div>

<style>
    .bigText
    {
        font-size: 1.5rem;
        font-weight: 250;
    }

    .card-stats
    {
        text-align: right;
        width: 50%;
        height: auto;
    }

    .card-icon
    {
        
        width: 50%;
        height: auto;
        text-align: center;
        padding-left: 2px;
    }
    .white
    {
        color:white;
    }

    .card-body
    {
        
        color: white;
    }
    .student
    {
        background: -webkit-linear-gradient(150deg, #66bb6a, #43a047);
        background: -o-linear-gradient(150deg, #66bb6a, #43a047);
        background: linear-gradient(240deg, #66bb6a, #43a047);  
    }
    .teacher
    {
        background: linear-gradient(60deg,#26c6da,#00acc1);
    }
    .course
    {
       background: linear-gradient(60deg, #ffa726, #fb8c00);
    }
    .department
    {
       background: linear-gradient(60deg, #ef5350, #e53935);
    }
    .score_sheet
    {
        background: linear-gradient(60deg,#ec407a,#d81b60);

    }
    .data
    {
        font-size: 2rem;
        font-weight: 300px;
        font-family: BadScript;
        padding-right: 4px;
    }
</style>
@endsection
