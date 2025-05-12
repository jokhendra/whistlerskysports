@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #eaf0f7;
        font-family: Arial, sans-serif;
    }
    
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 2rem;
        background-color: white;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 50;
    }
    
    .logo-container {
        height: 60px;
    }
    
    .logo-container img {
        height: 100%;
        width: auto;
    }
    
    .contact-link {
        color: #0C345F;
        font-weight: bold;
        text-decoration: none;
        padding: 0.5rem 1rem;
        border: 2px solid #0C345F;
        border-radius: 4px;
        transition: all 0.3s ease;
    }
    
    .contact-link:hover {
        background-color: #0C345F;
        color: white;
    }
    
    .image-row {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -8px;
        margin-bottom: 24px;
    }
    
    .image-col {
        flex: 0 0 50%;
        padding: 12px 8px;
        height: 300px;
    }
    
    .image-col img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .content-container {
        margin-bottom: 32px;
    }
    
    .main-content {
        padding-top: 32px;
    }
    
    .content-section {
        margin-bottom: 36px;
    }
    
    p {
        margin: 24px 0;
    }
    
    h2 {
        margin: 32px 0 20px 0;
    }
    
    .video-container {
        margin-bottom: 36px;
    }
    
    .video-col {
        margin-bottom: 24px;
    }
</style>

<div>
    <!-- Header -->
    <div class="header">
        <div class="logo-container">
            <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/9ceefa41-24ac-430b-a72e-1bc1c1b91267/unnamed-2.jpg?format=1500w" alt="Air Creation">
        </div>
        <a href="/contact" class="contact-link">Contact Us</a>
    </div>
    
    <div class="pt-24 max-w-6xl mx-auto px-4 main-content">
        <!-- Page content will go here -->
        <div class="content-section">
            <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/fd3d3627-28e7-4f10-8265-dba2dc645f20/Tanarg%2Bneo%2Bpresentation-EN.jpg?format=2500w" alt="Tanarg Neo Presentation" style="width: 100%; height: auto; object-fit: cover; margin-bottom: 24px;">
            
            <p style="margin-top: 1.5rem; font-size: 1.1rem; line-height: 1.5; padding: 0 12px;">
                <strong>Cross Country In Comfort</strong><br>
                The flagship of the Air Creation lineup is the Tanarg neo trike equipped with the BinoiX² wing. This trike and wing combination provides you with an amazing "hands off" speed range of 50 -90 mph, allowing you to fly slow with the ultralights, or trim for speed on that long cross country. The BioniX² wing now has a maximum take-weight of 1044lbs, it has been optimized for heavy loads providing perfect harmony with the Tanarg neo's large baggage and fuel carrying capacity. 
                The BioniX²'s short take-off and slow flight aptitudes combined with the robustness, stability and braking efficiency of the Tanarg neo provide a truly unique "off-road" capability. This combination caters to serious adventure and travel.
            </p>
        </div>

        <div class="content-section">
            <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/52c12cf1-23b1-4a06-904c-448fec98e46b/Tanarg+neo+2019+options+%26+color+EN+RV-page-001+%284%29.jpg?format=2500w" alt="Tanarg Neo 2019 Options" style="width: 100%; height: auto; object-fit: cover; margin-bottom: 24px;">
            <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/b08ff4e8-388f-4161-adbd-ceb98034b94d/Tanarg+neo+2019+options+%26+color+EN+RV-page-002.jpg?format=2500w" alt="Tanarg Neo 2019 Options" style="width: 100%; height: auto; object-fit: cover; margin-bottom: 24px;">
            <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/4c17fffb-c6ad-4fc4-ad06-bcdf67b57d59/Tanarg+912+neo+IS+presentation+EN.jpg?format=2500w" alt="Tanarg Neo 2019 Options" style="width: 100%; height: auto; object-fit: cover; margin-bottom: 24px;">
            <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/acdd4e22-e4ee-4d22-a9a8-fb7583d59791/Tanarg+912+neo+IS+presentation+EN2J.jpg?format=2500w" alt="Tanarg Neo 2019 Options" style="width: 100%; height: auto; object-fit: cover; margin-bottom: 24px;">
            <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/3a02de3a-d806-48e2-8682-e34ce396f983/BIONIX2-Fifteen-EN-2024P1J.jpg?format=2500w" alt="Tanarg Neo 2019 Options" style="width: 100%; height: auto; object-fit: cover; margin-bottom: 24px;">
            <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/9659ff52-3743-4a80-bca7-71f2ad874db5/BIONIX2-Fifteen-EN-2024P2J.jpg?format=2500w" alt="Tanarg Neo 2019 Options" style="width: 100%; height: auto; object-fit: cover; margin-bottom: 24px;">
        </div>
        
        <!-- New images in a 2-column layout -->
        <div class="content-section">
            <div class="image-row">
                <div class="image-col">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/a3d414ba-5e91-4b3c-afdd-a92c1ec4b42b/Tanarg+Neo+Blaze-+Bleu_0089.JPG?format=2500w" alt="Tanarg Neo Blaze Blue">
                </div>
                <div class="image-col">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/6a444c53-e4f6-4182-97aa-c16817bf5507/Tanarg+neo+Explorer_0253.JPG?format=2500w" alt="Tanarg Neo Explorer">
                </div>
            </div>
            
            <div class="image-row">
                <div class="image-col">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/c8478646-9b2f-4194-9797-054967c25d18/Vol+tanarg+ne%CC%81o.JPG?format=2500w" alt="Vol Tanarg Neo">
                </div>
                <div class="image-col">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/354ce949-b367-4288-b10d-f7759e535ab6/Tanarg+iS+Rouge+434.JPG?format=2500w" alt="Tanarg iS Rouge">
                </div>
            </div>
            
            <div class="image-row">
                <div class="image-col">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/b6dd517e-4c8f-49ae-ba63-00244897828d/3+Neo+%281%29-c.JPG?format=2500w" alt="Neo 1">
                </div>
                <div class="image-col">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/701f0df6-746c-427b-bf3f-d0aac7b3211c/3+Neo+%283%29.JPG?format=2500w" alt="Neo 3">
                </div>
            </div>
            
            <div class="image-row">
                <div class="image-col">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/39bcfaaf-4d66-4033-96ea-8603345c78a3/Tanarg+iS+Rouge+412.jpg?format=2500w" alt="Tanarg iS Rouge 412">
                </div>
                <div class="image-col">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/b2b6cf8c-68a8-4cea-8d02-bd4ed172c228/Tanarg+iS+Rouge+415.JPG?format=2500w" alt="Tanarg iS Rouge 415">
                </div>
            </div>
            
            <div class="image-row">
                <div class="image-col">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/05451308-c927-45cc-b001-217da08f6bbc/BioniX%C2%B2+pap.+n-r-j_0022+-+C.JPG?format=2500w" alt="BioniX² pap">
                </div>
                <div class="image-col">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/47b3feae-e92e-4467-aea4-0c5771e8af54/Bio%C2%B2+Jessie-c.JPG?format=2500w" alt="Bio² Jessie">
                </div>
            </div>
            
            <div class="image-row">
                <div class="image-col">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/ff05181c-aa07-4d91-916a-04cbf937ec64/BioniX%C2%B2+perso+bleue+1-C.jpg?format=2500w" alt="BioniX² perso bleue">
                </div>
                <div class="image-col">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/02210d0b-b809-4871-ab2a-9712d0ef477f/BioniX%C2%B2+pap.rose+-+C.JPG?format=2500w" alt="BioniX² pap.rose">
                </div>
            </div>
            
            <div class="image-row">
                <div class="image-col">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/e581be42-b07a-4d09-ba7c-f61ee3001618/BioniX%C2%B2+SpiritsUp+17-3.jpg?format=2500w" alt="BioniX² SpiritsUp">
                </div>
                <div class="image-col">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/eedc7e8c-d2ce-4a67-b621-2cd2a52c7ebf/BioniX%C2%B2+Perso+J%26N_0021.jpg?format=2500w" alt="BioniX² Perso J&N">
                </div>
            </div>
        </div>
        
        <div class="content-section">
            <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/74485d93-84bd-410f-8d44-3b08303ec359/Screen+Shot+2022-10-19+at+9.36.28+AM.png?format=2500w" alt="Tanarg Neo 2019 Options" style="width: 100%; height: auto; object-fit: cover; margin-bottom: 24px;">
        </div>
        
        <!-- YouTube Videos Container -->
        <div class="content-section">
            <h2 class="text-2xl font-bold mb-4 px-2">Watch Tanarg Neo in Action</h2>
            <div class="video-container">
                <!-- First row of videos -->
                <div class="image-row">
                    <div class="image-col video-col">
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/jc4Su-WuZeg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="image-col video-col">
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/1pZuLHDyPz0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                
                <!-- Second row of videos -->
                <div class="image-row">
                    <div class="image-col video-col">
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/x9cn2esV5Es" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="image-col video-col">
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/MOs_oUgiz2Y" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="content-section">
            <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/113356f8-2362-4c5f-9576-194e1be192a5/Kit+Tanarg+P1J.jpg?format=2500w" alt="Tanarg Neo 2019 Options" style="width: 100%; height: auto; object-fit: cover; margin-bottom: 24px;">
            <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/0f9dcbf7-49ee-45c2-823a-08bd88d6e954/Kit+Tanarg+P2J.jpg?format=2500w" alt="Tanarg Neo 2019 Options" style="width: 100%; height: auto; object-fit: cover; margin-bottom: 24px;">
        </div>
    </div>
</div>
@endsection 