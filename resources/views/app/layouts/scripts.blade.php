<script>
    let progress_box = document.querySelector(".progress-box .box")
    let progress_width = progress_box.getAttribute("data-width")
    progress_box.style.width=progress_width + "%"
</script>

<script src="{{ asset('asset/javascript/components/effect.js') }}"></script>
<script src="{{ asset('asset/javascript/components/slider.js') }}"></script>
<script src="{{ asset('asset/javascript/components/dark-light-mode.js') }}"></script>

@if(session('success'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    Swal.fire({
        title: "پیام موفقیت آمیز!",
        text: "{{ session('success') }}",
        icon: "success"
    }); 
</script>
@endif

@if(session('error'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    Swal.fire({
        title: "پیام موفقیت آمیز!",
        text: "{{ session('error') }}",
        icon: "error"
    }); 
</script>
@endif


@if (session('store-username'))

    <div id="backkk" style="position: fixed;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    top: 0;"></div>

    <div class="username" style="    position: fixed;
    top: 4rem;
    background-color: #fff;
    width: 80%;
    margin-right: 10%;
    padding: 1rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    border-radius: .5rem;
    box-shadow: 0 2px 5px #3333338a;">
        <h3>نام کاربری خود را وارد کنید</h3>
        <form action="{{ route('save.username') }}" method="POST" style="width: 100%" >
            @csrf
            <input type="text" name="username" class="form-control" id="" placeholder="example: amiradib" style="text-align: left; margin: 1rem 0; width: 100%" name="username">
            <input type="submit" value="ثبت" class="btn btn-warning" style="width: 100%;font-family: 'payda-Regular';">
        </form>
    </div>

    <script>
        document.querySelector('#backkk').addEventListener('click', () => {
            document.querySelector('#backkk').style = 'display: none'
            document.querySelector('.username').style = 'display: none'
        })
    </script>
@endif