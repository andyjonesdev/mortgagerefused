<div>
    <object id="frustrated_man2" data="/storage/frustrated_man2.svg" type="image/svg+xml" class="mx-auto w-full md:w-96"></object>
   
    <script type="text/javascript">
        window.addEventListener("load", function() {
            var frustrated_man2 = document.getElementById('frustrated_man2').contentDocument;

            var eyelids2= frustrated_man2.getElementById('eyelids3');
            var mouth2 = frustrated_man2.getElementById('mouth2');
            var cheek3 = frustrated_man2.getElementById('cheek3');
            var cheek4 = frustrated_man2.getElementById('cheek4');
            var house2 = frustrated_man2.getElementById('house2');
            var roof2 = frustrated_man2.getElementById('roof2');
            console.log('roof2 = '+roof2);

            
            var house_tween2 = gsap.to(house2, { rotate: 5, repeat: 6, yoyo: true, duration: .1, ease: "sine.inOut" })
            setInterval(shake_house2,3000);
            var roof_tween3 = gsap.to(roof2, { y: 32, duration: .3, ease: "sine.inOut" })
            var roof_tween4 = gsap.to(roof2, { x: 42, duration: .3, ease: "sine.inOut" })
            var blink2 = gsap.to(eyelids2, { alpha: 0, duration: 0.3 })
            var blink_tween2 = gsap.to(mouth2, { x: -15, y: -15, scaleX: 1.22, scaleY: 1.22, duration: 1, repeat: -1, yoyo: true, repeatDelay: 2, ease: "sine.inOut" })
            var cheek3_tween = gsap.to(cheek3, { x: -15, duration: 1, repeat: -1, yoyo: true, repeatDelay: 2, ease: "sine.inOut" })
            var cheek4_tween = gsap.to(cheek4, { x: 15, duration: 1, repeat: -1, yoyo: true, repeatDelay: 2, ease: "sine.inOut" })
            setTimeout(reverseArrow2,4000);
            function reverseArrow2(){
                blink2.reverse();
                //reverseCurves();
                // setTimeout(reverseCurves,200);
                setTimeout(restartArrow2,400);
            }
            function restartArrow2(){
                blink2.restart();
                //animateCurves();
                setTimeout(reverseArrow2,6000);
            }
            function shake_house2(){
                house_tween2.restart();
                roof_tween3.restart();
                roof_tween4.restart();
            }
        });
    </script>
</div>

