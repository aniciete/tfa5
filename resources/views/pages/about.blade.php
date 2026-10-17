@extends('layouts.app')

@section('content')
<div class="about-container">
    <header class="section-header">
        <div class="tag-row">
            <span class="market-tag">System Overview &bull; Architecture</span>
            <span class="status-indicator">
                <span class="status-pip" aria-hidden="true"></span>
                <span class="status-label">Documented Flow</span>
            </span>
        </div>
        <h1 class="page-title">About This Application</h1>
        <p class="section-lead">
            Technical Formative Assessment 5 focuses on establishing the front controller, routing tables, controllers, and Blade view rendering layers in Laravel.
        </p>
    </header>

    <div class="about-layout">
        <!-- Connected 4-Step Flow -->
        <section class="flow-section" aria-labelledby="flow-heading">
            <div class="flow-mast">
                <h2 id="flow-heading" class="section-heading">Request Execution Flow</h2>
                <p class="section-sublead">
                    In Laravel, each user action follows an explicit Model-View-Controller path without runtime guesswork:
                </p>
            </div>

            <ol class="staggered-flow-rail" role="list">
                <li class="flow-node step-odd">
                    <div class="node-track" aria-hidden="true">
                        <span class="oversized-num">01</span>
                        <div class="track-line"></div>
                    </div>
                    <div class="node-card">
                        <div class="node-kicker">STAGE 01 &bull; INGRESS</div>
                        <strong class="flow-step-title">1. Incoming URL</strong>
                        <p class="flow-step-text">The browser issues an HTTP GET request to a path such as <code>/customers</code> or <code>/users</code>.</p>
                    </div>
                </li>

                <li class="flow-node step-even">
                    <div class="node-track" aria-hidden="true">
                        <span class="oversized-num">02</span>
                        <div class="track-line"></div>
                    </div>
                    <div class="node-card">
                        <div class="node-kicker">STAGE 02 &bull; DISPATCH</div>
                        <strong class="flow-step-title">2. Route Matching</strong>
                        <p class="flow-step-text">The router in <code>routes/web.php</code> resolves the URL to a specific controller and action method.</p>
                    </div>
                </li>

                <li class="flow-node step-odd">
                    <div class="node-track" aria-hidden="true">
                        <span class="oversized-num">03</span>
                        <div class="track-line"></div>
                    </div>
                    <div class="node-card">
                        <div class="node-kicker">STAGE 03 &bull; PROCESS</div>
                        <strong class="flow-step-title">3. Controller Execution</strong>
                        <p class="flow-step-text">The controller method prepares required data, such as a static array of records, and calls the Blade view renderer.</p>
                    </div>
                </li>

                <li class="flow-node step-even">
                    <div class="node-track" aria-hidden="true">
                        <span class="oversized-num">04</span>
                        <div class="track-terminal"></div>
                    </div>
                    <div class="node-card">
                        <div class="node-kicker">STAGE 04 &bull; RESPONSE</div>
                        <strong class="flow-step-title">4. View Presentation</strong>
                        <p class="flow-step-text">The Blade view iterates the data with <code>@@foreach</code>, applies HTML escaping, and returns the finished response to the client.</p>
                    </div>
                </li>
            </ol>
        </section>

        <!-- Contrasting Implementation Note -->
        <aside class="storage-dispatch-memo" aria-labelledby="memo-heading">
            <div class="memo-mast">
                <div class="memo-top-row">
                    <span class="memo-stamp">ARCHITECTURAL MEMORANDUM</span>
                    <span class="memo-ref">REF // TFA5-STORAGE</span>
                </div>
                <h2 id="memo-heading" class="memo-title">Data Storage Design Decision</h2>
            </div>
            <div class="memo-content">
                <p class="memo-lead">
                    This application deliberately uses in-memory static PHP arrays inside controller methods instead of a live database. This allows validating the routing and templating pipeline before adding schema migrations, seeders, and relational queries in subsequent modules.
                </p>
                <div class="memo-meta-ledger">
                    <div class="ledger-row">
                        <span class="ledger-term">Storage Mechanism:</span>
                        <span class="ledger-value">In-Memory Static Arrays</span>
                    </div>
                    <div class="ledger-row">
                        <span class="ledger-term">Database Requirement:</span>
                        <span class="ledger-value">None (Phase 1 Pipeline Validation)</span>
                    </div>
                    <div class="ledger-row">
                        <span class="ledger-term">Controllers:</span>
                        <span class="ledger-value">CustomerController &amp; UserController</span>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>
@endsection
