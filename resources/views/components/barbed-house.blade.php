<div>
    <object id="barbed_house" data="/storage/barbed_house.svg" type="image/svg+xml" class="w-96 mx-auto w-full""></object>
   
    <script type="text/javascript">
        window.addEventListener("load", function() {
            var barbed_house = document.getElementById('barbed_house').contentDocument;

            var left = barbed_house.getElementById('left');
            var front = barbed_house.getElementById('front');
            var backwall = barbed_house.getElementById('backwall');
            var rightwall = barbed_house.getElementById('rightwall');
            var roofchim = barbed_house.getElementById('roofchim');
            var back = barbed_house.getElementById('back');
            var barb1 = barbed_house.getElementById('barb1');
            var barb2 = barbed_house.getElementById('barb2');
            console.log('left = '+left);

            var left_tween = gsap.to(left, { x: 50, y: -30, scaleX: 0.90, scaleY: 1.1, ease: "back.out", bduration: 1 });
            var front_tween = gsap.to(front, { x: -50, y: -30, scaleX: 0.90, scaleY: 1.1, ease: "back.out", bduration: 1 });
            var backwall_tween = gsap.to(backwall, { x: 30, y: -30, scaleX: 0.90, scaleY: 1.1, ease: "back.out", bduration: 1 });
            var rightwall_tween = gsap.to(rightwall, { x: -20, y: -30, scaleX: 0.90, scaleY: 1.1, ease: "back.out", bduration: 1 });
            var roofchim_tween = gsap.to(roofchim, { x: 10, y: -100, scaleX: 0.90, scaleY: 1.1, ease: "back.out", bduration: 1 });
            var back_tween = gsap.to(back, { x: -20, y: -40, scaleX: 0.90, scaleY: 1.1, ease: "back.out", bduration: 1 });
            var barb1_tween = gsap.to(barb1, { x: 30, scaleX: 0.90, scaleY: 1, ease: "back.out", bduration: 1 });
            var barb2_tween = gsap.to(barb2, { x: 30, scaleX: 0.90, scaleY: 1, ease: "back.out", bduration: 1 });

            setTimeout(reverseSqueeze,3000);

            // var left_tween = gsap.to(left, { x: 30, y: -30, scaleX: 0.90, scaleY: 1.1, ease: "back.out", bduration: 1 });
            // var front_tween = gsap.to(front, { x: -10, y: -30, scaleX: 0.90, scaleY: 1.1 });
            // var backwall_tween = gsap.to(backwall, { x: 30, y: -30, scaleX: 0.90, scaleY: 1.1, ease: "back.out", bduration: 1 });
            // var rightwall_tween = gsap.to(rightwall, { x: -20, y: -30, scaleX: 0.90, scaleY: 1.1, ease: "back.out", bduration: 1 });
            // var roofchim_tween = gsap.to(roofchim, { x: 10, y: -45, scaleX: 0.90, scaleY: 1.1, ease: "back.out", bduration: 1 });
            // var back_tween = gsap.to(back, { x: -20, y: -40, scaleX: 0.90, scaleY: 1.1, ease: "back.out", bduration: 1 });
            // var barb1_tween = gsap.to(barb1, { x: 30, scaleX: 0.90, scaleY: 1, ease: "back.out", bduration: 1 });
            // var barb2_tween = gsap.to(barb2, { x: 30, scaleX: 0.90, scaleY: 1, ease: "back.out", bduration: 1 });

            function squeeze(){
                left_tween.restart();
                front_tween.restart();
                backwall_tween.restart();
                rightwall_tween.restart();
                roofchim_tween.restart();
                back_tween.restart();
                barb1_tween.restart();
                barb2_tween.restart();
                setTimeout(reverseSqueeze,3000);
            }
            function reverseSqueeze(){
                left_tween.reverse();
                front_tween.reverse();
                backwall_tween.reverse();
                rightwall_tween.reverse();
                roofchim_tween.reverse();
                back_tween.reverse();
                barb1_tween.reverse();
                barb2_tween.reverse();
                setTimeout(squeeze,3000);
            }
        });
    </script>
</div>