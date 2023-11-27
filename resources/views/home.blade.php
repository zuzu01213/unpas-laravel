@extends('layouts.main')
@section('container')
<body>
    <main>
        <div class="vignette"></div>
        <img src="images/background.png" class="parallax bg-img" data-speedx="0.3" data-speedy="0.38">
        <img src="images/fog_7.png" class="parallax fog-7" data-speedx="0.2" data-speedy="0.32">
        <img src="images/mountain_10.png" class="parallax mountain-10" data-speedx="0.2" data-speedy="0.305">
        <img src="images/fog_6.png" class="parallax fog-6" data-speedx="0.2" data-speedy="0.28">
        <img src="images/mountain_9.png" class="parallax mountain-9" data-speedx="0.125" data-speedy="0.155">
        <img src="images/mountain_8.png" class="parallax mountain-8" data-speedx="0.1" data-speedy="0.11">
        <img src="images/fog_5.png" class="parallax fog-5" data-speedx="0.16" data-speedy="0.105">
        <img src="images/mountain_7.png" class="parallax mountain-7" data-speedx="0.1" data-speedy="0.1">
        <div class="text" data-speedx="0.07" data-speedy="0.07">
            <h2>K's</h2>
            <h1>Indonesia</h1>
        </div>
        <img src="images/mountain_6.png" class="parallax mountain-6" data-speedx="0.065"data-speedy="0.055">
        <img src="images/fog_4.png" class="parallax fog-4" data-speedx="0.135"data-speedy="0.0136">
        <img src="images/mountain_5.png" class="parallax mountain-5" data-speedx="0.08" data-speedy="0.08">
        <img src="images/fog_3.png" class="parallax fog-3" data-speedx="0.11" data-speedy="0.018">
        <img src="images/mountain_4.png" class="parallax mountain-4" data-speedx="0.059" data-speedy="0.024">
        <img src="images/mountain_3.png" class="parallax mountain-3" data-speedx="0.04" data-speedy="0.018">
        <img src="images/fog_2.png" class="parallax fog-2" data-speedx="0.15" data-speedy="0.0115">
        <img src="images/mountain_2.png" class="parallax mountain-2" data-speedx="0.0235" data-speedy="0.013">
        <img src="images/mountain_1.png" class="parallax mountain-1" data-speedx="0.027" data-speedy="0.018">
        <img src="images/sun_rays.png" class="parallax sun-rays" >
        <img src="images/black_shadow.png" class="parallax black-shadows" >
        <img src="images/fog_1.png" class="parallax fog-1" data-speedx="0.12" data-speedy="0.01">
    </main>
</body>

<style>
    body {
        background-color: #353;
        text-align: center;
        height: 100vh;
        width: 100vw;
        overflow: hidden;
        position: relative;
    }

    .vignette {
        pointer-events: none;
        position: absolute;
        z-index: 10104120;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: radial-gradient(ellipse at center, rgba(0, 0, 0, 0) 65%, rgba(0, 0, 0, 0.7));
    }

    .parallax {
        position: absolute;
        will-change: transform;
        z-index: 1;
        pointer-events: none;
        transition: transform 0.45s cubic-bezier(.2, .49, .32, .99);

    }

    .bg-img {
        position: absolute;
        width: 2800px;
        top: calc(50% - 390px);
        left: calc(50% + 10px);
        transform: translate(-50%, -50%);
        z-index: 1;
    }

    .fog-1 {
        position: absolute;
        z-index: 2;
        width: 1900px;
        top: calc(50% - 100px);
        left: calc(50% + 300px);
        transform: translate(-50%, -50%);
    }

    .mountain-10 {
        position: absolute;
        width: 870px;
        z-index: 3;
        top: calc(50% + 69px);
        left: calc(50% + 230px);
        transform: translate(-50%, -50%);
    }

    .fog-2 {
        position: absolute;
        width: 1833px;
        z-index: 4;
        top: calc(50% + 95px);
        left: calc(50% + 7px);
        transform: translate(-50%, -50%);
    }

    .mountain-9 {
        position: absolute;
        width: 470px;
        z-index: 5;
        top: calc(50% + 119px);
        left: calc(50% - 457px);
        transform: translate(-50%, -50%);
    }

    .mountain-8 {
        position: absolute;
        width: 786px;
        z-index: 6;
        top: calc(50% + 96px);
        left: calc(50% - 202px);
        transform: translate(-50%, -50%);
    }

    .fog-3 {
        position: absolute;
        width: 450px;
        z-index: 4;
        top: calc(50% + 171px);
        left: calc(50% + 29px);
        transform: translate(-50%, -50%);
    }

    .mountain-7 {
        position: absolute;
        width: 515px;
        z-index: 8;
        top: calc(50% + 24px);
        left: calc(50% + 305px);
        transform: translate(-50%, -50%);
    }

    .text {
        z-index: 9;
        position: absolute;
        top: calc(50% - 130px);
        left: 50%;
        transform: translate(-50%, -50%);
        text-transform: uppercase;
        color: white;
        pointer-events: auto;
    }
::selection {
    background-color: rgb(4, 32, 4);
}
    .text h2 {
        font-weight: 100;
        font-size: 6.5rem;
        line-height: 0.88;
    }

    .text h1 {
        font-weight: 800;
        font-size: 8rem;
        line-height: 0.88;
    }

    .mountain-6 {
        position: absolute;
        width: 383px;
        z-index: 10;
        top: calc(50% + 6.5px);
        left: calc(50% + 590px);
        transform: translate(-50%, -50%);
    }

    .fog-4 {
        position: absolute;
        width: 543px;
        z-index: 1;
        top: calc(50% + 269px);
        left: calc(50% + 130px);
        transform: translate(-50%, -50%);
    }

    .mountain-5 {
        position: absolute;
        width: 583px;
        z-index: 14;
        top: calc(50% + 229px);
        left: calc(50% + 130px);
        transform: translate(-50%, -50%);
    }

    .fog-5 {
        position: absolute;
        width: 1435px;
        z-index: 3;
        top: calc(50% + 149px);
        left: calc(50% - 28px);
        transform: translate(-50%, -50%);
    }

    .mountain-4 {
        position: absolute;
        width: 717px;
        z-index: 122;
        top: calc(50% + 191px);
        left: calc(50% - 381.5px);
        transform: translate(-50%, -50%);
    }

    .mountain-3 {
        position: absolute;
        width: 419px;
        z-index: 15;
        top: calc(50% + 133px);
        left: calc(50% + 736px);
        transform: translate(-50%, -50%);
    }

    .fog-6 {
        position: absolute;
        width: 1618px;
        z-index: 11;
        top: calc(50% + 177px);
        left: calc(50% - 90px);
        transform: translate(-50%, -50%);
    }

    .mountain-2 {
        position: absolute;
        width: 625px;
        z-index: 17;
        top: calc(50% + 128px);
        left: calc(50% + 412px);
        transform: translate(-50%, -50%);
    }

    .mountain-1 {
        position: absolute;
        width: 450px;
        z-index: 18;
        top: calc(50% + 58.5px);
        left: calc(50% - 645px);
        transform: translate(-50%, -50%);
    }
    .sun-rays {
        position: absolute;
        z-index: 114112431421419;
        top: 0;
        right: 0;
        width: 100%;
        height: 100%;
        transform: translate(-50%, -50%);
    }

    .black-shadows {
        position: absolute;
        z-index: 20;
        bottom: 0;
        right: 0;
        width: 100%;
    }
</style>
<script>
   const parallax_el = document.querySelectorAll('.parallax');
let xValue = 0, yValue = 0;

function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

function handleMouseMove(e) {
    xValue = e.clientX - window.innerWidth / 2;
    yValue = e.clientY - window.innerHeight / 2;



    parallax_el.forEach((el) => {
        let speedx = el.dataset.speedx;
        let speedy = el.dataset.speedy;

        let zValue = 100;

        el.style.transform = `translateX(calc(-50% + ${xValue * speedx}px)) translateY(calc(-50% + ${yValue * speedy}px))`;
    });
}

const debouncedHandleMouseMove = debounce(handleMouseMove, 10);

window.addEventListener('mousemove', debouncedHandleMouseMove);

</script>


@endsection


