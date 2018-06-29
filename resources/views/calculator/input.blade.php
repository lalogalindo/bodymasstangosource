<div class="form-group">
  <label for="height">{{ $title }}</label>
  <div class="row">
    <div class="col-xs-7">
      <input id="{{ $inputSliderID }}" class="form-control" type="text"
        data-slider-id='{{ $sliderID }}'
        data-slider-min="{{ $sliderMin }}"
        data-slider-max="{{ $sliderMax }}"
        data-slider-step="{{ $sliderStep }}"
        data-slider-value="{{ $sliderValue }}"/>
    </div>
    <div class="col-xs-5">
      <div class="input-group">
        <input name="{{ $inputID }}" type="number" id="{{ $inputID }}" class="form-control" value="{{ $sliderValue }}" step="{{ $step }}">
        <span class="input-group-addon" id="basic-addon2">{{ $addOn }}</span>
      </div>
    </div>
  </div>
</div>
