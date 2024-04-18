@extends('layout.main')

@section('content')
    <h3>Data Students</h3>
    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary btn-sm" onclick="window.location='{{ url('students/add') }}'">
                <i class="fas fa-plus-circle"></i> Add New Data
            </button>
        </div>
        <div class="card-body">
            @if (session('msg'))
                <div class="alert alert-success">
                    {{ session('msg') }}
                </div>
            @endif
            <form action="" method="GET">
                <label for="search" class="form-label">Datalist example</label>
                <input name="search" class="form-control" list="datalistOptions" id="search"
                    placeholder="Type to search..." value="{{ $search }}">

            </form>
            <table class="table table-sm table-striped table-borderes">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Students</th>
                        <th>Full Name</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Emaiender</th>
                        <th>Phone</th>
                        <th>*</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $nomor = 1 + ($students->currentPage() - 1) * $students->perPage();
                    @endphp
                    @foreach ($students as $row)
                        <tr>
                            {{-- <th>{{ $loop->iteration }}</th> --}}
                            <td>{{ $nomor++ }}</td>
                            <td>{{ $row->idstudents }}</td>
                            <td>{{ $row->fullname }}</td>
                            <td>{{ $row->gender == 'M' ? 'Male' : 'Female' }}</td>
                            <td>{{ $row->address }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>
                                <button class="btn btn-warning btn-sm"
                                    onclick="window.location='{{ url('students/' . $row->idstudents) }}'">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <form action="{{ url('students/' . $row->idstudents) }}" method="POST"
                                    onsubmit="return deleteData('{{ $row->fullname }}')" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $students->links() }} --}}
            {!! $students->appends(Request::except('page'))->render() !!}
        </div>
    </div>

    <script>
        function deleteData(name) {
            pesan = confirm(`yakin data students dengan nama ${name} ini di hapus?`);
            if (pesan) return true;
            else return false;
        }
    </script>
@endsection
