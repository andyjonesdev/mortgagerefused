<div>
    <object id="bad_credit" data="/storage/icon_bad_credit.svg" type="image/svg+xml" class="w-66"></object>

    <script type="text/javascript">
            window.addEventListener("load", function() {
                var bad_credit = document.getElementById('bad_credit').contentDocument;
                //console.log(svgObject);
                var arrow = bad_credit.getElementById('arrow_x5F_circles');
                console.log('bad_credit arrow = '+arrow);
                var arrow_tween = gsap.to(arrow, { rotation: {{160}}, duration: 2, transformOrigin: "50% 50%", ease: "sine.inOut" })
                setTimeout(reverseArrow,4000);
                function reverseArrow(){
                    arrow_tween.reverse();
                    //reverseCurves();
                    // setTimeout(reverseCurves,200);
                    setTimeout(restartArrow,4000);
                }
                function restartArrow(){
                    arrow_tween.restart();
                    //animateCurves();
                    setTimeout(reverseArrow,4000);
                }
            });
        </script>

    </div>