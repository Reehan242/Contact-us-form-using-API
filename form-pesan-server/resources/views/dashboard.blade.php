@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    @forelse ($messages as $message)
                        <div class="card">
                            <div class="card-header">Message From {{ $message->name }}</div>
                            <div class="card-body">
                                <p>Client Email : {{ $message->email }}</p>
                                <p>Client Message : {{ $message->message }} </p>
                                <form action="{{ route('dashboard.update', $message->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="form-select" onchange="this.form.submit()">
                                        <option value="Pending" {{ $message->status == 'Pending' ? 'selected' : '' }}>
                                            Menunggu Dibalas</option>
                                        <option value="Responded" {{ $message->status == 'Responded' ? 'selected' : '' }}>
                                            Sudah Dibalas</option>
                                        <option value="Rejected" {{ $message->status == 'Rejected' ? 'selected' : '' }}>
                                            Diabaikan / Tidak Valid</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="card">
                            <div class="card-body">
                                <p>Currently no message</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
