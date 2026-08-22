@extends('layouts.app')

@section('title', 'Terms of Service')

@section('content')
    <section class="section legal-page">
        <div class="container" style="max-width: 780px;">
            <div class="eyebrow">Legal</div>
            <h1>Terms of Service</h1>
            <p class="legal-page__updated">Last updated: {{ now()->format('F Y') }}</p>

            <h2>Agreement to Terms</h2>
            <p>By using this website or engaging TMO Ultimate Innovations Ltd. for services, you agree to the following terms.</p>

            <h2>Services</h2>
            <p>TMO Ultimate Innovations Ltd. provides Shopify and e-commerce development, AI video production, 3D animation, AI voice agent development, and related passive income systems. Specific scope, timelines and pricing for any engagement are agreed separately with each client.</p>

            <h2>Bookings and Consultations</h2>
            <p>Free consultations booked through this website are subject to availability. We will confirm your requested time by email; a booking request is not confirmed until you receive that confirmation.</p>

            <h2>Intellectual Property</h2>
            <p>Unless otherwise agreed in writing, deliverables produced for a client become the client's property upon full payment. Our own tools, frameworks and internal processes remain the property of TMO Ultimate Innovations Ltd.</p>

            <h2>Limitation of Liability</h2>
            <p>TMO Ultimate Innovations Ltd. is not liable for indirect or consequential losses arising from the use of our website or services, to the extent permitted by law.</p>

            <h2>Changes to These Terms</h2>
            <p>We may update these terms from time to time. Continued use of our website after changes are posted constitutes acceptance of the updated terms.</p>

            <h2>Contact Us</h2>
            <p>Questions about these terms can be sent to {{ \App\Models\Setting::get('contact_email') }} or via WhatsApp at {{ \App\Models\Setting::get('whatsapp_display') }}.</p>
        </div>
    </section>
@endsection