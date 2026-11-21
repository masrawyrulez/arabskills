@extends('layouts.app')

@section('title', 'Certificate Not Found | ArabSkills Credential Registry')

@section('content')
<section class="py-5 bg-light-soft min-vh-75 d-flex align-items-center">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="p-5 rounded-4 bg-white border shadow-sm">
                    <div class="mb-4 text-warning">
                        <i class="fa-solid fa-triangle-exclamation" style="font-size: 4rem;"></i>
                    </div>

                    <h2 class="fw-bold text-dark mb-2">Certificate Not Found</h2>
                    <p class="text-muted mb-4">
                        We could not locate any active record matching credential code <code class="text-danger fw-bold fs-6">{{ $code }}</code>.
                    </p>

                    <div class="card bg-light border-0 p-4 rounded-3 text-start mb-4">
                        <h6 class="fw-bold text-dark mb-2 small"><i class="fa-solid fa-circle-info text-primary me-2"></i> Troubleshooting Tips:</h6>
                        <ul class="small text-muted mb-0 ps-3">
                            <li class="mb-1">Double check the code spelling or capitalization.</li>
                            <li class="mb-1">Ensure there are no accidental spaces before or after the code.</li>
                            <li>If this certificate was issued recently, it may take a few moments to sync from the Google Sheet.</li>
                        </ul>
                    </div>

                    <!-- Search again input -->
                    <form onsubmit="handleVerifySubmit(event, 'notFoundInput')" class="mb-4">
                        <div class="input-group">
                            <input type="text" id="notFoundInput" class="form-control py-2" placeholder="Try another code (e.g. DEMO100 or WFP100)" required>
                            <button type="submit" class="btn btn-as-primary px-4">
                                <i class="fa-solid fa-magnifying-glass me-1"></i> Verify
                            </button>
                        </div>
                    </form>

                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ url('/') }}" class="btn btn-as-outline">
                            <i class="fa-solid fa-house me-1"></i> Return to Homepage
                        </a>
                        <a href="{{ url('/#contact') }}" class="btn btn-outline-secondary">
                            Contact Support
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
