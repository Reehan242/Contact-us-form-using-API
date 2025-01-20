@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    @forelse ($messages as $message)
                        <div class="card">
                            <div class="card-header">
                                <div class="row justify-content-between">
                                    <span class="text-start">Message From {{ $message->name }} ( {{ $message->created_at->diffForHumans() }} )</span>
                                    <span class="text-start text-primary">On {{ $message->created_at->format('F d, Y, \\a\\t h:i A')}} </span>    
                                </div>
                                
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center fw-bold">" {{ $message->subject }} "</h5>
                                <p>Client Email : {{ $message->email }}</p>
                                <p>Client Message : {{ $message->message }} </p>
                                <form action="{{ route('dashboard.update', $message->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-floating">
                                        <select name="status" class="form-select" id="status"
                                            onchange="this.form.submit()">
                                            <option value="Pending" {{ $message->status == 'Pending' ? 'selected' : '' }}>
                                                Menunggu Dibalas</option>
                                            <option value="Responded"
                                                {{ $message->status == 'Responded' ? 'selected' : '' }}>
                                                Sudah Dibalas</option>
                                            <option value="Rejected" {{ $message->status == 'Rejected' ? 'selected' : '' }}>
                                                Diabaikan / Tidak Valid</option>
                                        </select>
                                        <label for="status">Respond Status</label>
                                    </div>
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
