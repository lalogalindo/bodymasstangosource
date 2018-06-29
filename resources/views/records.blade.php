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

          <table>
            @foreach($user->records as $record)
            <tr>
              <td>{{ $record->kilograms }} kg</<td>
              <td>{{ $record->centimeters }} cm</<td>
            </tr>
            @endforeach
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
