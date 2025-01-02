<div>
    <object id="self_employed" data="/storage/icon_self_employed.svg" type="image/svg+xml" class="w-66"></object>

    <script type="text/javascript">
            window.addEventListener("load", function() {
                var self_employed = document.getElementById('self_employed').contentDocument;
                //console.log(svgObject);
                var arrow_red = self_employed.getElementById('arrow_x5F_red');
                var arrow_orange = self_employed.getElementById('arrow_x5F_orange');
                var arrow_yellow = self_employed.getElementById('arrow_x5F_yellow');
                var arrow_green = self_employed.getElementById('arrow_x5F_green');
                var rect_arrow_red = arrow_red.getBoundingClientRect();
                console.log('self_employed arrow = '+arrow_red);
                // console.log('self_employed rect_arrow_red = '+rect_arrow_red);
                // console.log('self_employed rect_arrow_red = '+rect_arrow_red.x);
                // rect_arrow_red.x = -50;
                // rect_arrow_red.y = -50;
                //var arrow_tween = gsap.to(arrow_red, { rotation: {{160}}, duration: 2, transformOrigin: "50% 50%", ease: "sine.inOut" })
                gsap.to(arrow_red, { x: -18, y: -14, repeat: -1, yoyo: true, repeatDelay: 0.3, ease: "sine.inOut" })
                gsap.to(arrow_orange, { x: -7, y: -17, repeat: -1, yoyo: true, repeatDelay: 0.3, delay:0.3, ease: "sine.inOut" })
                gsap.to(arrow_yellow, { x: 7, y: -17, repeat: -1, yoyo: true, repeatDelay: 0.6, delay:0.6, ease: "sine.inOut" })
                gsap.to(arrow_green, { x: 18, y: -12, repeat: -1, yoyo: true, repeatDelay: 0.9, delay:0.9, ease: "sine.inOut" })
                //setTimeout(reverseArrow,4000);
                // function reverseArrow(){
                //     arrow_tween.reverse();
                //     //reverseCurves();
                //     // setTimeout(reverseCurves,200);
                //     setTimeout(restartArrow,4000);
                // }
                // function restartArrow(){
                //     arrow_tween.restart();
                //     //animateCurves();
                //     setTimeout(reverseArrow,4000);
                // }
            });
        </script>

    </div>