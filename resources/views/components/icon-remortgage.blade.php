<div>
    <object id="remortgage" data="/storage/icon_remortgage.svg" type="image/svg+xml" class="w-full fullwidth"></object>
   
    <script type="text/javascript">
        window.addEventListener("load", function() {
            var remortgage = document.getElementById('remortgage').contentDocument;
            //console.log(svgObjectRadid);
            var arrows = remortgage.getElementById('arrows');
            console.log('arrows = '+arrows);

            //gsap.to(arrows, { delay:3, scale: 1.05, repeat: -1, yoyo: true })
            gsap.to(arrows, { rotation: 360, duration: 1, transformOrigin: "50% 50%", ease:Linear.easeNone, repeat: -1 })
        });
    </script>
</div>