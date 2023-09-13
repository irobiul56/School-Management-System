@extends('frontend.layouts.app')
@section('main-section')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title"> Book List </h4> 
                    </div>
                    @include('validate-main')
                    <div class="card-body">
                        <div class="table table-sm">
                            <table class="table mb-0 data-table-search" border="1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Class</th>
                                        <th>Subject</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @forelse ($class as $item)   
                                        <tr>
                                            <td>{{$loop -> index + 1}}</td>
                                            <td>{{$item -> name}}</td>
                                            
                                            <td>
                                               
                                                <ul style="list-style: none; padding:0px;">
                                                    @forelse (json_decode($item -> subject_id) as $per)
                                                        
                                                    <li><i class="fa fa-angle-right"></i>{{$per}}</li>
                                                        

                                                    @empty
                                                        No Record Found
                                                    @endforelse
                                                    
                                                </ul>
                                                
                                            </td>
                                        </tr>
                                    @empty
                                        
                                    @endforelse
        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

