@props(['property', 'required' => false])


<div>
    <!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
    <input type="text" name="{{ $property }}" id="{{ $property }}" {{ $required ? 'required' : '' }}
        class="form-control @error($property) is-invalid @enderror" value="{{ $value ?? '' }}"  maxlength="75"/>
    @error($property)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    {{ $slot}}
</div>
