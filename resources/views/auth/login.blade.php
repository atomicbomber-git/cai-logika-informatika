@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card m-auto" style="width: 30rem">
            <div class="card-body">
                <form action="{{ route("login") }}"
                      method="post">
                    @csrf

                    <div class="form-group">
                        <label for="nip"> NIP:</label>
                        <input
                            data-cy="nip_field"
                            id="nip"
                            type="text"
                            placeholder="NIP"
                            class="form-control {{ $errors->has("nip") ? "is-invalid" : "" }}"
                            name="nip"
                            value="{{ old("nip") }}"
                        />
                        @foreach($errors->get("nip") ?? [] as $feedback)
                            <span class="invalid-feedback">
                            {{ $feedback }}
                        </span>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <label for="password_field"> Password:</label>
                        <input
                            data-cy="password_field"
                            id="password"
                            type="password"
                            placeholder="Password"
                            class="form-control {{ $errors->has("password") ? "is-invalid" : "" }}"
                            name="password"
                            value="{{ old("password") }}"
                        />
                        @foreach($errors->get("password") ?? [] as $feedback)
                            <span class="invalid-feedback">
                            {{ $feedback }}
                        </span>
                        @endforeach
                    </div>

                    <div class="d-flex justify-content-end">
                        <button data-cy="login_button" class="btn btn-outline-primary">
                            Log In
                            <i class="fas fa-sign-in-alt"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
