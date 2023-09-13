@extends('admin.layouts.app')

@section('main-section')

    
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Class Routine </h4> 
            </div>
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
                            @foreach ($routine as $item)
                            {{$item -> class}}
                            @forelse (json_decode($item -> subject) as $sub)
                           
                                <td>{{$sub}}  </td>
                                
                                @empty
                                <li> No Record Found</li>
                                @endforelse
                                
                                @endforeach
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


  

