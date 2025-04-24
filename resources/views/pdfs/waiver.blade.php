<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Liability Waiver - Whistler Sky Sports</title>
    <style>
        @page {
            margin: 1in;
        }
        body {
            font-family: "Times New Roman", Times, serif;
            line-height: 1.6;
            color: #333;
            margin: 0 auto;
            padding: 40px;
            max-width: 800px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #204fb4;
            padding-bottom: 20px;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #204fb4;
            font-family: Arial, sans-serif;
        }
        .subtitle {
            font-size: 18px;
            margin-bottom: 15px;
            color: #666;
            font-family: Arial, sans-serif;
        }
        .info {
            margin-bottom: 30px;
            padding: 15px;
            background: #f8f9fa;
        }
        .info-row {
            margin-bottom: 10px;
        }
        .label {
            font-weight: bold;
            color: #204fb4;
        }
        .clause {
            margin-bottom: 15px;
            page-break-inside: avoid;
        }
        .clause-number {
            color: #204fb4;
            font-weight: bold;
            margin-right: 5px;
        }
        .initial {
            display: inline-block;
            margin-left: 10px;
            min-width: 30px;
            text-decoration: underline;
            text-decoration-thickness: 1px;
            text-underline-offset: 2px;
            font-family: "Courier New", monospace;
        }
        .signature {
            margin-top: 30px;
            border-top: 1px solid #204fb4;
            padding-top: 20px;
        }
        .signature img {
            max-width: 300px;
            margin: 10px 0;
        }
        .emergency-contact {
            margin-top: 30px;
            border-top: 1px solid #204fb4;
            padding-top: 20px;
        }
        .emergency-contact h3 {
            color: #204fb4;
            margin-bottom: 15px;
            font-size: 18px;
            font-family: Arial, sans-serif;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 15px;
        }
        @media print {
            body {
                padding: 0;
            }
            .header {
                page-break-after: avoid;
            }
            .clause {
                page-break-inside: avoid;
            }
            .signature {
                page-break-inside: avoid;
            }
            .emergency-contact {
                page-break-inside: avoid;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">WHISTLER SKY SPORTS</div>
        <div class="subtitle">LIABILITY WAIVER AND ASSUMPTION OF RISK</div>
    </div>

    <div class="info">
        <div class="info-row">
            <span class="label">Date:</span> {{ $date }}
        </div>
        <div class="info-row">
            <span class="label">Participant Name:</span> {{ $name }}
        </div>
        <div class="info-row">
            <span class="label">Email:</span> {{ $email }}
        </div>
        <div class="info-row">
            <span class="label">Phone:</span> {{ $phone }}
        </div>
    </div>

    <div class="clauses">
        <div class="clause">
            <p><span class="clause-number">1.</span> I understand that this is a long and important legal document that affects my rights and I must read and understand it before participating in any aviation activity. <span class="initial">{{ $initials }}</span></p>
        </div>

        <div class="clause">
            <p><span class="clause-number">2.</span> I acknowledge that aviation involves risk, including serious injury or death. <span class="initial">{{ $initials }}</span></p>
        </div>

        <div class="clause">
            <p><span class="clause-number">3.</span> I acknowledge that there are no warranties on the Aircraft; I accept it as-is and will inspect it before use. <span class="initial">{{ $initials }}</span></p>
        </div>

        <div class="clause">
            <p><span class="clause-number">4.</span> I will raise any concerns about the Aircraft with Whistler Sky Sports before flying. <span class="initial">{{ $initials }}</span></p>
        </div>

        <div class="clause">
            <p><span class="clause-number">5.</span> I hereby RELEASE AND DISCHARGE WHISTLER SKY SPORTS and associated parties from any liability for injuries or damages arising from aviation activities, including those caused by negligence. <span class="initial">{{ $initials }}</span></p>
        </div>

        <div class="clause">
            <p><span class="clause-number">6.</span> I understand that Whistler Sky Sports may use independent flight instructors, who are responsible for their aircraft maintenance and licensing. <span class="initial">{{ $initials }}</span></p>
        </div>

        <div class="clause">
            <p><span class="clause-number">7.</span> I acknowledge the inherent dangers of aviation and EXPRESSLY AND VOLUNTARILY ASSUME ALL RISK. <span class="initial">{{ $initials }}</span></p>
        </div>

        <div class="clause">
            <p><span class="clause-number">8.</span> I WILL NOT SUE OR MAKE A CLAIM against the Released Parties for any losses or damages. <span class="initial">{{ $initials }}</span></p>
        </div>

        <div class="clause">
            <p><span class="clause-number">9.</span> I agree to INDEMNIFY AND HOLD HARMLESS the Released Parties from any claims or legal actions. <span class="initial">{{ $initials }}</span></p>
        </div>

        <div class="clause">
            <p><span class="clause-number">10.</span> I take full responsibility for injuries or damage I may cause or suffer during aviation activities. <span class="initial">{{ $initials }}</span></p>
        </div>

        <div class="clause">
            <p><span class="clause-number">11.</span> I agree to operate any Aircraft safely and responsibly. <span class="initial">{{ $initials }}</span></p>
        </div>

        <div class="clause">
            <p><span class="clause-number">12.</span> I hereby state that my fully clothed weight is 245 lbs or less. <span class="initial">{{ $initials }}</span></p>
        </div>

        <div class="clause">
            <p><span class="clause-number">13.</span> I have not been SCUBA diving in the past 24 hours or have waited the appropriate time to fly safely. <span class="initial">{{ $initials }}</span></p>
        </div>

        <div class="clause">
            <p><span class="clause-number">14.</span> I understand this is a FLIGHT LESSON, not a scenic ride, and I must actively participate. <span class="initial">{{ $initials }}</span></p>
        </div>

        <div class="clause">
            <p><span class="clause-number">15.</span> I acknowledge that the Aircraft may not comply with commercial category safety regulations. <span class="initial">{{ $initials }}</span></p>
        </div>

        <div class="clause">
            <p><span class="clause-number">16.</span> I understand that media taken of me is for personal use only and may not be sold without consent. <span class="initial">{{ $initials }}</span></p>
        </div>

        <div class="clause">
            <p><span class="clause-number">17.</span> I allow Whistler Sky Sports to use media of me for promotional purposes unless I opt out in writing. <span class="initial">{{ $initials }}</span></p>
        </div>

        <div class="clause">
            <p><span class="clause-number">18.</span> I declare I am physically fit and free from medical conditions that could affect my safety. <span class="initial">{{ $initials }}</span></p>
        </div>

        <div class="clause">
            <p><span class="clause-number">19.</span> I declare I am not participating against medical advice. <span class="initial">{{ $initials }}</span></p>
        </div>

        <div class="clause">
            <p><span class="clause-number">20.</span> I agree to notify the instructor immediately if I feel unwell or sustain an injury during activities. <span class="initial">{{ $initials }}</span></p>
        </div>

        <div class="clause">
            <p><span class="clause-number">21.</span> This agreement remains in effect for all future activities with Whistler Sky Sports. <span class="initial">{{ $initials }}</span></p>
        </div>

        <div class="clause">
            <p><span class="clause-number">22.</span> I am at least 18 years old or the legal guardian signing on behalf of a minor participant. <span class="initial">{{ $initials }}</span></p>
        </div>

        <div class="clause">
            <p><span class="clause-number">23.</span> This agreement is a legally binding waiver and assumption of risk. <span class="initial">{{ $initials }}</span></p>
        </div>

        <div class="clause">
            <p><span class="clause-number">24.</span> I have read and understood all the above clauses and agree to be bound by them. <span class="initial">{{ $initials }}</span></p>
        </div>

        <div class="clause">
            <p><span class="clause-number">25.</span> I am wide awake and still wish to participate despite the legal warnings provided above. <span class="initial">{{ $initials }}</span></p>
        </div>
    </div>

    <div class="signature">
        <p><strong>Participant Signature:</strong></p>
        <img src="{{ $signature }}" alt="Signature">
        <p><strong>Date:</strong> {{ $date }}</p>
    </div>

    <div class="emergency-contact">
        <h3>Emergency Contact Information</h3>
        <div class="info-row">
            <span class="label">Emergency Contact Name:</span> {{ isset($emergency_name) ? $emergency_name : 'Not provided' }}
        </div>
        <div class="info-row">
            <span class="label">Relationship:</span> {{ isset($emergency_relationship) ? $emergency_relationship : 'Not provided' }}
        </div>
        <div class="info-row">
            <span class="label">Emergency Contact Phone:</span> {{ isset($emergency_phone) ? $emergency_phone : 'Not provided' }}
        </div>
    </div>

    <div class="footer">
        <p>© {{ date('Y') }} WhistlerSkySports. All rights reserved.</p>
        <p>This document is legally binding and must be completed in full.</p>
    </div>
</body>
</html> 