<script>
    let progress_box = document.querySelector(".progress-box .box")
    let progress_width = progress_box.getAttribute("data-width")
    progress_box.style.width=progress_width + "%"
</script>

<script src="{{ asset('asset/javascript/components/effect.js') }}"></script>
<script src="{{ asset('asset/javascript/components/slider.js') }}"></script>
<script src="{{ asset('asset/javascript/components/dark-light-mode.js') }}"></script>