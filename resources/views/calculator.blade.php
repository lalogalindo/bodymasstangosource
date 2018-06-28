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
          <div id="input" class="col-md-8">
            <p>Please, enter your height and weight.</p>
            <div class="form-group">
              <label for="height">Height</label>
              <div class="row">
                <div class="col-md-9">
                  <input id="heightSlide" class="form-control" data-slider-id='heightSlider' type="text" data-slider-min="120" data-slider-max="210" data-slider-step="1" data-slider-value="170"/>
                </div>
                <div class="col-md-3">
                  <input type="number" id="height" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="weight">Weight</label>
              <div class="row">
                <div class="col-md-9">
                  <input id="weightSlide" class="form-control" data-slider-id='weightSlider' type="text" data-slider-min="120" data-slider-max="210" data-slider-step="1" data-slider-value="170"/>
                </div>
                <div class="col-md-3">
                  <input type="number" id="weight" class="form-control">
                </div>
              </div>
            </div>
          </div>
          <div id="image" class="col-md-4"></div>
          @endguest
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
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
