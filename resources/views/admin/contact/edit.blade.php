<form action="{{ route('admin.contact_info.update') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="phone_number">Phone Number:</label>
        <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $contactInfo->phone_number) }}">
        @error('phone_number')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="operational_hours">Operational Hours:</label>
        <input type="text" class="form-control" id="operational_hours" name="operational_hours" value="{{ old('operational_hours', $contactInfo->operational_hours) }}">
        @error('operational_hours')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Tambahkan input lainnya untuk setiap field -->

    <button type="submit" class="btn btn-primary">Update Contact Info</button>
</form>
