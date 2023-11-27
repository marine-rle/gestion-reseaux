<div>
    <!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
    <input type="text" name="{{ $property }}" id="{{ $property }}"
        class="form-control @error($property) is-invalid @enderror" value="{{ old($property) }}" />
    @error($property)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>