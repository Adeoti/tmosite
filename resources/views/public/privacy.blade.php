@extends('layouts.app')

@section('title', 'Privacy Policy')

@section('content')
    <section class="section legal-page">
        <div class="container" style="max-width: 780px;">
            <div class="eyebrow">Legal</div>
            <h1>Privacy Policy</h1>
            <p class="legal-page__updated">Last updated: {{ now()->format('F Y') }}</p>

            <h2>Information We Collect</h2>
            <p>When you book a consultation, send a message, or chat with us on WhatsApp, we collect the details you provide, such as your name, email address, phone number and project information, so we can respond to your request.</p>

            <h2>How We Use Your Information</h2>
            <p>We use the information you share to respond to enquiries, schedule and confirm consultations, send reminders about upcoming calls, and improve our services. We do not sell your information to third parties.</p>

            <h2>WhatsApp Communication</h2>
            <p>If you choose to contact us via WhatsApp, that conversation is subject to WhatsApp's own privacy policy in addition to this one.</p>

            <h2>Cookies</h2>
            <p>Our website may use essential cookies required for core functionality, such as keeping your session secure while filling out a form.</p>

            <h2>Data Retention</h2>
            <p>We retain booking and contact information for as long as necessary to provide our services and meet legal obligations.</p>

            <h2>Your Rights</h2>
            <p>You may request access to, correction of, or deletion of your personal information at any time by contacting us using the details on our Contact page.</p>

            <h2>Contact Us</h2>
            <p>Questions about this policy can be sent to {{ \App\Models\Setting::get('contact_email') }} or via WhatsApp at {{ \App\Models\Setting::get('whatsapp_display') }}.</p>
        </div>
    </section>
@endsection