@extends('layouts.app')

@section('content')
<div class="about-container">
    <header class="about-header">
        <h1 class="page-title">About This Application</h1>
        <p class="page-lead">
            Technical Formative Assessment 5 establishes the core Model-View-Controller request lifecycle and modular template structure in Laravel 11.
        </p>
    </header>

    <section class="content-section" aria-labelledby="flow-heading">
        <h2 id="flow-heading" class="section-title">Request Execution Flow</h2>
        <p class="section-lead">
            Incoming browser requests follow a four-step lifecycle:
        </p>

        <ol class="flow-list">
            <li class="flow-item">
                <div class="flow-marker">1</div>
                <div class="flow-content">
                    <h3 class="flow-step-title">Incoming URL</h3>
                    <p class="flow-step-text">The browser issues an HTTP GET request to an ingress endpoint such as <code>/customers</code> or <code>/users</code>.</p>
                </div>
            </li>

            <li class="flow-item">
                <div class="flow-marker">2</div>
                <div class="flow-content">
                    <h3 class="flow-step-title">Route Matching</h3>
                    <p class="flow-step-text">The router defined in <code>routes/web.php</code> intercepts the request and matches the URI to its registered controller method.</p>
                </div>
            </li>

            <li class="flow-item">
                <div class="flow-marker">3</div>
                <div class="flow-content">
                    <h3 class="flow-step-title">Controller Execution</h3>
                    <p class="flow-step-text">The controller handles input and prepares model records for presentation from static PHP arrays.</p>
                </div>
            </li>

            <li class="flow-item">
                <div class="flow-marker">4</div>
                <div class="flow-content">
                    <h3 class="flow-step-title">View Presentation</h3>
                    <p class="flow-step-text">The controller renders data collections into Blade templates, producing semantic HTML for the response.</p>
                </div>
            </li>
        </ol>
    </section>

    <section class="content-section" aria-labelledby="decision-heading">
        <h2 id="decision-heading" class="section-title">Data Storage Design Decision</h2>
        <p class="section-lead">
            Architectural rationale for static PHP arrays in TFA5:
        </p>
        <div class="details-card">
            <p class="details-text">
                For this initial prototype, data records are modeled as static PHP arrays inside the controllers to isolate and verify pure routing and template compilation before introducing relational database persistence in TFA6.
            </p>
        </div>
    </section>
</div>
@endsection
