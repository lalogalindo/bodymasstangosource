@extends('layouts.app')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Body Mass Calculator</div>
        <div class="panel-body">
          @guest
          In order to see the Body Mass Records, you must sign in.
          @else

          <table class="table table-hover table-striped">
            <thead>
              <th>Date of Measurement</th>
              <th>Height</th>
              <th>Weight</th>
              <th>BMI</th>
            </thead>
            <tbody>
              @foreach($user->records->reverse() as $record)
              <tr>
                <td>{{ $record->created_at->diffForHumans() }}</td>
                <td>{{ $record->kilograms }} kg</<td>
                <td>{{ $record->centimeters }} cm</<td>
                <td>{{ $record->kilograms / ( ($record->centimeters/100)*($record->centimeters/100) ) }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>

          @endguest
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
@endsection
