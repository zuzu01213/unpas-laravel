@extends('layouts.main')
@section('container')

    <div class="container mt-4">
        <h1>My Biography</h1>
        <p class="mb-1">Name: {{ $nama }}</p>
        <p>Class: {{ $class }}</p>

        <img src="images/pic-1.jpeg" height="500px" class="animated-img" id="pic1" alt="">
        <img src="images/tengah.jpeg" height="500px" width="450px" class="animated-img" id="pic2" alt="">
        <img src="images/pic-2.jpeg" height="500px" class="animated-img" id="pic3" alt="">
    </div>

    <style>
        body {
            background-color: whitesmoke;
            text-align: center
        }

        img {
            margin-left: 10px;
            border-radius: 50px;
            opacity: 0;
            transition: opacity 0.8s ease, transform 0.8s ease;
        }



        .animated-img {
            opacity: 0;
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        #pic1 {
            animation: fadeInLeft 1s ease-in-out forwards;
        }

        #pic2 {
            animation: fadeInUp 1s ease-in-out forwards;
        }

        #pic3 {
            animation: fadeInRight 1s ease-in-out forwards;
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        img:hover {
            cursor: pointer;
        }
    </style>
@endsection
