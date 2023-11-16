@extends('layouts.main')
@section('container')
    <div class="container mt-4">
        <h1>My Biography</h1>
        <p class="mb-1">Name: {{ $nama }}</p>
        <p>Class: {{ $class }}</p>

        <img src="images/pic-1.jpeg" height="500px" class="animated-img" id="pic1" alt="">
        <img src="images/tengah.jpeg" height="500px" class="animated-img" id="pic2" alt="">
        <img src="images/pic-2.jpeg" height="500px" class="animated-img" id="pic3" alt="">
    </div>

    <style>
        body {
            background-color: blanchedalmond;
        }

        img {
            margin-left: 20px;
            border-radius: 50px;
            opacity: 0;
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        h1 {
            color: rgb(14, 14, 14);
        }

        .animated-img {
            opacity: 0;
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        #pic1 {
            animation: fadeInBottom 1s ease-in-out forwards;
        }

        #pic2 {
            animation: fadeInTop 1s ease-in-out forwards;
        }

        #pic3 {
            animation: fadeInBottom 1s ease-in-out forwards;
        }

        @keyframes fadeInBottom {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInTop {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endsection
