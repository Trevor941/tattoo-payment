
                   @extends('layouts.dashboard')
                   @section('content')
                   <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Appointment List</h1>
                        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                    </div>

                    <!-- Content Row -->
                    <div class="row p-2 justify-content-center">
                        <div class="col-md-3 p-4 bg-columns">
                            <h5 class="text-center">New Appointment</h5>
                            <hr>
                            <form class="" action="{{route('appointments.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                 <label for="customername">Customer Name:</label>
                                 <input type="text" class="form-control @error('customername') is-invalid @enderror" name="customername">
                                 @error('customername')
                                 <small class="text-danger text-small">{{ $message }}</small>
                                  @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email">
                                @error('email')
                                 <small class="text-danger text-small">{{ $message }}</small>
                                  @enderror
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Phone:</label>
                                    <input type="text" class="form-control  @error('phone') is-invalid @enderror" name="phone">
                                    @error('phone')
                                 <small class="text-danger text-small">{{ $message }}</small>
                                  @enderror
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Date:</label>
                                <input type="datetime-local" class="form-control @error('date') is-invalid @enderror"  name="date">
                                @error('date')
                                 <small class="text-danger text-small">{{ $message }}</small>
                                  @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger btn-block">Add New Appointment</button>
                                </div>
                              </form>
                        </div>
                        <div class="col-md-9 p-4 borderline">
                            <h5 class="text-center">Upcoming Appointments</h5>
                            @if($appointments->count() > 0)
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                          <th>Customer Name</th>
                                          <th>Email</th>
                                          <th>Phone</th>
                                          <th>Date and Time (<i class="fas fa-clock-o"></i>)</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($appointments as $appointment)
                                        <tr>
                                            <td>{{$appointment->customername}}</td>
                                            <td>{{$appointment->email}}</td>
                                            <td>{{$appointment->phone}}</td>
                                            <td>{{ date('d/m/Y', strtotime($appointment->date)) }} at  {{ date('h:i', strtotime($appointment->date)) }} </td>
                                          </tr> 
                                        @endforeach
                                      </tbody>
                                </table>
                            </div>
                            @else
                            <hr>
                            <p class="text-center">No appointments available at the moment.</p>
                            @endif
                        </div>
                    </div>

                    @endsection
                    @section('onpage-style')
                   <style>
                     .bg-columns{
                        background: #eee !important;
                     }
                     .borderline{
                        border: 1px solid #eee !important;
                     }
                     .table-bordered thead td, .table-bordered thead th {
                                     min-width: 150px !important;
                     }
                    

                   </style>
                    @endsection