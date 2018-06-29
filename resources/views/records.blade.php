@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
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
          <div class="row">
            <div class="col-xs-12">
              <div id="myfirstchart" style="height: 250px;"></div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-hover table-striped">
                <thead>
                  <th>Date of Measurement</th>
                  <th>Height</th>
                  <th>Weight</th>
                  <th>BMI</th>
                </thead>
                <tbody>
                  @foreach($user->records->reverse() as $record)
                  <tr class="dataRow">
                    <td class="date" data-date="{{ $record->created_at }}">{{ $record->created_at->diffForHumans() }}</td>
                    <td>{{ $record->kilograms }} kg</<td>
                    <td>{{ $record->centimeters }} cm</<td>
                    <td class="bmi">{{ $record->kilograms / ( ($record->centimeters/100)*($record->centimeters/100) ) }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

          @endguest
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<script>
var allData = [];
Array.prototype.forEach.call(document.getElementsByClassName('dataRow'), function(item){
  allData.push({
    year: item.querySelector('.date').dataset.date,
    value: parseInt(item.querySelector('.bmi').textContent)
  });
})
console.log(allData)

new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: allData,
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value']
});
</script>
@endsection
