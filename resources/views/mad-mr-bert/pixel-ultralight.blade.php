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
            <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/f2e8a700-2868-4c7e-8551-c94409fde39e/1080adv-pixelkit-dollars.png?format=2500w" alt="Pixel & E-Pixel Ultralight Header" class="feature-image">
            <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/b8572d28-078e-4f69-911b-6577c772682a/iFun%2B13%2BSP%2BPixel%2BEN%2Blow.jpeg?format=2500w" alt="Pixel & E-Pixel Ultralight" class="feature-image">
            <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/257db14e-321c-4556-a7a4-d7ad12460485/iFun%2B13%2BSP%2BPixel%2B%2Blow1.jpeg?format=2500w" alt="Pixel & E-Pixel Ultralight" class="feature-image">
        </div>
       
        <div class="content-section">
            <div class="image-row">
                <div class="image-col">
                    <iframe width="100%" height="300" src="https://www.youtube.com/embed/Dgzk1AP6XpQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="image-col">
                    <iframe width="100%" height="300" src="https://www.youtube.com/embed/UXiomgXvG3I" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        
        <div class="content-section">
            <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/7d560979-6186-4f36-9a12-c3abe3d9ae31/epixel-presentation+1.jpg?format=2500w" alt="Pixel Ultralight Price 1" class="feature-image">
            <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/b7b65727-8059-4fa2-9a02-310f986bd752/epixel-presentation+2.jpg?format=2500w" alt="Pixel Ultralight Price 2" class="feature-image">
            <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/1971f36e-9595-4b98-82ea-43c0c113fd22/Pixel+EN+Price+J.jpg?format=2500w" alt="Pixel Ultralight Price 3" class="feature-image">
            <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/3cacb7da-c0ae-4f3c-9603-28f6f3970d5d/e-Pixel+Pricing+1.jpg?format=2500w" alt="Pixel Ultralight Price 4" class="feature-image">
            <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/4b788d84-8022-4669-95ff-79b5a01b3a19/e-Pixel+pricing+2.jpg?format=2500w" alt="Pixel Ultralight Price 5" class="feature-image">
        </div>
    </div>
</div>
@endsection 