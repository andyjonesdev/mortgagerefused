<div>
    <object id="frustrated_man" data="/storage/frustrated_man.svg" type="image/svg+xml" class="mx-auto w-full md:w-96"></object>
   
    <script type="text/javascript">
        window.addEventListener("load", function() {
            var frustrated_man = document.getElementById('frustrated_man').contentDocument;

            var eyelids = frustrated_man.getElementById('eyelids');
            var mouth = frustrated_man.getElementById('mouth');
            var cheek1 = frustrated_man.getElementById('cheek1');
            var cheek2 = frustrated_man.getElementById('cheek2');
            var house = frustrated_man.getElementById('house');
            var roof = frustrated_man.getElementById('roof');
            console.log('roof = '+roof);

            
            var house_tween = gsap.to(house, { rotate: 5, repeat: 6, yoyo: true, duration: .1, ease: "sine.inOut" })
            setInterval(shake_house,3000);
            var roof_tween = gsap.to(roof, { y: 32, duration: .3, ease: "sine.inOut" })
            var roof_tween2 = gsap.to(roof, { x: 42, duration: .3, ease: "sine.inOut" })
            var blink = gsap.to(eyelids, { alpha: 0, duration: 0.3 })
            var blink_tween = gsap.to(mouth, { x: -15, y: -15, scaleX: 1.22, scaleY: 1.22, duration: 1, repeat: -1, yoyo: true, repeatDelay: 2, ease: "sine.inOut" })
            var cheek1_tween = gsap.to(cheek1, { x: -15, duration: 1, repeat: -1, yoyo: true, repeatDelay: 2, ease: "sine.inOut" })
            var cheek2_tween = gsap.to(cheek2, { x: 15, duration: 1, repeat: -1, yoyo: true, repeatDelay: 2, ease: "sine.inOut" })
            setTimeout(reverseArrow,4000);
            function reverseArrow(){
                blink.reverse();
                //reverseCurves();
                // setTimeout(reverseCurves,200);
                setTimeout(restartArrow,400);
            }
            function restartArrow(){
                blink.restart();
                //animateCurves();
                setTimeout(reverseArrow,6000);
            }
            function shake_house(){
                house_tween.restart();
                roof_tween.restart();
                roof_tween2.restart();
            }
        });
    </script>
</div>

