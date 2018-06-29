@extends('layouts.app')
@section('styles')
<style>
.slider.slider-horizontal{
  width: 100%;
}
</style>
@endsection
@section('content')
<div class="container">
  @if( empty($status) )
  <div class="row justify-content-center">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Body Mass Calculator</div>
        <div class="panel-body">
          @guest
          In order to use the Body Mass Calculator, you must sign in.
          @else
          <p>Please, enter your height and weight.</p>
          <form method="post" action="{{ route('newRecord') }}">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

          @component('calculator.input',[
            'title' => 'Height',
            'inputID' => 'height',
            'inputSliderID' => 'heightSlide',
            'sliderID' => 'heightSlider',
            'sliderMin' => '30',
            'sliderMax' => '250',
            'sliderStep' => '1',
            'sliderValue' => '170',
            'addOn' => 'cm',
            'step' => '1'
          ])
          @endcomponent

          @component('calculator.input',[
            'title' => 'Weight',
            'inputID' => 'weight',
            'inputSliderID' => 'weightSlide',
            'sliderID' => 'weightSlider',
            'sliderMin' => '10',
            'sliderMax' => '200',
            'sliderStep' => '0.1',
            'sliderValue' => '80',
            'addOn' => 'kg',
            'step' => '0.1'
          ])
          @endcomponent

            <div class="panel-footer text-right">
              <button type="submit" class="btn btn-primary">Calculate</button>
            </div>
          </form>
          @endguest
        </div>
      </div>
    </div>
  </div>
  @else
  <div class="row justify-content-center">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Body Mass Calculator</div>
        <div class="panel-body">
          Hola
        </div>
      </div>
    </div>
  </div>
  @endif
</div>
@endsection

@section('script')
<script>
$(document)
.on('change','#heightSlide,#weightSlide',function(){
  $(this).closest('.form-group').find('.input-group input').val(this.value)
})
.on('change','#height,#weight',function(){
  $('#'+this.id+'Slide').slider('setValue',this.value,true)
})
$('#heightSlide').slider({
	formatter: function(value) {
		return 'Current value: ' + value;
	}
});
$('#weightSlide').slider({
	formatter: function(value) {
		return 'Current value: ' + value;
	}
});
</script>
@endsection
