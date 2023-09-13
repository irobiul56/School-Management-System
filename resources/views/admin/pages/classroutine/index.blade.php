@extends('admin.layouts.app')

@section('main-section')

<form action="{{route('class-routine.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Class Routine </h4> 
                <select name="class" id="">
                    <option class="form-control" value=""> -- Select Class -- </option>  
                    @foreach ($class as $item)
                    <option class="form-control" value="{{$item -> name}}"> {{$item -> name}} </option>  
                        
                    @endforeach
                </select> 
            </div>
            @include('validate');
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Days / Time</th>
                                <th>9:00 - 9:50</th>
                                <th>9:50 - 10:40</th>
                                <th>10:40 - 11:30</th>
                                <th>11:30 - 12:20</th>
                                <th>12:20 - 1:10</th>
                                <th>Tifin Time</th>
                                <th>1:50 - 2:35</th>
                                <th>2:35 - 3:20</th>
                                <th>3:20 - 4:05</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr>    
                                <td>Saturday</td>
                                <td><select name="sat900" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="sat950" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="sat1040" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="sat1130" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="sat1220" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                
                                <td rowspan="9" class="vertical"></td>
                                <td><select name="sat150" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="sat235" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="sat320" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                               
                            </tr>

                            <tr>    
                                <td>Sunday</td>
                                <td><select name="sun900" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="sun950" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="sun1040" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="sun1130" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="sun1220" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                
                                <td><select name="sun150" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="sun235" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="sun320" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                               
                            </tr>

                            <tr>    
                                <td>Monday</td>
                                <td><select name="mon900" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="mon950" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="mon1040" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="mon1130" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="mon1220" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                
                                <td><select name="mon150" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="mon235" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="mon320" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                            </tr>

                            <tr>    
                                <td>Tuesday</td>
                                <td><select name="tue900" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="tue950" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="tue1040" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="tue1130" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="tue1220" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                               
                                <td><select name="tue150" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="tue235" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="tue320" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                            </tr>

                            <tr>    
                                <td>Wednesday</td>
                                <td><select name="wed900" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="wed950" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="wed1040" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="wed1130" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="wed1220" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                
                                <td><select name="wed150" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="wed235" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="wed320" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                            </tr>

                            <tr>    
                                <td>thursday</td>
                                <td><select name="thu900" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="thu950" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="thu1040" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="thu1130" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="thu1220" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                
                                <td><select name="thu150" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="thu235" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                                <td><select name="thu320" id=""><option class="form-control" value=""> Select Subject </option>@foreach ($subject as $item) <option value="{{$item -> name}}"> {{$item -> name}} </option>@endforeach</select></td>
                            </tr>
                            

                        </tbody>
                    </table>
                </div>
                <button class="btn btn-success">Submit</button>
            </div>
        </div>
    </div>
    </div>
</div>
</form>
@endsection

<style>
    td select {
        width: 100px; 
        height: 30px; 
        border-color: rgba(11, 107, 241, 0.866); 
        border-radius: 5px;

    }
</style>