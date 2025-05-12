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
        margin: 0 -10px;
        margin-bottom: 28px;
    }
    
    .image-col {
        flex: 0 0 50%;
        padding: 12px 10px;
        box-sizing: border-box;
    }
    
    .image-col img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        display: block;
    }
    
    .content-section {
        margin-bottom: 36px;
    }
    
    .main-content {
        padding-top: 32px;
    }
    
    p {
        margin: 28px 0;
        padding: 0 12px;
    }
    
    .feature-image {
        width: 100%;
        height: auto;
        object-fit: cover;
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
        <!-- Content will go here -->
        <div class="content-section">
            <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/01842019-bd0f-4fa0-9f1c-4f3ddbd9b972/iFun16%2BSP-EN.jpg?format=2500w" alt="iFun16 SP" class="feature-image">
            <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/560b36ba-56bb-4c0a-9364-84c2e7f2fe7a/skypper+EVO+2022+EN-LOW.jpg?format=2500w" alt="Skypper EVO 2022 EN LOW" class="feature-image">
            <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/230cfc76-797f-4496-be66-16afd4978c6d/skypper+EVO+2022+EN-LOW2J.jpg?format=2500w" alt="Skypper EVO 2022 EN LOW 2" class="feature-image">
            <p style="font-size: 1.1rem; line-height: 1.6;">
                <strong>A Rugged and Sporty Flying Motorcycle</strong><br>
                The Air Creation Skypper EVO is strong and light with its modern truss frame. The Skypper EVO is also powerful with its 80 or optional 100hp Rotax engine. This motorcycle of the sky can be set up with a full front fairing or flown naked with the stock windshield and instrument cluster. With the iFun 16SP, the Skypper's wing can be easily folded and stored in the corner of a hangar or in an enclosed trailer. If more speed is what you are after, the Skypper can be equipped with either the NuviX or BioniX² wings. The Air Creation Skypper is an affordable trike that does it all.
            </p>
        </div>
        
        <div class="content-section">
            <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/171d57ad-767d-4928-a92d-cffe66bd68a8/iFun16%2BSP%2B2-EN.jpg?format=2500w" alt="iFun16 SP 2" class="feature-image">
        
            <div class="image-row">
                <div class="image-col">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/2981e6c0-63ea-48f9-b517-bbb1f292a4e7/Sol_Skypper_evo.JPG?format=2500w" alt="Sol Skypper Evo">
                </div>
                <div class="image-col">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/11018d2f-7000-4152-b654-c6114e5b8f99/Gris+6.JPG?format=2500w" alt="Gris 6">
                </div>
            </div>
            
            <div class="image-row">
                <div class="image-col">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/d4eff573-07c0-45f8-8493-734aca3257b2/Gris+8.JPG?format=2500w" alt="Gris 8">
                </div>
                <div class="image-col">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/83676d5b-67a2-4186-9d6e-a274feebe74c/Gris+7.JPG?format=2500w" alt="Gris 7">
                </div>
            </div>
            
            <div class="image-row">
                <div class="image-col">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/1a8c3894-6e49-4598-9945-ab5895a695bc/4+Skypper+sol+%284%29.JPG?format=2500w" alt="Skypper Sol">
                </div>
                <div class="image-col">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/9dd18251-66dd-4ff9-9b88-b1af994f5f61/Skypper+EVO+iS+%284%29.JPG?format=2500w" alt="Skypper EVO iS">
                </div>
            </div>
        </div>
        
        <div class="content-section">
            <div class="image-row">
                <div class="image-col">
                    <iframe width="100%" height="300" src="https://www.youtube.com/embed/QnqeGf9jFKc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="image-col">
                    <iframe width="100%" height="300" src="https://www.youtube.com/embed/6zGB30wKOcs" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            
            <div class="image-row">
                <div class="image-col">
                    <iframe width="100%" height="300" src="https://www.youtube.com/embed/Oz2ZpaMmDDM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="image-col">
                    <iframe width="100%" height="300" src="https://www.youtube.com/embed/edIngHIdEWU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        
        <div class="content-section">
            <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/5bcfd866-1c3c-40e5-a658-f7ccefc461a0/Skypper+24+Price+P1J.jpg?format=2500w" alt="iFun16 SP" class="feature-image">
            <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/ba6fd1a7-be52-41d2-940a-6cb9c22832dd/Kit+Skypper+Price+P2J.jpg?format=2500w" alt="iFun16 SP" class="feature-image">
        </div>
    </div>
</div>
@endsection 