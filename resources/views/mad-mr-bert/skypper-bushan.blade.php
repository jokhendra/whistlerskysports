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
            <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/8042bd68-77c8-4796-a0f7-fbe9f8a84f09/Skypper-Bush-recto-EN-LOW.jpg?format=2500w" alt="Skypper Bushan Header" class="feature-image">
            
            <p style="font-size: 1.1rem; line-height: 1.6;">
                <strong>The Ultimate Backcountry Adventure Machine</strong><br>
                Head for the mountains with a new Skypper Bush trike. This trike comes equipped with the rugged Skypper frame, 22" low pressure tires, Beringer brakes and a size XL wing allowing you access to some of the roughest backcountry strips. Air Creation is a name you can trust when you need to rely on quality equipment. The trike and wing are now available as a quick build kit with an affordable price tag. 
            </p>

            <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/0a257b1b-e996-4f47-9967-26d61984380e/Skypper-Bush-New.jpg?format=2500w" alt="Skypper Bushan Header" class="feature-image">
        </div>
        
        <div class="content-section">
            <div class="image-row">
                <div class="image-col">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/cb104512-7de1-400d-b2d9-6156e06346eb/5.JPG?format=2500w" alt="Skypper Bushan 1">
                </div>
                <div class="image-col">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/c388ea76-08fe-4ce7-ae5d-aa07f0539219/9.JPG?format=2500w" alt="Skypper Bushan 2">
                </div>
            </div>
            
            <div class="image-row">
                <div class="image-col">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/2cba206a-2e3f-4069-84fb-ea9aeabf2428/Bush002.jpeg?format=2500w" alt="Skypper Bushan 3">
                </div>
                <div class="image-col">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/15eaa5f5-447d-4fbe-bd7a-c330c5c38d3d/7.JPG?format=2500w" alt="Skypper Bushan 4">
                </div>
            </div>
            
            <div class="image-row">
                <div class="image-col">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/90ab4314-d591-42d7-b6b2-b7eb5dd00984/12.JPG?format=2500w" alt="Skypper Bushan 5">
                </div>
                <div class="image-col">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/1fb8aef2-780d-46a4-91f1-1e97f7f7dcbb/13.JPG?format=2500w" alt="Skypper Bushan 6">
                </div>
            </div>
            <div class="image-row">
                <div class="image-col">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/28d805c4-c0a1-43cc-b5b5-544f73bfc516/33.JPG?format=2500w" alt="Skypper Bushan 5">
                </div>
                <div class="image-col">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/016dcc20-894f-4790-9977-f34c0d8fbcbe/24.JPG?format=2500w" alt="Skypper Bushan 6">
                </div>
            </div>
        </div>
        
        <div class="content-section">
            <div class="image-row">
                <div class="image-col">
                    <iframe width="100%" height="300" src="https://www.youtube.com/embed/5dHcXw3Iiao" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="image-col">
                    <iframe width="100%" height="300" src="https://www.youtube.com/embed/iOiopM0CbcA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        
        <div class="content-section">
            <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/e7bf3e76-dcb8-452f-9e17-ae2dfd8b6017/+Skypper+24+Price+P1J.jpg?format=2500w" alt="Skypper Bushan Price 1" class="feature-image">
            <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/ba6fd1a7-be52-41d2-940a-6cb9c22832dd/Kit+Skypper+Price+P2J.jpg?format=2500w" alt="Skypper Bushan Price 2" class="feature-image">
        </div>
    </div>
</div>
@endsection 