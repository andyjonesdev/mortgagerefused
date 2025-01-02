<div>
    <object id="complex" data="/storage/icon_complex.svg" type="image/svg+xml" class="w-full fullwidth"></object>
   
    <script type="text/javascript">
        window.addEventListener("load", function() {
            var complex = document.getElementById('complex').contentDocument;
            //console.log(svgObjectRadid);
            var arrows_one = complex.getElementById('arrow_x5F_one');
            var arrows_two = complex.getElementById('arrow_x5F_two');
            var arrows_three = complex.getElementById('arrow_x5F_three');
            var arrows_four = complex.getElementById('arrow_x5F_four');
            var head_one = complex.getElementById('head_x5F_one');
            var head_two = complex.getElementById('head_x5F_two');
            var head_three = complex.getElementById('head_x5F_three');
            var head_four = complex.getElementById('head_x5F_four');
            console.log('arrows_one = '+arrows_one);

            var arrow_one_tween = gsap.to(arrows_one, { alpha: 0, duration: 2, transformOrigin: "50% 50%", ease:Linear.easeNone})
            var head_one_tween = gsap.to(head_one, { alpha: 0, duration: 2, transformOrigin: "50% 50%", ease:Linear.easeNone});
            var arrow_two_tween = gsap.to(arrows_two, { alpha: 0, duration: 2, delay: 1, transformOrigin: "50% 50%", ease:Linear.easeNone})
            var head_two_tween = gsap.to(head_two, { alpha: 0, duration: 2, delay: 1, transformOrigin: "50% 50%", ease:Linear.easeNone});
            var arrow_three_tween = gsap.to(arrows_three, { alpha: 0, duration: 2, delay: 2, transformOrigin: "50% 50%", ease:Linear.easeNone})
            var head_three_tween = gsap.to(head_three, { alpha: 0, duration: 2, delay: 2, transformOrigin: "50% 50%", ease:Linear.easeNone});
            var arrow_four_tween = gsap.to(arrows_four, { alpha: 0, duration: 2, delay: 3, transformOrigin: "50% 50%", ease:Linear.easeNone})
            var head_four_tween = gsap.to(head_four, { alpha: 0, duration: 2, delay: 3, transformOrigin: "50% 50%", ease:Linear.easeNone});
            setTimeout(reverseArrow1,4000);
            setTimeout(reverseArrow2,6000);
            setTimeout(reverseArrow3,8000);
            setTimeout(reverseArrow4,10000);
            // setTimeout(reverseArrow3,4000);
            // setTimeout(reverseArrow4,4000);
            function reverseArrow1(){
                arrow_one_tween.reverse();
                head_one_tween.reverse();
                setTimeout(restartArrow1,4000);
            }
            function restartArrow1(){
                arrow_one_tween.restart();
                head_one_tween.restart();
                setTimeout(reverseArrow1,4000);
            }

            function reverseArrow2(){
                arrow_two_tween.reverse();
                head_two_tween.reverse();
                setTimeout(restartArrow2,4000);
            }
            function restartArrow2(){
                arrow_two_tween.restart();
                head_two_tween.restart();
                setTimeout(reverseArrow2,4000);
            }

            function reverseArrow3(){
                arrow_three_tween.reverse();
                head_three_tween.reverse();
                setTimeout(restartArrow3,4000);
            }
            function restartArrow3(){
                arrow_three_tween.restart();
                head_three_tween.restart();
                setTimeout(reverseArrow3,4000);
            }

            function reverseArrow4(){
                arrow_four_tween.reverse();
                head_four_tween.reverse();
                setTimeout(restartArrow4,4000);
            }
            function restartArrow4(){
                arrow_four_tween.restart();
                head_four_tween.restart();
                setTimeout(reverseArrow4,4000);
            }
        });
    </script>
</div>