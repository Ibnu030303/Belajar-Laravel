@extends('layout.main');

@section('content')
    <h3> Form Edit Students</h3>
    <div class="card">
        <div class="card-header">
            <button class="btn btn-warning btn-sm" onclick="window.location='{{ url('students') }}'">
                Kembali
            </button>
        </div>
        <div class="card-body">
            <form action="{{ url('students/'. $txtid) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="txtid" class="form-label">ID Students</label>
                    <input type="text" name="txtid" class="form-control" id="txtid" value="{{ $txtid }}"
                        readonly>
                </div>
                <div class="mb-3">
                    <label for="txtfullname" class="form-label">Fullname</label>
                    <input type="text" name="txtfullname"
                        class="form-control  @error('txtfullname') is-invalid @enderror" id="txtfullname"
                        value="{{ $txtfullname }}">
                    @error('txtfullname')
                        {{ $message }}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="txtgender" class="form-label">Jenis Kelamin</label>
                    <select class="form-select @error('txtgender') is-invalid @enderror" name="txtgender" id="txtgender"
                        aria-label="Default select example">
                        <option value="" selected>--pilih--</option>
                        <option value="M" {{ $txtgender == 'M' ? 'selected' : '' }}>Male</option>
                        <option value="F" {{ $txtgender == 'F' ? 'selected' : '' }}>Female</option>
                    </select>
                    @error('txtgender')
                        {{ $message }}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="txtaddress" class="form-label">Address</label>
                    <div class="form-floating">
                        <textarea class="form-control @error('txtaddress') is-invalid @enderror" name="txtaddress" id="txtaddress"
                            style="height: 100px">{{ $txtaddress }}</textarea>
                        @error('txtaddress')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="txtemail" class="form-label">Email</label>
                    <input type="email" name="txtemail" class="form-control @error('txtemail') is-invalid @enderror"
                        id="txtemail" value="{{ $txtemail }}">
                    @error('txtemail')
                        {{ $message }}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="txtphone" class="form-label">Phoone</label>
                    <input type="text" name="txtphone" class="form-control @error('txtphone') is-invalid @enderror"
                        id="txtphone" value="{{ $txtphone }}">
                    @error('txtphone')
                        {{ $message }}
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>
@endsection
