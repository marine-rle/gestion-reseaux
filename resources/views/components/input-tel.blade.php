@props(['property', 'required' => false])


<div>
    <!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
    <input type="tel" name="{{ $property }}" id="{{ $property }}" {{ $required ? 'required' : '' }}
        class="form-control @error($property) is-invalid @enderror" value="{{ old($property) }}"/>
    @error($property)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    {{ $slot}}
</div>
