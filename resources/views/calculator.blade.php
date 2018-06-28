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
  <div class="row justify-content-center">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Body Mass Calculator</div>
        <div class="panel-body">
          @guest
          In order to use the Body Mass Calculator, you must sign in.
          @else
          <p>Please, enter your height and weight.</p>
          <div class="form-group">
            <label for="height">Height</label>
            <div class="row">
              <div class="col-md-8">
                <input id="heightSlide" class="form-control" data-slider-id='heightSlider' type="text" data-slider-min="30" data-slider-max="250" data-slider-step="1" data-slider-value="170"/>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" id="height" class="form-control" value="170">
                  <span class="input-group-addon" id="basic-addon2">cm</span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="weight">Weight</label>
            <div class="row">
              <div class="col-md-8">
                <input id="weightSlide" class="form-control" data-slider-id='weightSlider' type="text" data-slider-min="10" data-slider-max="200" data-slider-step="0.1" data-slider-value="170"/>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" id="weight" class="form-control" value="170">
                  <span class="input-group-addon" id="basic-addon2">kg</span>
                </div>
              </div>
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
